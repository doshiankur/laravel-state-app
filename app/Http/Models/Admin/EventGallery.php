<?php
namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    protected $table= 'mst_event_gallery';

    public $timestamps = false;

    protected $fillable =[
        'intEventid', 'StrEventImg','idCreatedBy', 'dtiCreated', 'dtiModified', 'idModifiedBy','enmDeleted'
    ];
    protected $hidden = [
        'remember_token',
    ];

}

