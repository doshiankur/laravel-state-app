<?php


namespace App\Http\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferenceService extends Model
{
    //
  
     use SoftDeletes;
   // protected $connection = 'mysql2';
     use Notifiable;
     //use SoftDeletes;
     protected $table='mst_referenceservice';
     protected $dates = ['deleted_at'];
     protected $fillable = ['strLanguageCode','strReferenceService','strPageName'];
}
