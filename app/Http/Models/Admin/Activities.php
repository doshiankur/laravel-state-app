<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activities extends Model
{
    protected $table='mst_activities';
    use SoftDeletes;
    protected $fillable=['strLanguageCode','strActivities','strPageName'];
}