<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    private function client(): Client
    {
        $client = new Client();
        $client->setApplicationName('Laravel Google Integration');

        $client->setAuthConfig(
            storage_path('app/google/credentials.json')
        );

        $client->setScopes([
            Drive::DRIVE,
            Sheets::SPREADSHEETS,
        ]);

        $client->setAccessType('offline');
        $client->setPrompt('consent');

        return $client;
    }

    public function auth()
    {
        return redirect($this->client()->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $client = new \Google\Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        $client->setScopes([Sheets::SPREADSHEETS, Drive::DRIVE]);

        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        file_put_contents(storage_path('app/google/token.json'), json_encode($token));

        return "✅ token.json saved!";
    }
}
