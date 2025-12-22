<?php

namespace App\Http\Controllers\Frontend;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Product;
use App\Models\Project;
use App\Models\Why;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data['histories'] = History::get();
        $data['aboutus'] = About::where('id', 1)->first();
        $data['vision'] = About::where('id', 2)->first();
        $data['mission'] = About::where('id', 3)->first();
        $data['core'] = About::where('id', 4)->first();

        $data['whys'] = Why::get();
        $data['product'] = Product::where('status', 1)->orderBy('created_at', 'asc')->get();

        $data['project'] = Project::orderBy('created_at', 'asc')
            ->limit(4)
            ->get();

        return view('frontend.home', $data);
    }



    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'message'  => 'required|string',
            'email'    => 'nullable|email',
            'telegram' => [
                'nullable',
                'regex:/^(?:\+855|0)(?:1[0-9]|9[0-9]|7[0-9]|8[0-9])[0-9]{6}$/'
            ],

            'consent'  => 'required',
        ], [
            'telegram.regex' =>  __('message.invalid_phone'),
        ]);

        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId   = env('TELEGRAM_CHAT_ID');

        $text = "📩 *New Contact Form*\n"
            . "👤 Name: {$validated['name']}\n"
            . "📱 Telegram: {$validated['telegram']}\n"
            . "📧 Email: {$validated['email']}\n"
            . "💬 Message: {$validated['message']}";

        Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'Markdown',
        ]);

        // return response()->json(['success' => 'Message sent successfully ✅']);
        return response()->json(['success' => __('message.successfully')]);
    }
}
