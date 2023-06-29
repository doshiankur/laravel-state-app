<?php



namespace App\Http\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ReadingCorner extends Model
{
    //
    //protected $table='mst_readingcorner';
     //
     use SoftDeletes;
   // protected $connection = 'mysql2';
     use Notifiable;
     //use SoftDeletes;
     protected $table='mst_readingcorner';
     protected $dates = ['deleted_at'];
     protected $fillable = ['strLanguageCode','strReadingCorner','strPageName'];
}
