@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Payslip #{{ $payslip->id }}
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">Test</div>
                        <div class="col-md-8">Test</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Test</div>
                        <div class="col-md-8">Test</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">Test</div>
                        <div class="col-md-8">Test</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection