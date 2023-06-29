<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProgramCalender extends Model{

    use SoftDeletes;
    use Notifiable;
    protected $table='mst_programcalendar';
    protected $fillable = ['strMonths','strLanguageCode','strTitle','enmStatus','strPageName'];
}