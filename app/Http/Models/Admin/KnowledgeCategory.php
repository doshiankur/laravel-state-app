<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class KnowledgeCategory extends Model{

    use SoftDeletes;
    use Notifiable;
    protected $table='mst_knowledge_category';
    protected $fillable=['strLanguageCode','strCategory','strDetail'];
}