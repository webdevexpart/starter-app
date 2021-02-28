@extends('layouts.backend.app')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    @role('admin')
                        Admin Dashboard (Hi, Admin)
                    @else
                        Dashboard
                    @endrole

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Users</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $usersCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Roles</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $rolesCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Menus</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $menusCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Pages</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $pagesCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Recent New Users </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Joined At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                         src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160' }}" alt="User Avatar">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $user->name }}</div>
                                                <div class="widget-subheading opacity-7">
                                                    @if ($user->role)
                                                        <span class="badge badge-info">{{ $user->role->name }}</span>
                                                    @else
                                                        <span class="badge badge-danger">No role found :(</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    @if ($user->status)
                                        <div class="badge badge-success">Active</div>
                                    @else
                                        <div class="badge badge-danger">Inactive</div>
                                    @endif
                                </td>
                                <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a class="btn btn-secondary btn-sm" href="{{ route('app.users.show',$user->id) }}">
                                        <i class="fas fa-eye mr-1"></i>
                                        <span>Show</span>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('app.users.edit',$user->id) }}">
                                        <i class="fas fa-edit mr-1"></i>
                                        <span>Edit</span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteData({{ $user->id }})">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $user->id }}"
                                          action="{{ route('app.users.destroy',$user->id) }}" method="POST"
                                          style="display: none;">
                                        @csrf()
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
