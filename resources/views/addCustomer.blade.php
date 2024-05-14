@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Customer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="debtor_code">Debtor Code:</label>
                <input type="text" name="debtor_code" id="debtor_code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="business_name">Business Name:</label>
                <input type="text" name="business_name" id="business_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" name="email_address" id="email_address" class="form-control">
            </div>
            <div class="form-group">
                <label for="address_1">Address 1:</label>
                <input type="text" name="address_1" id="address_1" class="form-control">
            </div>
            <div class="form-group">
                <label for="address_2">Address 2:</label>
                <input type="text" name="address_2" id="address_2" class="form-control">
            </div>
            <div class="form-group">
                <label for="suburb">Suburb:</label>
                <input type="text" name="suburb" id="suburb" class="form-control">
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" name="state" id="state" class="form-control">
            </div>
            <div class="form-group">
                <label for="post_code">Post Code:</label>
                <input type="text" name="post_code" id="post_code" class="form-control">
            </div>
            <div class="form-group">
                <label for="email_billing">Email Billing:</label>
                <input type="email" name="email_billing" id="email_billing" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
