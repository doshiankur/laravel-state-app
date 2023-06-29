<?php
namespace App\Http\Models\Admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibrarianDesk extends Model{
    
    use SoftDeletes;
    use Notifiable;
    
     //use SoftDeletes;
    
     protected $table='mst_librarian_desk';
     protected $dates = ['deleted_at'];
     protected $fillable = ['strLibraryMessage','strPhoto','strLanguageCode','strLibrarianFrom','strPageName'];
    /*public $timestamps='false';*/
}