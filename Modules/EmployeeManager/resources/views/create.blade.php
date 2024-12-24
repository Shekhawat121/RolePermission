@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="card-header">{{ isset($employee) ? 'Edit Employee' : 'Add Employee' }}</div>

                <div class="card-body">
                    <!-- Employee Form -->
                    <form method="POST" action="{{ isset($employee) ? route('employee.update', $employee->id) : route('employee.store') }}" id="employeeForm">
                        @csrf
                        @if (isset($employee))
                            @method('PUT')
                        @endif

                        <!-- Two-column layout -->
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="employee_id">Employee ID</label>
                                    <input type="text" 
                                        @if(@$employee->employee_id) readonly @endif 
                                        class="form-control @error('employee_id') is-invalid @enderror" 
                                        id="employee_id" 
                                        name="employee_id" 
                                        value="{{ old('employee_id', @$employee->employee_id ?? '') }}">

                                    @error('employee_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name ?? '') }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email ?? '') }}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $employee->dob ?? '') }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="doj">Date of Joining</label>
                                    <input type="date" class="form-control" id="doj" name="doj" value="{{ old('doj', $employee->doj ?? '') }}" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Employee</button>
                            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-script')
<script>
    $(document).ready(function() {
        // Initialize jQuery validation on the form
        $('#employeeForm').validate({
            rules: {
                employee_id: {
                    required: true,
                    digits: true
                },
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                dob: {
                    required: true,
                    date: true
                },
                doj: {
                    required: true,
                    date: true
                }
            },
            messages: {
                employee_id: {
                    required: "Please enter the Employee ID",
                    digits: "Employee ID must be a number"
                },
                name: {
                    required: "Please enter the name",
                    minlength: "Name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter the email address",
                    email: "Please enter a valid email address"
                },
                dob: {
                    required: "Please enter the date of birth",
                    date: "Please enter a valid date"
                },
                doj: {
                    required: "Please enter the date of joining",
                    date: "Please enter a valid date"
                }
            },
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            }
        });
    });
</script>
@endpush