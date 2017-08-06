@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <a href="/payslip">View Payslip</a> | 
                    <a href="/profile">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
