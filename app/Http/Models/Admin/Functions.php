<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Functions extends Model {
    
    protected $table='mst_functions';
    protected $fillable=['strLanguageCode','strFunction','strPageName'];
    use SoftDeletes;
}