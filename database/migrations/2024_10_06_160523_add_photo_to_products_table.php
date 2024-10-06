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
        Schema::table('products', function (Blueprint $table) {
            $table->string('photo')->nullable(); // Menambahkan kolom photo
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('photo'); // Menghapus kolom photo jika migrasi dibatalkan
        });
    }

    /**
     * Reverse the migrations.
     */
    
};
