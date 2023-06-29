<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Copyright extends Model
{
    //
    protected $table='mst_copyright';
     protected $fillable=['strLanguageCode','strCopyright','strPageName'];

}
