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
            $table->integer('user_id');
            $table->string('month');
            $table->integer('year');

            //allowance
            $table->double('generalAllowance');
            $table->double('overtime');
            $table->double('claims');
            $table->double('bonus');

            //Total Additions
            $table->double('totalAdditions');
            
            //deduction
            $table->double('epfDeductionPercentage');
            $table->double('epfDeduction');
            $table->double('socsoDeduction');
            $table->double('taxDeduction');
            $table->double('zakat');

            //Total Deduction
            $table->double('totalDeductions');

            //company contributions
            $table->double('companyEpfContribution');
            $table->double('companySocsoContribution');

            //summary
            $table->double('netPay')->nullable();

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
