@extends('adminlte::page')

@section('title', 'Openings')

@section('content_header')
    <h1  class="d-inline-block">Openings</h1>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Openings</li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Openings List</h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('openings.add') }}">Add New</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="openings" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th style="white-space: nowrap;">Action</th>
                            <th width="5%">Sno.</th>
                            <th>Job Title</th>
                            <th width="10%">Company</th>
                            <th>Positions</th>
                            <th>CTC</th>
                            <th>Type</th>
                            <th>Date Added</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#openings').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "paging": true,
                "info": true,
                "autoWidth":true,
                "buttons": [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible:not(.exclude)'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible:not(.exclude)'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.exclude)'
                        }
                    },
                    'colvis',
                ],
                "processing": true,
                "serverSide": true,
                "stateSave": true,
                "stateSaveParams": function(settings, data) {
                    data.search.search = '';
                },
                "ajax": {
                    "url": "{{ route('openings.fetchOpenings') }}",
                    "type": "POST",
                    "data": function ( d ) {
                        d._token = '{{ csrf_token() }}';
                    }
                },
                "columns": [
                    { "data": "actions", "name": "actions" },
                    { "data": "serial", "name": "serial" },
                    { "data": "title", "name": "title" },
                    { "data": "company_name", "name": "company_name" },
                    { "data": "vacancy_count", "name": "vacancy_count" },
                    { "data": "cost_to_company", "name": "cost_to_company" },
                    { "data": "type", "name": "type" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "updated_at", "name": "updated_at" },
                    
                ],
                "searching": true,
                "ordering": true,
                "columnDefs": [
                    {
                        "targets": [0, 1],
                        "orderable": false,
                    }
                ],
                "dom": 'lBfrtip',
            });


            // Show Error Messages
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            // Show Success Message
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif

            // Show Notices Message
            @if(session()->has('notice'))
                toastr.warning({{ session('notice') }});
            @endif
        });
    </script>
@stop