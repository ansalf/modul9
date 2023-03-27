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
        Schema::create('students', function (Blueprint $table) {
           /** $table->id();
           * $table->char('nim',8)->unique();
            *$table->string('nama');
            *$table->string('tempat_lahir');
            *$table->date('tanggal_lahir');
            *$table->string('fakultas');
            *$table->string('jurusan');
            *$table->decimal('ipk', 3, 2)->default(1.00);
            *$table->timestamps();*/ 

            //modifikasi migration
            $table->renameColumn('students','nama_lengkap');
            $table->text('alamat')->after('tanggal_lahir');
            $table->dropColumn('ipk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table){
            $table->renameColumn('nama','nama_lengkap');
            $table->dropColumn('alamat');
            $table->decimal('ipk', 3,2)->default(1.00);
        });
    }
};
