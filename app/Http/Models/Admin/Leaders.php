<?php
namespace App\Http\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leaders extends Model{
   
    use SoftDeletes;
    use Notifiable;
   
    protected $table='mst_leaders';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strLeadersName','strDesignation','strLanguageCode',
    'strLeadersPhoto','strPlace','enmStatus','strPageName','intDisplay'];
    /*public $timestamps='false';*/
}