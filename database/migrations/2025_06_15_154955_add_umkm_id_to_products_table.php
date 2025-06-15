<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) { 
            $table->unsignedBigInteger('umkm_id')->nullable()->after('id');
            $table->string('image')->nullable()->after('price');

            $table->foreign('umkm_id')->references('id')->on('umkms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['umkm_id']);
            // Drop the umkm_id column
            $table->dropColumn('umkm_id');
            // Drop the image column
            $table->dropColumn('image');
        });
    }
};
