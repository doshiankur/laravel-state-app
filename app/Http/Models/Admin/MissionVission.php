<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MissionVission extends Model
{
    //
     use Notifiable;
    protected $table='mst_mission_vision';
    protected $fillable=['strTitle','strMissionVission','strLanguageCode','strPageName'];
}
