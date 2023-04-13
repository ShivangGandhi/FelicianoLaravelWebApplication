<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'     => 'required|min:5|max:30',
			'phone' => 'required|digits:10|numeric',
            'email'  => 'required|max:30',
            'subject'     => 'required|max:100',
            'message'     => 'required|max:400',
        ]);
        $date = Carbon::parse($request->date)->format('y-m-d');
        $time = Carbon::parse($request->time)->format('H:i:s');
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect(route('website.home'))->with('successMessage', 'Contact Request Sent successfully.');
    }
}
