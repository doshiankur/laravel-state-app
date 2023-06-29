<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Studentreadingroom extends Model
{
    protected $table='mst_studentreadingroom';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strStudentreadingroom','strLanguageCode','strPageName'];
}