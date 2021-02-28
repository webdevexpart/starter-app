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
                <div>Socialite Settings</div>
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

            <form method="POST" action="{{ route('app.settings.socialite.update') }}">
                @csrf
                @method('PUT')

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="google_client_id">Google Client ID</label>
                                    <input id="google_client_id" type="text" class="form-control
                            @error('google_client_id') is-invalid @enderror" name="google_client_id"
                                           placeholder="Client ID"
                                           value="{{ setting('google_client_id') ?? old('google_client_id') }}" autocomplete="google_client_id" required>

                                    @error('google_client_id')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="google_client_secret">Google Client Secret</label>
                                    <input id="google_client_secret" type="text" class="form-control
                            @error('google_client_secret') is-invalid @enderror" name="google_client_secret"
                                           placeholder="Client Secret"
                                           value="{{ setting('google_client_secret') ?? old('google_client_secret') }}" autocomplete="google_client_secret" required>

                                    @error('google_client_secret')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="github_client_id">Github Client ID</label>
                                    <input id="github_client_id" type="text" class="form-control
                            @error('github_client_id') is-invalid @enderror" name="github_client_id"
                                           placeholder="Client ID"
                                           value="{{ setting('github_client_id') ?? old('github_client_id') }}" autocomplete="github_client_id" required>

                                    @error('github_client_id')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="github_client_secret">Github Client Secret</label>
                                    <input id="github_client_secret" type="text" class="form-control
                            @error('github_client_secret') is-invalid @enderror" name="github_client_secret"
                                           placeholder="Client Secret"
                                           value="{{ setting('github_client_secret') ?? old('github_client_secret') }}" autocomplete="github_client_secret" required>

                                    @error('github_client_secret')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
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

