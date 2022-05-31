<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\IndicatorGroup;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\MasterIndicator;


class CreateTemplateIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MasterIndicator::class);
            $table->mediumText('name');
            $table->foreignIdFor(IndicatorGroup::class);
            $table->foreignIdFor(IndicatorType::class);
            $table->foreignIdFor(IndicatorUnitOfMeasure::class);
            $table->decimal('indicator_weight', 5, 2)->nullable();
            $table->decimal('indicator_target', 10, 2)->nullable();
            $table->decimal('indicator_achivement', 10, 2)->nullable();
            $table->boolean('is_backlog_indicator')->default(false);
            $table->mediumText('remarks')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('order');
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
        Schema::dropIfExists('template_indicators');
    }
}

