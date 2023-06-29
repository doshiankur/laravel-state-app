<?php
namespace App\Http\Models\Admin;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Authenticatable
{
    use Notifiable;
    protected $table='mst_event';
    public $timestamps = false;
    protected $fillable =['strName','dtiEventdatetime','txtVenue','strImg','strCategory','enmStatus','strPageName','strLanguageCode'];
    protected $hidden = ['remember_token'];
}
?>
