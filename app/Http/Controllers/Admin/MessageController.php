<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Reservation;


class MessageController extends Controller {
	
    public function getIndex() {
        $objects = Message::get();
        return view('admin.pages.message', compact('objects'));
    }

    public function reserve() {
        $objects = Reservation::get();
        return view('admin.pages.reservations', compact('objects'));
    }

}
