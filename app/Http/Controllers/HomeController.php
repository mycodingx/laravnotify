<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = Contact::paginate(5);
        return view('home', compact('messages'));
    }

    public function showMessage($id)
    {
        $message = Contact::find($id);
        return view('message-detail', compact('message'));
    }
}
