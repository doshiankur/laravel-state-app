<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookExchange extends Model
{
    
    protected $table='mst_bookexchange';
    protected $fillable=['strBookExchange','strLanguageCode','enmStatus','strPageName'];
    use SoftDeletes;

}
