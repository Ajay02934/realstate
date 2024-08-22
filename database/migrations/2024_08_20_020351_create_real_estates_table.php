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
        Schema::create('realestate', function (Blueprint $table) {
           

                $table->id();
                $table->string('name', 128);
                $table->enum('real_state_type', ['house', 'department', 'land', 'commercial_ground']);
                $table->string('street', 128);
                $table->string('external_number', 12);
                $table->string('internal_number', 12)->nullable();
                $table->string('neighborhood', 128);
                $table->string('city', 64);
                $table->string('country', 5);
                $table->integer('rooms');
                $table->integer('bathrooms');
                $table->string('comments', 128)->nullable();
                $table->softDeletes();
                $table->timestamps();
            });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestate');
    }
};
