@extends('adminlte::page')

@section('title', 'Feedback Lists')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card my-5 mx-3">
            <div class="card-header">
                <h3 class="card-title">Feedback Lists</h3>
                <div class="card-tools">
                    <a href="{{ route('feedbacks.create') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-fw fa-plus"></i> Add New Feedback</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Designation</th>
                                <!-- <th>Image</th> -->
                                <th>Description</th>
                                <th>Rating</th>
                                <th>Approved</th>
                                <th>Created At</th>
                                <th>Actions</th> <!-- New column for edit and delete buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $feedback->name }}</td>
                                <td>{{ $feedback->company }}</td>
                                <td>{{ $feedback->designation }}</td>
                                <!-- <td>
                                    @if($feedback->profile_img)
                                    <img src="{{ asset('assets/uploads/' . $feedback->profile_img) }}" alt="Feedback Image" style="max-width: 100px;">
                                    @else
                                    No Image
                                    @endif
                                </td> -->
                                <td>{{ $feedback->description }}</td>
                                <td>{{ $feedback->rating }}</td>
                                <td>{{ $feedback->approved ? 'Yes' : 'No'  }}</td>
                                <td>{{ $feedback->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('feedbacks.edit', ['feedback' => $feedback]) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                    </a>
                                    <form action="{{ route('feedbacks.destroy', ['feedback' => $feedback]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?')">
                                            <i class="fas fa-trash"></i> <!-- Delete Icon -->
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
</div>

@endsection
