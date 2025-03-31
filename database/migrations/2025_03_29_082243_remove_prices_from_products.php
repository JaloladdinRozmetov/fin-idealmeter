<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['dealer_price', 'sale_price']);
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('dealer_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
        });
    }
};
