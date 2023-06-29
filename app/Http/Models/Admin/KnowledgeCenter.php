<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class KnowledgeCenter extends Model{

    use SoftDeletes;
    use Notifiable;
    protected $table='mst_knowledge_center';
    protected $fillable=['strLanguageCode','strCategoryCode','strTitle'];
}