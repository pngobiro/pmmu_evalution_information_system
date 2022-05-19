<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\IndicatorGroup;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\MasterIndicator;


class CreateIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MasterIndicator::class);
            $table->mediumText('name');
            $table->foreignIdFor(IndicatorGroup::class);
            $table->foreignIdFor(IndicatorType::class);
            $table->foreignIdFor(IndicatorUnitOfMeasure::class);
            $table->integer('indicator_weight');
            $table->integer('indicator_target')->nullable();
            $table->integer('indicator_achivement')->nullable();
            $table->boolean('is_backlog_indicator')->default(false);
            $table->integer('indicator_status')->nullable();
            $table->mediumText('remarks')->nullable();
            $table->integer('order')->nullable();
            $table->integer('indicator_created_by');
            $table->integer('indicator_weight_created_by')->nullable();
            $table->integer('indicator_target_created_by')->nullable();
            $table->integer('indicator_achivement_created_by')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->integer('indicator_deleted_by')->nullable();
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
        Schema::dropIfExists('indicators');
    }
}

