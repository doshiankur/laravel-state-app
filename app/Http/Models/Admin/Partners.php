<?php
namespace App\Http\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partners extends Model{
   
    use SoftDeletes;
    use Notifiable;
   
    protected $table='mst_partners';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strPartnerURL','strPartnerLogo','strLanguageCode'];
    /*public $timestamps='false';*/
}