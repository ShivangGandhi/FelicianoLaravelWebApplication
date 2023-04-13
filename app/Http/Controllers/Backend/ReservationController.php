<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reservation\UpdatedRequestMail;
use App\Reservation;


class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('backend.reservation.index', compact('reservations'));
    }
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        if($reservation->status == 'Approved'){
            $reservation->status = 'Pending';
            $reservation->save();
            Mail::to($reservation->email)->send(new UpdatedRequestMail($reservation));
            if(Mail::failures()){
                return redirect(route('admin.reservation'))->with('successMessage', 'Reservation status Updated successfully. Mail Error!');
            }else{
                return redirect(route('admin.reservation'))->with('successMessage', 'Reservation status Updated successfully. Mail Successful');
            }
        }else{
            $reservation->status = 'Approved';
            $reservation->save();
            Mail::to($reservation->email)->send(new UpdatedRequestMail($reservation));
            if(Mail::failures()){
                return redirect(route('admin.reservation'))->with('successMessage', 'Reservation status Updated successfully. Mail Error!');
            }else{
                return redirect(route('admin.reservation'))->with('successMessage', 'Reservation status Updated successfully. Mail Successful');
            }
        }
    }
    public function delete($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect(route('admin.reservation'))->with('successMessage', 'Reservation Deleted successfully.');
    }
}
