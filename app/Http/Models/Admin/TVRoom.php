<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TVRoom extends Model
{
    //
    protected $table='mst_tvroom';
     protected $dates = ['deleted_at'];
    protected $fillable = ['strTVRoom','strLanguageCode','strPageName'];
}
