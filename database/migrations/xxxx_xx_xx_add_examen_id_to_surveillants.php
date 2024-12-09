<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamenIdToSurveillants extends Migration
{
    public function up()
    {
        Schema::table('surveillants', function (Blueprint $table) {
            if (!Schema::hasColumn('surveillants', 'examen_id')) {
                $table->foreignId('examen_id')->constrained('examens')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('surveillants', function (Blueprint $table) {
            $table->dropForeign(['examen_id']);
            $table->dropColumn('examen_id');
        });
    }
} 
