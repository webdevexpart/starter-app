@extends('layouts.backend.app')

@section('content')
    <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ isset($menu) ? 'Edit' : 'Create' }} Menu</div>
            </div>
            <div class="page-title-actions">
                <a href="{{route('app.menus.index')}}" class="btn-shadow mr-3 btn btn-danger">
                    <i class="fa fa-arrow-alt-circle-left mr-1"></i>
                    <span>Back to list</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ isset($menu) ? route('app.menus.update', $menu->id) : route('app.menus.store') }}">
                @csrf
                @isset($menu)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Info</h5>

                                <div class="form-group">
                                    <label for="name">Menu Name</label>
                                    <input id="name" type="text" class="form-control
                            @error('name') is-invalid @enderror" name="name" value="{{ $menu->name ?? old('name') }}" autocomplete="name" autofocus {{ !isset($menu) ? 'required' : '' }}>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control
                            @error('description') is-invalid @enderror" name="description">{{ $menu->description ?? old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($menu)
                                        <i class="fas fa-arrow-circle-up mr-1"></i>
                                        <span>Update</span>
                                    @else
                                        <i class="fas fa-plus-circle mr-1"></i>
                                        <span>Create</span>
                                    @endisset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

