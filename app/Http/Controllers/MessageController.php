<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $form = $request->all();

        $form['user_id'] = $request?->user()?->id;

        return response()->json([
            'message' => Message::create($form)
        ], 200);
    }
}
