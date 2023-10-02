<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->bigInteger('mobile');
            $table->bigInteger('code_number_id')->unsigned()->index()->nullable();
            $table->foreign('code_number_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('instagram')->nullable();
            $table->text('website')->nullable();
            $table->string('country');
            $table->string('city');
            $table->bigInteger('other_number')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
