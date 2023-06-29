<?php
namespace App\Http\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Languages extends Model{
	
	 use SoftDeletes;
     use Notifiable;
     protected $table='mst_language';
     protected $fillable = ['strLanguage','strLanguageCode'];
}