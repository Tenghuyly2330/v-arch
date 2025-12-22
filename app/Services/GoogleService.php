<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets;
use Illuminate\Support\Facades\Log;

class GoogleService
{
    protected Sheets $sheets;
    protected Drive $drive;

    // ✅ THIS IS WHAT WAS MISSING
    protected string $spreadsheetId;

    public function __construct()
    {
        $client = $this->getClient();
        $this->sheets = new Sheets($client);
        $this->drive = new Drive($client);

        $this->spreadsheetId = config('services.google.spreadsheet_id');
    }


    protected function getClient(): Client
    {
        $client = new Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        $client->setScopes([
            Sheets::SPREADSHEETS,
            Drive::DRIVE,
        ]);

        $tokenPath = storage_path('app/google/token.json');
        if (file_exists($tokenPath)) {
            $client->setAccessToken(json_decode(file_get_contents($tokenPath), true));
        }

        if ($client->isAccessTokenExpired()) {
            $refreshToken = $client->getRefreshToken();
            if ($refreshToken) {
                $client->fetchAccessTokenWithRefreshToken($refreshToken);
                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
            } else {
                throw new \Exception('Refresh token missing. Re-login required.');
            }
        }

        return $client;
    }


    /* ================= SHEETS ================= */

    public function appendCategory(array $row)
    {
        return $this->sheets->spreadsheets_values->append(
            env('GOOGLE_SHEET_ID'),
            'Categories!A1',
            new Sheets\ValueRange(['values' => [$row]]),
            ['valueInputOption' => 'RAW']
        );
    }

    public function appendProduct(array $row)
    {
        return $this->sheets->spreadsheets_values->append(
            env('GOOGLE_SHEET_ID'),
            'Products!A1',
            new Sheets\ValueRange(['values' => [$row]]),
            ['valueInputOption' => 'RAW']
        );
    }

    public function getCategories()
    {
        $rows = $this->sheets->spreadsheets_values
            ->get(env('GOOGLE_SHEET_ID'), 'Categories!A2:E')
            ->getValues();

        return collect($rows)->map(fn($r) => (object)[
            'id' => $r[0] ?? null,
            'name_en' => $r[1] ?? '',
            'name_km' => $r[2] ?? '',
            'name_ch' => $r[3] ?? '',
            'slug' => $r[4] ?? '',
        ]);
    }

    public function getCategoryById(string $id)
    {
        $response = $this->sheets->spreadsheets_values->get(
            env('GOOGLE_SHEET_ID'),
            'Categories!A2:G'
        );

        $rows = $response->getValues();

        if (!$rows) return null;

        foreach ($rows as $row) {
            if (($row[0] ?? null) === $id) {
                return (object) [
                    'id'       => $row[0],
                    'name_en'  => $row[1] ?? '',
                    'name_km'  => $row[2] ?? '',
                    'name_ch'  => $row[3] ?? '',
                    'slug'     => $row[4] ?? '',
                ];
            }
        }

        return null;
    }

    public function findCategoryRowNumber(string $id): ?int
    {
        $response = $this->sheets->spreadsheets_values->get(
            env('GOOGLE_SHEET_ID'),
            'Categories!A2:A'
        );

        $rows = $response->getValues();
        if (!$rows) return null;

        foreach ($rows as $index => $row) {
            if (($row[0] ?? null) === $id) {
                return $index + 2; // because A2 starts at row 2
            }
        }

        return null;
    }
    public function updateCategory(string $id, array $data)
    {
        $rowNumber = $this->findCategoryRowNumber($id);

        if (!$rowNumber) {
            throw new \Exception('Category not found');
        }

        $range = "Categories!A{$rowNumber}:G{$rowNumber}";

        $body = new Sheets\ValueRange([
            'values' => [$data]
        ]);

        return $this->sheets->spreadsheets_values->update(
            env('GOOGLE_SHEET_ID'),
            $range,
            $body,
            ['valueInputOption' => 'RAW']
        );
    }
    public function deleteCategory(string $id)
    {
        $rowNumber = $this->findCategoryRowNumber($id);

        if (!$rowNumber) {
            throw new \Exception('Category not found');
        }

        $batchUpdateRequest = new Sheets\BatchUpdateSpreadsheetRequest([
            'requests' => [
                [
                    'deleteDimension' => [
                        'range' => [
                            'sheetId' => 0, // first sheet
                            'dimension' => 'ROWS',
                            'startIndex' => $rowNumber - 1,
                            'endIndex' => $rowNumber
                        ]
                    ]
                ]
            ]
        ]);

        return $this->sheets->spreadsheets->batchUpdate(
            env('GOOGLE_SHEET_ID'),
            $batchUpdateRequest
        );
    }

    public function getProducts()
    {
        $response = $this->sheets->spreadsheets_values->get(
            env('GOOGLE_SHEET_ID'),
            'Products!A2:L' // skip header
        );

        $rows = $response->getValues();
        if (!$rows) return [];

        return array_map(function ($row) {
            return (object)[
                'id'          => $row[0] ?? null,
                'name_en'     => $row[1] ?? '',
                'name_km'     => $row[2] ?? '',
                'name_ch'     => $row[3] ?? '',
                'slug'        => $row[4] ?? '',
                'category_id' => $row[5] ?? '',
                'colors'      => json_decode($row[6] ?? '[]'),
                'content_en'  => $row[7] ?? '',
                'content_km'  => $row[8] ?? '',
                'content_ch'  => $row[9] ?? '',
                'status'      => ($row[10] ?? 'false') === 'true',
                'best_pick'   => ($row[11] ?? 'false') === 'true',
            ];
        }, $rows);
    }

    public function getProductById(string $id)
    {
        $response = $this->sheets->spreadsheets_values->get(
            env('GOOGLE_SHEET_ID'),
            'Products!A2:L' // skip header row
        );

        $rows = $response->getValues();
        if (!$rows) return null;

        foreach ($rows as $row) {
            if (($row[0] ?? null) === $id) {
                return (object)[
                    'id'          => $row[0] ?? null,
                    'name_en'     => $row[1] ?? '',
                    'name_km'     => $row[2] ?? '',
                    'name_ch'     => $row[3] ?? '',
                    'slug'        => $row[4] ?? '',
                    'category_id' => $row[5] ?? '',
                    'colors'      => json_decode($row[6] ?? '[]'), // object/array of colors
                    'content_en'  => $row[7] ?? '',
                    'content_km'  => $row[8] ?? '',
                    'content_ch'  => $row[9] ?? '',
                    'status'      => ($row[10] ?? '0') === '1',
                    'best_pick'   => ($row[11] ?? '0') === '1',
                ];
            }
        }

        return null;
    }


    public function findProductById(string $id)
    {
        $rows = $this->getProducts();

        foreach ($rows as $index => $row) {
            if ($row->id === $id) {
                return [
                    'rowIndex' => $index + 2,
                    'data' => $row,
                ];
            }
        }

        return null;
    }

    public function findProductRowNumber(string $id): ?int
    {
        $response = $this->sheets->spreadsheets_values->get(
            $this->spreadsheetId,
            'Products!A2:A'
        );

        $rows = $response->getValues();
        if (!$rows) return null;

        foreach ($rows as $index => $row) {
            if (($row[0] ?? null) === $id) {
                return $index + 2; // because A2 starts at row 2
            }
        }

        return null;
    }
    public function updateProduct(string $id, array $data)
    {
        $rowNumber = $this->findProductRowNumber($id);

        if (!$rowNumber) {
            throw new \Exception('Product not found');
        }

        $range = "Products!A{$rowNumber}:L{$rowNumber}";

        return $this->sheets->spreadsheets_values->update(
            $this->spreadsheetId,
            $range,
            new \Google\Service\Sheets\ValueRange([
                'values' => [$data]
            ]),
            ['valueInputOption' => 'RAW']
        );
    }
    public function getSheetIdByName(string $sheetName): int
    {
        $spreadsheet = $this->sheets->spreadsheets->get($this->spreadsheetId);

        foreach ($spreadsheet->getSheets() as $sheet) {
            if ($sheet->getProperties()->getTitle() === $sheetName) {
                return $sheet->getProperties()->getSheetId();
            }
        }

        throw new \Exception("Sheet '{$sheetName}' not found");
    }

    public function deleteProduct(string $id)
    {
        $rowNumber = $this->findProductRowNumber($id);

        if (!$rowNumber) {
            throw new \Exception('Product not found');
        }

        return $this->sheets->spreadsheets->batchUpdate(
            $this->spreadsheetId,
            new \Google\Service\Sheets\BatchUpdateSpreadsheetRequest([
                'requests' => [[
                    'deleteDimension' => [
                        'range' => [
                            'sheetId' => $this->getSheetIdByName('Products'),
                            'dimension' => 'ROWS',
                            'startIndex' => $rowNumber - 1,
                            'endIndex' => $rowNumber,
                        ]
                    ]
                ]]
            ])
        );
    }


    /**
     * Delete image from local storage
     */
    /**
     * Delete image from Google Drive
     */
    // public function deleteImage(string $fileId): bool
    // {
    //     try {
    //         $this->drive->files->delete($fileId);
    //         return true;
    //     } catch (\Exception $e) {
    //         Log::error("Drive delete failed: " . $e->getMessage());
    //         return false;
    //     }
    // }

    public function deleteImage($fileId)
    {
        if (!$fileId) return;

        try {
            $this->drive->files->delete($fileId);
        } catch (\Exception $e) {
            // ignore if already deleted
        }
    }


    /* ================= DRIVE ================= */
    public function uploadImage(\Illuminate\Http\UploadedFile $file)
    {
        if (!$file->isValid()) {
            return null;
        }

        $fileMeta = new \Google\Service\Drive\DriveFile([
            'name' => time() . '_' . $file->getClientOriginalName(),
            'parents' => [env('GOOGLE_DRIVE_FOLDER_ID')],
        ]);

        $uploaded = $this->drive->files->create($fileMeta, [
            'data' => file_get_contents($file->getRealPath()),
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
        ]);

        // public
        $this->drive->permissions->create(
            $uploaded->id,
            new \Google\Service\Drive\Permission([
                'type' => 'anyone',
                'role' => 'reader',
            ])
        );

        return $uploaded->id;
    }



    public function getImageUrl(string $fileId): string
    {
        return "https://drive.google.com/uc?export=view&id={$fileId}";
    }
}
