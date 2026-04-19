<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function send(Request $request)
    {
        Mail::raw(
            "Nombre: {$request->name}\nCorreo: {$request->email}\nMensaje: {$request->message}",
            function ($message) {
                $message->to('netportal34@gmail.com')
                        ->subject('Nuevo mensaje de contacto');
            }
        );

        return response()->json(['success' => true]);
    }
}
