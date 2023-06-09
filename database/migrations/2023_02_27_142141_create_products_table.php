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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')
                ->constrained('categories', 'id');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedFloat('price');
            $table->unsignedFloat('compare_price')->nullable();
            $table->unsignedFloat('cost')->nullable(); 
            $table->unsignedSmallInteger('quantity')->default(0);
            $table->string('sku')->nullable()->unique();  // Stock Keeping Unit 
            $table->string('barcode')->nullable();
            // status : active 3 , draft 2 , archived 3
            $table->enum('status', ['active', 'draft', 'archived'])
                ->default('active');
            $table->enum('availability', ['in-stock', 'out-of-stock', 'back-order'])
                ->default('in-stock');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
