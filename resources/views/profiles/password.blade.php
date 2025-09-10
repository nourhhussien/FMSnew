@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                      

                    <form action="/profile/password" method="POST">
    @csrf
    <div class="mb-3">
        <label for="currentPassword" class="form-label">Current Password</label>
        <input type="password" class="form-control" id="currentPassword" name="current_password" required>
    </div>

    <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" class="form-control" id="newPassword" name="new_password" required>

    </div>

    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" required> 
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
                     </form>


                </div>
            </div>
        </div>
    </div>
</div>













@endsection