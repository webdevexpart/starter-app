@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <style>
        .dropify-wrapper .dropify-message p{
            font-size: initial;
        }
    </style>
@endpush

@section('content')
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Appearance Settings</div>
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

            <form method="POST" action="{{ route('app.settings.appearance.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="site_logo">Logo (Only image are allowed)</label>
                            <input id="site_logo" type="file" data-default-file="{{ setting('site_logo') != null ? Storage::url(setting('site_logo')) : '' }}" class="form-control dropify @error('site_logo') is-invalid @enderror" name="site_logo">

                            <p>
                                @error('site_logo')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="site_favicon">Favicon (Only image are allowed, Size: 33 x 33)</label>
                            <input id="site_favicon" type="file" data-default-file="{{ setting('site_favicon') != null ? Storage::url(setting('site_favicon')) : '' }}" class="form-control dropify @error('site_favicon') is-invalid @enderror" name="site_favicon">

                            <p>
                                @error('site_favicon')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </p>
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

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush

