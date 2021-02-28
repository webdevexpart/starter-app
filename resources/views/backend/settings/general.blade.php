@extends('layouts.backend.app')

@section('content')
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>General Settings</div>
            </div>
            <div class="page-title-actions">
                <a href="{{route('app.dashboard')}}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fa fa-arrow-alt-circle-left mr-1"></i>
                    <span>Back</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            @include('backend.settings.sidebar')
        </div>
        <div class="col-9">

            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How To Use:</h5>
                    <p>You can output a setting anywhere on your site by calling <code>setting('key')</code></p>
                </div>
            </div>

            <form method="POST" action="{{ route('app.settings.general.update') }}">
                @csrf
                @method('PUT')

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="site_title">Site Title</label>
                            <input id="site_title" type="text" class="form-control
                            @error('site_title') is-invalid @enderror" name="site_title" value="{{ setting('site_title') ?? old('site_title') }}" autocomplete="site_title" required>

                            @error('site_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site_description">Site Description</label>
                            <textarea id="site_description" class="form-control
                            @error('site_description') is-invalid @enderror" name="site_description">{{ setting('site_description') ?? old('site_description') }}</textarea>

                            @error('site_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site_address">Site Address</label>
                            <textarea id="site_address" class="form-control
                            @error('site_address') is-invalid @enderror" name="site_address">{{ setting('site_address') ?? old('site_address') }}</textarea>

                            @error('site_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                                <i class="fas fa-arrow-circle-up mr-1"></i>
                                <span>Update</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

