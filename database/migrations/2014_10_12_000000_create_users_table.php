<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            //roles in system
            $table->integer('role')->default(1);

            //personal details
            $table->string('phoneNumber')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('icNumber')->nullable();

            //employment details
            $table->string('employeeNo')->nullable();
            $table->dateTime('startDate')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();

            //compensation
            $table->double('fixedSalary')->default(1000);
            $table->string('bankName')->nullable();
            $table->string('bankAccountNumber')->nullable();

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
