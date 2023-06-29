<?php

namespace App\Http\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagementVillageLibraries extends Model {
    
    use SoftDeletes;
    use Notifiable;
    protected $table='mst_managementofvillagelibraries';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strLanguageCode','strManagementVillagelibraries','strPageName'];
}