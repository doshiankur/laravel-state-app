<?php
namespace App\Http\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllPhotosGallery extends Model
{
    protected $table= 'mst_event_gallery';

    public $timestamps = false;

    protected $fillable =[
        'intEventid', 'StrEventImg'
    ];
    protected $hidden = [
        'remember_token',
    ];

}

