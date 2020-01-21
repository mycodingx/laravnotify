<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Notifications\ContactMessageCreated;
use App\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function message(Request $request)
    {
        $user = User::find(1);

        $data = $request->validate([
            'name' => 'required|string|min:4',
            'subject' => 'required|string|max:191',
            'message' => 'required|string',
        ]);

        $message = Contact::create($data);
        if ($message) {
            $user->notify(new ContactMessageCreated($message));
            return redirect('/contact')->with('message', 'Message submitted successfully!!');
        }
    }

}
