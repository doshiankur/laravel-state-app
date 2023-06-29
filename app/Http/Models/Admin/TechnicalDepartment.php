<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TechnicalDepartment extends Model
{
    //
    protected $table='mst_technicaldepartment';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strTechnical','strLanguageCode','strPageName'];
}
