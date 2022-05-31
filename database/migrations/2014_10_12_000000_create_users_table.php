<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('designation')->nullable();
            $table->string('phone_number')->unique();
            $table->integer('login_attempts')->default(0);
            $table->dateTime('last_login_time')->nullable();
            $table->string('sms_verification_code')->unique()->nullable();
            $table->string('pj_number')->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->nullable();
            $table->string('password');        
            $table->timestamp('password_reset_time')->nullable();
            $table->boolean('default_password_set')->default(false);
            $table->boolean('is_active')->default(true);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->rememberToken();
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

        Schema::dropIfExists('users');
      
    
    }
}
