<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->enum('role', ['STUDENT', 'ADMIN'])->default('STUDENT');
            $table->string('photo')->nullable();

            $table->string('id_card_address');
            $table->string('address');
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->bigInteger('telephone_number');
            $table->bigInteger('phone_number');
            $table->string('email')->unique();

            $table->enum('citizenship', ['WNI Asli', 'WNI Keturunan', 'WNA']);
            $table->string('other_country_citizenship')->nullable();
            $table->date('birth_of_date');

            $table->string('birth_address');
            $table->string('birth_province');
            $table->string('birth_regency');
            $table->string('other_country')->nullable();

            $table->enum('gender', ['Pria', 'Wanita']);
            $table->enum('marriage_status', ['Belum Menikah', 'Menikah', 'Lain-lain']);
            $table->enum('religion', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Budha', 'Lain-lain']);

            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
