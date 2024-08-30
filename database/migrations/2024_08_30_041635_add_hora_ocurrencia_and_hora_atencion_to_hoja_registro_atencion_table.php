<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hoja_registro_atencion', function (Blueprint $table) {
            $table->time('hora_atencion')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('hoja_registro_atencion', function (Blueprint $table) {
            $table->dropColumn('hora_atencion');
        });
    }
    
};
