@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Payslip #{{ $payslip->id }}
                </div>

                <div class="panel-body">
                    {{-- Payslip's Employee Details --}}

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Name</strong></div>
                        <div class="col-md-6">({{ $payslip->user->employeeNo }}) {{ $payslip->user->name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Month</strong></div>
                        <div class="col-md-6">{{ $payslip->month }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Year</strong></div>
                        <div class="col-md-6">{{ $payslip->year }}</div>
                    </div>

                    <hr>
                    {{-- Additions --}}

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Basic Salary</strong></div>
                        <div class="col-md-6">RM {{ $payslip->user->fixedSalary }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>General Allowance</strong></div>
                        <div class="col-md-6">RM {{ $payslip->generalAllowance }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Overtime</strong></div>
                        <div class="col-md-6">RM {{ $payslip->overtime }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Claims</strong></div>
                        <div class="col-md-6">RM {{ $payslip->claims }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Bonus</strong></div>
                        <div class="col-md-6">RM {{ $payslip->bonus }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Total Addition</strong></div>
                        <div class="col-md-6"><strong>RM {{ $payslip->totalAdditions }}</strong></div>
                    </div>
                    
                    <hr>
                    {{-- Deduction --}}

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>EPF Deduction ({{ $payslip->epfDeductionPercentage }}%)</strong></div>
                        <div class="col-md-6">RM {{ $payslip->epfDeduction }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Socso Deduction</strong></div>
                        <div class="col-md-6">RM {{ $payslip->socsoDeduction }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Tax Deduction</strong></div>
                        <div class="col-md-6">RM {{ $payslip->taxDeduction }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Zakat</strong></div>
                        <div class="col-md-6">RM {{ $payslip->zakat }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Total Deductions</strong></div>
                        <div class="col-md-6"><strong>RM {{ $payslip->totalDeductions }}</strong></div>
                    </div>
                    
                    <hr>
                    {{-- Company Contributions --}}

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Company EPF Contribution</strong></div>
                        <div class="col-md-6">RM {{ $payslip->companyEpfContribution }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Company Socso Contribution</strong></div>
                        <div class="col-md-6">RM {{ $payslip->companySocsoContribution }}</div>
                    </div>
                    
                    <hr>

                    {{-- Summary --}}
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5"><strong>Net Pay</strong></div>
                        <div class="col-md-6"><strong>RM {{ $payslip->netPay }}</strong></div>
                    </div>
                    
                    {{-- Delete Payslip --}}
                    <div class="row">
                        <div class="col-md-offset-1">
                            <form role="form" method="POST" action="/payslip/{{ $payslip->id }}">
                                {{ csrf_field() }} {{ method_field("DELETE") }}
                                <button type="submit" class="btn btn-link">
                                    Delete Payslip
                                </button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection