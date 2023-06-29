<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Achievement extends Model{

    use SoftDeletes;
    use Notifiable;
    protected $table='mst_achievement';
    protected $fillable=['strTitle','strLanguageCode','strDescription','strPageName'];
}