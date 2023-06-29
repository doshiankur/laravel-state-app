<?php
namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MembershipQuery extends Model{
    
    protected $table='mst_membership_query';
    //use Notifiable;
    protected $fillable=['intMembershipId','strComment'];    
}