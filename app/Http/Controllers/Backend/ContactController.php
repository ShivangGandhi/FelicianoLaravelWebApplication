<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(5);
        return view('backend.contact.index', compact('contacts'));
    }
}
