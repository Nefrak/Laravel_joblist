<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Show all messages under auth user listings
    public function view()
    {
        return view('messages.list', [
            'messages'
            => Message::latest('messages.created_at')->where('listings.user_id', auth()->id())
            ->join('listings', 'listing_id', '=', 'listings.id')->paginate(6)
        ]);
    }

    // Create message under listing
    public function create(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'content' => 'required',
            'listing_id' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();

        Message::create($formFields);

        return redirect('/')->with('message', 'Message created successfully!');
    }
}
