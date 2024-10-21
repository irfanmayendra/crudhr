<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToKaryawansTable extends Migration
{
    public function up()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->string('nama')->after('id'); // Atur posisi sesuai kebutuhan
        });
    }

    public function down()
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }
}
