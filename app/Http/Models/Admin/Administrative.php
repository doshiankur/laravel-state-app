<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrative extends Model{
    
    protected $table='mst_administrativeoffice';
    protected $fillable=['strAdministrative','strLanguageCode','strPageName'];
    use SoftDeletes;
}