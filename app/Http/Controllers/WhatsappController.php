<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use QRCode;
use Illuminate\Support\Facades\Response;

class WhatsappController extends Controller
{
    public function show()
    {
        $response = Http::get('http://localhost:3000/login'); // Ganti URL sesuai dengan server Node.js Anda
        $responseText = $response->body();

        $loggedIn = $responseText === 'Logged in successfully';

        if (!$loggedIn) {
            $qrCode = $response->body();
            //dd($qrCode);
            return view('whatsapp.index', compact('qrCode', 'loggedIn'));
        } else {
            return view('whatsapp.index', compact('loggedIn'));
        }
    }

    public function sendMessage(Request $request, $id)
    {
        dd($id);
        // $phone = $request->input('phone');
        // $message = $request->input('message');

        // if (!$phone || !$message) {
        //     return redirect('/whatsapp')->with('error', 'Missing phone number or message');
        // }

        // $response = Http::post('http://localhost:3000/send-message', [
        //     'phone' => $phone,
        //     'message' => $message,
        // ]); // Ganti URL sesuai dengan server Node.js Anda

        // $status = $response->body();

        // return redirect('/whatsapp')->with('status', $status);
    }

    public function logout()
    {
        // Lakukan operasi logout di sini, misalnya mengganti status di server Node.js
        return response()->json(['message' => 'Logged out successfully']);
    }

}
