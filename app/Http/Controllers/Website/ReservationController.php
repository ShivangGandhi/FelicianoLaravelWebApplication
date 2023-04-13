<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reservation\RecievedRequestMail;
use Carbon\Carbon;

class ReservationController extends Controller
{

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'     => 'required',
			'email' => 'required|email:rfc,dns',
            'phone' => 'required|digits:10|numeric',
            'date'  => 'required',
            'time'  => 'required',
            'person'  => 'required',
        ]);
        $date = Carbon::parse($request->date)->format('y-m-d');
        $time = Carbon::parse($request->time)->format('H:i:s');
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->date = $date;
        $reservation->time = $time;
        $reservation->person = $request->person;
        $reservation->status = 'Pending';
        $reservation->save();
        Mail::to($reservation->email)->send(new RecievedRequestMail($reservation));
            if(Mail::failures()){
                return back()->with('successMessage', 'Reservation status Created successfully. Mail Error!');
            }else{
                return back()->with('successMessage', 'Reservation status Created successfully. Mail Successful');
            }
    }
}
