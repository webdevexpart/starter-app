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
                <div>Mail Settings</div>
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

            <form method="POST" action="{{ route('app.settings.mail.update') }}">
                @csrf
                @method('PUT')

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="mail_mailer">Mailer</label>
                                    <input id="mail_mailer" type="text" class="form-control
                            @error('mail_mailer') is-invalid @enderror" name="mail_mailer"
                                           placeholder="Mailer"
                                           value="{{ setting('mail_mailer') ?? old('mail_mailer') }}" autocomplete="mail_mailer" required>

                                    @error('mail_mailer')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="mail_encryption">Mail Encryption</label>
                                    <input id="mail_encryption" type="text" class="form-control
                            @error('mail_encryption') is-invalid @enderror" name="mail_encryption"
                                           placeholder="Mail Encription"
                                           value="{{ setting('mail_encryption') ?? old('mail_encryption') }}" autocomplete="mail_encryption" required>

                                    @error('mail_encryption')
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
                                    <label for="mail_host">Mail Host</label>
                                    <input id="mail_host" type="text" class="form-control
                            @error('mail_host') is-invalid @enderror" name="mail_host"
                                           placeholder="Mail Host"
                                           value="{{ setting('mail_host') ?? old('mail_host') }}" autocomplete="mail_host" required>

                                    @error('mail_host')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="mail_port">Mail Port</label>
                                    <input id="mail_port" type="text" class="form-control
                            @error('mail_port') is-invalid @enderror" name="mail_port"
                                           placeholder="Mail Port"
                                           value="{{ setting('mail_port') ?? old('mail_port') }}" autocomplete="mail_port" required>

                                    @error('mail_port')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="mail_username">Mail Username</label>
                            <input id="mail_username" type="email" class="form-control
                            @error('mail_username') is-invalid @enderror" name="mail_username"
                                   placeholder="Mail Username"
                                   value="{{ setting('mail_username') ?? old('mail_username') }}" autocomplete="mail_username" required>

                            @error('mail_username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mail_password">Mail Password</label>
                            <input id="mail_password" type="password" class="form-control
                            @error('mail_password') is-invalid @enderror" name="mail_password"
                                   placeholder="*******"
                                   value="{{ setting('mail_password') ?? old('mail_password') }}" autocomplete="mail_password" required>

                            @error('mail_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mail_from_address">Mail From Address</label>
                            <input id="mail_from_address" type="text" class="form-control
                            @error('mail_from_address') is-invalid @enderror" name="mail_from_address"
                                   placeholder="Mail From Address"
                                   value="{{ setting('mail_from_address') ?? old('mail_from_address') }}" autocomplete="mail_from_address" required>

                            @error('mail_from_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mail_from_name">Mail From Name</label>
                            <input id="mail_from_name" type="text" class="form-control
                            @error('mail_from_name') is-invalid @enderror" name="mail_from_name"
                                   placeholder="Mail From Name"
                                   value="{{ setting('mail_from_name') ?? old('mail_from_name') }}" autocomplete="mail_from_name" required>

                            @error('mail_from_name')
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

