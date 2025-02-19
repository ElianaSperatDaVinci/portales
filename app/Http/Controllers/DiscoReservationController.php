<?php

namespace App\Http\Controllers;

use App\Mail\DiscoReservation;
use App\Models\Disco;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DiscoReservationController extends Controller
{
    public function reserve(int $id)
    {
        $disco = Disco::findOrFail($id);

        $reserva = new Reserva();
        $reserva->user_id = auth()->id();
        $reserva->disco_id = $disco->discos_id;
        $reserva->save();

        Mail::to(auth()->user())->send(new DiscoReservation($disco));

        return to_route('discos.index')
            ->with('feedback.message', 'El disco ' . htmlspecialchars_decode(e($disco->nombre)) . ' se reservó con éxito. Te va a llegar un mail con la confirmación.')
            ->with('feedback.type', 'success');
    }
    
    public function show()
    {
        return new DiscoReservation(Disco::findOrFail(1));
    }
}
