<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->foreignId('fingerprint')->constrained('users')->onDelete('cascade');
            $table->string('api_key');
            $table->enum('type', ['ISSUE', 'IDEA', 'OTHER']);
            $table->string('device');
            $table->string('page');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
