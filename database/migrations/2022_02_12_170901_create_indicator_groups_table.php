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
            $table->dateTime('deleted_at')->nullable();
            $table->foreignIdFor(Unit::class)->nullable();
            $table->foreignIdFor(Division::class)->default(0);
            $table->foreignIdFor(UnitRank::class)->nullable();
            $table->foreignIdFor(FinancialYear::class)->nullable();
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
