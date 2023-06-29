<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Aboutus extends Model
{
    //
    use SoftDeletes;
    use Notifiable;
    protected $table='mst_aboutus';
    protected $fillable=['strTitle','strLanguageCode','strDescription','strPageName'];
}
