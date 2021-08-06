@extends('user.userlayout')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
      <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  <div class="row">
    <div class="col">
      <div class="card mb-4">
          <div class="card-body">
            <form action="/update-password" method="POST">
                @csrf
              <div class="form-group">
                <label for="oldpassword">Old password</label>
                <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" id="oldpassword"
                  placeholder="Enter your old password">

                  @error('oldpassword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
              <div class="form-group">
                  <label for="newpassword">New password</label>
                  <input type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" id="newpassword"
                    placeholder="Enter your new password">


                    @error('newpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                  <label for="confirmpassword">Confirm password</label>
                  <input type="password" class="form-control @error('confirmpassword') is-invalid @enderror" name="confirmpassword" id="confirmpassword"
                    placeholder="Enter your new password again">


                    @error('confirmpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-info">Change password</button>
            </form>
          </div>
        </div>
    </div>
  </div>
  </div>
  <!---Container Fluid-->
@endsection
