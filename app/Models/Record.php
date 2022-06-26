<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    protected $fillable = [
        'name','calendartype'
    ];

    protected $primaryKey = 'recordid';
    public $timestamps = false;
}
