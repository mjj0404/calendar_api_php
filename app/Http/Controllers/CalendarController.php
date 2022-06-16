<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    // THIS CONTROLLER CONTAINS READ-ONLY METHODS


    public function index()
    {
        $calendars = Calendar::all();
        return response()->json($calendars);
    }

    public function show($calendarid)
    {
        $calendar = Calendar::find($calendarid);
        return response()->json($calendar);
    }

    public function showByHijri($hijri)
    {
        $calendar = Calendar::where('hijri', '=', $hijri)->get();
        return response()->json($calendar);
    }

}
