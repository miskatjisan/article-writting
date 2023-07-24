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
        Schema::create('withdrows', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('username');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->float('withdrow')->default(0);
            $table->string('currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrows');
    }
};
