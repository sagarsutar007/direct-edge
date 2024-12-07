@extends('adminlte::page')

@section('title', 'List of Sliders')

@section('content')
<div class="col-md-12">
    <div class="card my-3">
        <div class="card-header">
            <h3 class="card-title">List of Sliders</h3>
            <div class="card-tools">
                <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-fw fa-plus"></i> Add New Slider</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="sliders">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Slider Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($slider->title) }}</td>
                            <td>{{ Str::limit($slider->description, 100) }}</td>
                            <td>{{ $slider->status ? 'Published' : 'Not Published' }}</td>
                            <td>
                                <a href="{{ route('sliders.edit', ['slider' => $slider]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('sliders.destroy', ['slider' => $slider]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this slider?')">
                                        <i class="fas fa-trash"></i> 
                                    </button>
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
@stop

@section('js')
    <script>
        $(function () {
            $('#sliders').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            // Show Success Message
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif
        });
    </script>
@stop
