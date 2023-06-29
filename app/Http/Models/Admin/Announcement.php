<?php

namespace App\Http\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Announcement extends Model
{
    //
     use SoftDeletes;
   // protected $connection = 'mysql2';
     use Notifiable;
     //use SoftDeletes;
     protected $table='mst_announcement';
     protected $dates = ['deleted_at'];
     protected $fillable = ['strLanguage','dtiEventDate','str_content','strPageName'];
}
