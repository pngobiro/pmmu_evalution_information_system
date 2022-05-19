<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Unit;
use App\Models\UnitRank;
use App\Models\FinancialYear;
use App\Models\Division;

class CreateIndicatorGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('description');
            $table->integer('order');
            $table->foreignIdFor(Unit::class);
            $table->foreignIdFor(Division::class);
            $table->foreignIdFor(UnitRank::class);
            $table->foreignIdFor(FinancialYear::class);
            $table->integer('indicator_group_created_by');
            $table->integer('indicator_group_deleted_by')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

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
        Schema::dropIfExists('indicator_groups');
    }
}



