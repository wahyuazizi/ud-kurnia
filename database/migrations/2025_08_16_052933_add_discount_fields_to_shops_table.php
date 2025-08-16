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
        Schema::table('shops', function (Blueprint $table) {
            $table->string('discount_text')->nullable();
            $table->string('discount_item')->nullable();
            $table->string('discount_image')->nullable();
            $table->string('discount2_text')->nullable();
            $table->string('discount2_item')->nullable();
            $table->string('discount2_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn([
                'discount_text',
                'discount_item',
                'discount_image',
                'discount2_text',
                'discount2_item',
                'discount2_image',
            ]);
        });
    }
};