<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
   public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    Mail::to('agungrizki640@gmail.com')
        ->send((new ContactMail($validated))
        ->replyTo($validated['email'], $validated['name']));

    return back()->with('success', 'Pesan berhasil dikirim!');
}
}
