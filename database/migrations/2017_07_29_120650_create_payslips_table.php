<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->string('month');
            $table->integer('year');

            //allowance
            $table->integer('generalAllowance');
            $table->integer('overtime');
            $table->integer('claims');
            $table->integer('bonus');
            
            //deduction
            $table->integer('epfDeductionPercentage');
            $table->integer('socsoDeduction');
            $table->integer('taxDeduction');
            $table->integer('zakat');

            //company contributions
            $table->integer('companyEpfContribution');
            $table->integer('companySocsoContribution');

            //summary
            $table->integer('netPay')->nullable();

            //status
            $table->integer('isVerified')->default(0);
            
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
        Schema::dropIfExists('payslips');
    }
}
