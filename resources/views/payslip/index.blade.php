@extends('layouts.app')

@section('content')

<div class="container">
    {{-- Personal Details --}}
    @foreach($payslips as $payslip)
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Payslip #{{ $payslip->id }} | <a href="/payslip/{{ $payslip->id }}">View</a>
                </div>

                <div class="panel-body">
                    {{-- Payslip's Employee Details --}}

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Name</strong></div>
                        <div class="col-md-6">({{ $payslip->user->employeeNo }}) {{ $payslip->user->name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Pay</strong></div>
                        <div class="col-md-6">{{ $payslip->month }} {{ $payslip->year }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Net Pay</strong></div>
                        <div class="col-md-6">RM {{ $payslip->netPay }}</div>
                    </div>

                </div>

            </div>  
        </div>
    </div>
    @endforeach
</div>
@endsection