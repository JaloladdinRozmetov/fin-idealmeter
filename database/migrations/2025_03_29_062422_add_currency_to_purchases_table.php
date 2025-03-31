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
        Schema::table('purchases', function (Blueprint $table) {
            $table->enum('currency', ['USD', 'UZS'])->default('UZS')->after('entire_price_all');
        });
    }

    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('currency');
        });
    }
};
