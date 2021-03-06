@extends('layouts.app')

@section('content')

<div class="container">
    {{-- Personal Details --}}
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Personal Details | <a href="/profile/edit">Edit Profile</a>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">ID</div>
                        <div class="col-md-6">{{ $user->id }}</div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Name</div>
                        <div class="col-md-6">{{ $user->name }}</div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Email</div>
                        <div class="col-md-6">{{ $user->email }}</div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Role</div>
                        <div class="col-md-6">{{ $user->role }}</div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Phone Number</div>
                        <div class="col-md-6">{{ $user->phoneNumber }}</div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Address</div>
                        <div class="col-md-6">{{ $user->address }}</div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Gender</div>
                        <div class="col-md-6">{{ $user->gender }}</div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Birthday</div>
                        <div class="col-md-6">{{ $user->birthday }}</div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">IC Number</div>
                        <div class="col-md-6">{{ $user->icNumber }}</div>
                    </div>
                    
                </div>
            </div>  
        </div>
    </div>
    
    {{-- Employment Details --}}
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Employment Details
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Employee Number</div>
                        <div class="col-md-6">{{ $user->employeeNo }}</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Start Date</div>
                        <div class="col-md-6">{{ $user->startDate }}</div>                    
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Position</div>
                        <div class="col-md-6">{{ $user->position }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Department</div>
                        <div class="col-md-6">{{ $user->department }}</div>
                    </div>
                    
                </div>
            </div>  
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Compensation Details
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Fixed Salary</div>
                        <div class="col-md-6">RM {{ $user->fixedSalary }}</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Bank Name</div>
                        <div class="col-md-6">{{ $user->bankName }}</div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">Bank Account Number</div>
                        <div class="col-md-6">{{ $user->bankAccountNumber }}</div>
                    </div>
                    
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection