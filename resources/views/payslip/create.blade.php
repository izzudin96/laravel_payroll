@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            
            {{-- Error Box --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- Panel Start --}}
            <div class="panel panel-default">

                {{-- Panel Heading --}}
                <div class="panel-heading">
                    Generate Payslip
                </div>
                
                {{-- Panel Body --}}
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/payslip">
                        {{ csrf_field() }}

                        {{-- Employee Name --}}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Generate For</label>
                            <div class="col-md-6">
                                <select name="user_id" class="form-control" autofocus>
                                    <option disabled selected>Select an employee</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Month --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Month</label>
                            <div class="col-md-6">
                                <select name="month" class="form-control" required>
                                    <option disabled>Select a month</option>
                                    <option value="{{ date("F") }}">{{ date("F") }}</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>

                        {{-- Year --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Year</label>
                            <div class="col-md-6">
                                <input type="numeric" class="form-control" name="year" value="{{ date("Y") }}" placeholder ="2017" required>
                            </div>
                        </div>
                        
                        {{-- Addition --}}
                        <hr>
                        
                        {{-- General Allowance --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">General Allowance</label>
                            <div class="col-md-6">
                                <input type="numeric" class="form-control" name="generalAllowance" value="{{ old('generalAllowance') }}" placeholder="1000" required>
                            </div>
                        </div>
                        
                        {{-- Overtime --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Overtime</label>
                            <div class="col-md-6">
                                <input type="numeric" class="form-control" name="overtime" value="{{ old('overtime') }}" placeholder="2000" required>
                            </div>
                        </div>

                        {{-- Claims --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Claims</label>
                            <div class="col-md-6">
                                <input type="numeric" class="form-control" name="claims" value="{{ old('claims') }}" placeholder="3000" required>
                            </div>
                        </div>

                        {{-- Bonus --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Bonus</label>
                            <div class="col-md-6">
                                <input type="numeric" class="form-control" name="bonus" value="{{ old('bonus') }}" placeholder="4000" required>
                            </div>
                        </div>
                                                
                        {{-- Deduction --}}
                        <hr>

                        {{-- EPF Deduction Percentage --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">EPF Deduction (%)</label>
                            <div class="col-md-6">
                                <select name="epfDeductionPercentage" class="form-control" required>
                                    <option disable>Select a rate</option>
                                    <option value="8" selected="8">8%</option>
                                    <option value="11">11%</option>
                                </select>
                            </div>
                        </div>
                        
                        {{-- Zakat --}}
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Zakat</label>
                            <div class="col-md-6">
                                <input type="numeric" class="form-control" name="zakat" value="{{ old('zakat') }}" placeholder="5000" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection