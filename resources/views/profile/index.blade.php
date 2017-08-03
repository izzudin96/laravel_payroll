@extends('layouts.app')

@section('content')

<div class="container">
    {{-- Personal Details --}}
    <div class="row">
        <div class="col-md-offset-3 col-md-7">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Personal Details | <a href="/profile/edit">Edit Profile</a>
                </div>
    
                <div class="panel-body">
                    <div class="col-md-4">ID</div>
                    <div class="col-md-6">{{ $user->id }}</div>

                    <div class="col-md-4">Name</div>
                    <div class="col-md-6">{{ $user->name }}</div>

                    <div class="col-md-4">Email</div>
                    <div class="col-md-6">{{ $user->email }}</div>

                    <div class="col-md-4">Role</div>
                    <div class="col-md-6">{{ $user->role }}</div>

                    <div class="col-md-4">Phone Number</div>
                    <div class="col-md-6">{{ $user->phoneNumber }}</div>

                    <div class="col-md-4">Address</div>
                    <div class="col-md-6">{{ $user->address }}</div>

                    <div class="col-md-4">Gender</div>
                    <div class="col-md-6">{{ $user->gender }}</div>

                    <div class="col-md-4">Birthday</div>
                    <div class="col-md-6">{{ $user->birthday }}</div>

                    <div class="col-md-4">IC Number</div>
                    <div class="col-md-6">{{ $user->icNumber }}</div>
                </div>
            </div>  
        </div>
    </div>
    
    {{-- Employment Details --}}
    <div class="row">
        <div class="col-md-offset-3 col-md-7">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Employment Details
                </div>
    
                <div class="panel-body">
                    <div class="col-md-4">Employee Number</div>
                    <div class="col-md-6">{{ $user->employeeNo }}</div>

                    <div class="col-md-4">Start Date</div>
                    <div class="col-md-6">{{ $user->startDate }}</div>

                    <div class="col-md-4">Position</div>
                    <div class="col-md-6">{{ $user->position }}</div>

                    <div class="col-md-4">Department</div>
                    <div class="col-md-6">{{ $user->department }}</div>
                </div>
            </div>  
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-3 col-md-7">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Compensation Details
                </div>
    
                <div class="panel-body">
                    <div class="col-md-4">Fixed Salary</div>
                    <div class="col-md-6">RM {{ $user->fixedSalary }}</div>

                    <div class="col-md-4">Bank Name</div>
                    <div class="col-md-6">{{ $user->bankName }}</div>

                    <div class="col-md-4">Bank Account Number</div>
                    <div class="col-md-6">{{ $user->bankAccountNumber }}</div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection