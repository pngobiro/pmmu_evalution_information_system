<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\IndicatorGroup;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\UnitRank;
use App\Models\Unit;

class CreateMasterIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(UnitRank::class);
            $table->foreignIdFor(Unit::class)->nullable();
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
        Schema::dropIfExists('master_indicators');
    }
}
