@extends('layouts.backend.app')

@section('content')
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-lock  icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> Profile Security </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('app.profile.password.update') }}">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">UPDATE PASSWORD</h5>

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input id="current_password" type="password" class="form-control
                            @error('current_password') is-invalid @enderror" name="current_password" autofocus required }}>

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" class="form-control
                            @error('password') is-invalid @enderror" name="password" autofocus required }}>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control
                            @error('password') is-invalid @enderror" name="password_confirmation" autofocus required }}>

                            </div>

                            <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-arrow-circle-up mr-1"></i>
                                    <span>Update</span>
                            </button>


                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

