@extends('layouts.app')

@section('content')


 @foreach($profiles as $profile)
 
        @if (Auth::user()->id == $profile->user_id )
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                          <div>
                          <img src="/photos/{{$profile->path}}"   id="path"  name="path" value="{{ old('path', $profile->path) }}" class="img-fluid rounded-circle mb-3" alt="{{$profile->path}}" style="width: 150px; height: 150px;">
                            <input type="file" class="form-control-file mb-3" id="path" name="path" accept="image/*" onchange="document.getElementById('path').src = window.URL.createObjectURL(this.files[0])">
                          </div>

                        <div class="form-group mb-3">                      
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $profile->address) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brithday">Birthday</label>
                            <input type="date" class="form-control" id="brithday" name="brithday" value="{{ old('brithday', $profile->brithday) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="site">Site</label>
                            <input type="text" class="form-control" id="site" name="site" value="{{ old('site', $profile->site) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" value="{{ old('gender', $profile->gender) }}" required>
                                   <option value="male">Male</option>
                                     <option value="female">Female</option>
                            </select>
                        </div>
                      
                          <button type="submit" class="btn btn-primary">Update Profile</button>
                          <a href="/profile" class="btn btn-secondary">Cancel</a>
                 </form>

        @endif
  @endforeach                   
  @endsection







