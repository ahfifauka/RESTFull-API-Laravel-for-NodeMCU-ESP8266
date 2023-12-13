<?php

namespace App\Http\Controllers;

use App\Models\Led;
use Illuminate\Http\Request;

class LedController extends Controller
{

    public function index()
    {
        return view("led.index");
    }

    public function switch(Request $request)
    {
        $state = $request->state;
        $led = Led::first();
        $led->ledState = $state;
        $led->save();
        return response()->json($led->ledState);
    }

    public function getState()
    {
        $led = Led::first();
        return response()->json($led->ledState);
    }
}
