<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\UnitRank;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unique_id')->unique();
            $table->string('unique_code')->unique();
            $table->boolean('has_division')->default(false);
            $table->boolean('has_cts')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->boolean('has_pmmu_division')->default(false);
            $table->foreignIdFor(UnitRank::class)->constrained();
            $table->bigInteger('head_id_fk')->unsigned();
            $table->bigInteger('subhead_id_fk')->unsigned();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('units');
    }
}
