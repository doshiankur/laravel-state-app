<?php
namespace App\Http\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Introduction extends Model{
    use SoftDeletes;
   // protected $connection = 'mysql2';
     use Notifiable;
     //use SoftDeletes;
     protected $table='mst_introduction';
     protected $dates = ['deleted_at'];
     protected $fillable = ['strLanguage','str_introcontent','strPageName'];
    /*public $timestamps='false';*/

}