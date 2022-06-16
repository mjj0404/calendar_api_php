<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return response()->json($records);
    }

    public function userIndex($userid)
    {
        $records = Record::where('userid', '=', $userid)->get();
        return response()->json($records);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "calendartype" => "required"
        ]);
        
        $record = new Record();
        $record->name = $request->input('name');
        $record->calendartype = $request->input('calendartype');
        $record->save();

        return response()->json($record);
    }

    public function show($recordid)
    {
        $record = Record::find($recordid);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "calendartype" => "required"
        ]);
        
        $record = new Record();
        $record->name = $request->input('name');
        $record->calendartype = $request->input('calendartype');
        $record->save();

        return response()->json($record);
    }

    public function destroy($recordid)
    {
        $record = Record::find($recordid);
        return response()->json($record);
    }
}
