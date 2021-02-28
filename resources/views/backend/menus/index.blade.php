@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Menu </div>
                </div>
                <div class="page-title-actions">

                    <a href="{{ route('app.menus.create') }}" class="btn-shadow mr-3 btn btn-primary">
                        <i class="fa fa-plus-circle mr-1"></i>
                        <span>Create Menu</span>
                    </a>


                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="table-responsive">
                        <table id="dataTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $key=>$menu)
                                <tr>
                                    <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                    <td>
                                        <code>{{ $menu->name }}</code>
                                    </td>
                                    <td>
                                        {{ $menu->description }}
                                    </td>

                                    <td class="text-center">

                                        <a class="btn btn-success btn-sm" href="{{ route('app.menus.builder',$menu->id) }}">
                                            <i class="fas fa-list-ul mr-1"></i>
                                            <span>Builder</span>
                                        </a>

                                        <a class="btn btn-info btn-sm" href="{{ route('app.menus.edit',$menu->id) }}">
                                            <i class="fas fa-edit mr-1"></i>
                                            <span>Edit</span>
                                        </a>
                                        @if($menu->deletable == true)
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="deleteData({{ $menu->id }})">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            <span>Delete</span>
                                        </button>
                                        <form id="delete-form-{{ $menu->id }}"
                                              action="{{ route('app.menus.destroy',$menu->id) }}" method="POST"
                                              style="display: none;">
                                            @csrf()
                                            @method('DELETE')
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    </script>
@endpush
