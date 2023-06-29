<?php
namespace App\Http\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model{
   
    use Notifiable;

    protected $table='mst_event';

    public $timestamps = false;

    protected $fillable =[
        'strName','dtiEventdatetime','txtVenue','strImg','enmStatus'
    ];
    protected $hidden = [
        'remember_token',
    ];
    /*public $timestamps='false';*/
}


?>
