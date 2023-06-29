<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MemberApplicationType extends Model
{
    //
    protected $table='mst_members_application_type';
    protected $dates = ['deleted_at'];
    protected $fillable = ['strApplicationType'];
}
