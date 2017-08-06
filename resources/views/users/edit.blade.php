@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Personal Details --}}
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Personal Details
                </div>
                
                <form class="form-horizontal" role="form" method="POST" action="/users/{{ $user->id }}">
                    {{ csrf_field() }} {{ method_field("PATCH") }}
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="phoneNumber" value="{{ $user->phoneNumber }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                            <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="gender" value="{{ $user->gender }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birthday</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="birthday" value="{{ $user->birthday }}" placeholder="yyyy-mm-dd hh:mm:ss" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">IC Number</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="icNumber" value="{{ $user->icNumber }}" required>
                            </div>
                        </div>

                        <hr>
                        {{-- Employement Details --}}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee No</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="employeeNo" value="{{ $user->employeeNo }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Start Date</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="startDate" value="{{ $user->startDate }}" placeholder="yyyy-mm-dd hh:mm:ss" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Position</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="position" value="{{ $user->position }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="department" value="{{ $user->department }}" required>
                            </div>
                        </div>
                        
                        <hr>
                        {{-- Compensation Details --}}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fixed Salary</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="fixedSalary" value="{{ $user->fixedSalary }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bank Name</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="bankName" value="{{ $user->bankName }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bank Account Number</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="bankAccountNumber" value="{{ $user->bankAccountNumber }}" required>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>
@endsection