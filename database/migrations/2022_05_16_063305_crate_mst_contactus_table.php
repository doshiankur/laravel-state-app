<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateMstContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_contactus', function (Blueprint $table) {
            $table->id();
            $table->string('strLanguageCode',255);
            $table->text('strLibraryAddress');
            $table->string('strLibrarainName',255);
            $table->string('strLibrarianMainDesignation',255);
            $table->text('strLibrarianDesignation');
            $table->string('strLibrarianPhoto',255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes('deleted_at')->useCurrent();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
    }
}