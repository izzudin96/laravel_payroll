@extends('layouts.app')

@section('content')

<div class="container">
    {{-- All users --}}
    @foreach($users as $user)
    <div class="row">
        <div class="col-md-offset-3 col-md-7">
            <div class="panel panel-default">

                <div class="panel-heading">
                    User #{{ $user->id }} | <a href="/users/{{ $user->id }}">View</a>
                </div>

                <div class="panel-body">
                    {{-- Payslip's Employee Details --}}

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Name</strong></div>
                        <div class="col-md-6">({{ $user->employeeNo }}) {{ $user->name }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Email</strong></div>
                        <div class="col-md-6">{{ $user->email }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Position</strong></div>
                        <div class="col-md-6">{{ $user->position }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-3"><strong>Department</strong></div>
                        <div class="col-md-6">{{ $user->department }}</div>
                    </div>

                </div>

            </div>  
        </div>
    </div>
    @endforeach
</div>
@endsection