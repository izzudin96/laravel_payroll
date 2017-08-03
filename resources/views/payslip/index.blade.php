@extends('layouts.app')

@section('content')

<div class="container">
    {{-- Personal Details --}}
    @foreach($payslips as $payslip)
        <div class="row">
            <div class="col-md-offset-3 col-md-7">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Pay {{ $payslip->user->name }} for {{ $payslip->month }} {{ $payslip->year }}
                    </div>
        
                    <div class="panel-body">
                        <div class="col-md-4">Payslip ID</div>
                        <div class="col-md-6">{{ $payslip->id }}</div>
                    </div>
                    
                </div>  
            </div>
        </div>
    @endforeach
</div>
@endsection