<?php
namespace App\Http\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpcomingEvent extends Model{
   
    use SoftDeletes;
    use Notifiable;
   
    protected $table='mst_upcoming_event';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strEventTitile','strEventDescription','dtiEventDate','strLanguageCode','strPageName'];
    /*public $timestamps='false';*/
}