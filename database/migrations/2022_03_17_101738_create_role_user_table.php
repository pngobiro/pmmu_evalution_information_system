<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->primary(['role_id', 'user_id']);
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->dateTime('deleted_at')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // drop cascade user_id
            

        });
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
