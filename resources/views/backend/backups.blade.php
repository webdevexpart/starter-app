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
                        <i class="pe-7s-cloud icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Backups </div>
                </div>
                <div class="page-title-actions">

                    <button onclick="event.preventDefault();
                          document.getElementById('clean-old-backups').submit();"
                            class="btn-shadow btn btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-trash fa-w-20"></i>
                        </span>
                        {{ __('Clean Old Backups') }}
                    </button>
                    <form id="clean-old-backups" action="{{ route('app.backups.clean') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button type="button" onclick="event.preventDefault();
                          document.getElementById('new-backup-form').submit();"
                            class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-plus-circle fa-w-20"></i>
                        </span>
                        {{ __('Create New Backup') }}
                    </button>
                    <form id="new-backup-form" action="{{ route('app.backups.store') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


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
                                    <th class="text-center">File Name</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($backups as $key => $backup)
                                <tr>
                                    <td class="text-center text-muted">#{{ $key+1 }}</td>
                                    <td class="text-center">
                                        <code>{{ $backup['file_name'] }}</code>
                                    </td>
                                    <td class="text-center">{{ $backup['file_size'] }}</td>
                                    <td class="text-center">{{ $backup['created_at'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('app.backups.download', $backup['file_name'] )}}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-download mr-1"></i>
                                            <span>Download</span>
                                        </a>

                                        <button id="" type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $key }})">
                                            <i class="fas fa-trash mr-1"></i>
                                            <span>Delete</span>
                                        </button>

                                        <form id="delete-form-{{ $key }}" method="POST" action="{{ route('app.backups.destroy', $backup['file_name']) }}" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

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