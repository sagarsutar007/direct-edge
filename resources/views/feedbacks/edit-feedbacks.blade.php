@extends('adminlte::page')

@section('title', 'Edit Feedback')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('feedbacks.update', ['feedback' => $feedback]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Edit Feedback</h3>
                        <div class="card-tools">
                            <a href="{{ route('feedbacks') }}" class="btn btn-light btn-sm"><i class="fas fa-fw fa-th-large"></i> View Feedbacks</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $feedback->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" name="company" placeholder="Enter company" value="{{ $feedback->company }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" placeholder="Enter designation" value="{{ $feedback->designation }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-1">
                                    <label>Approved:</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="approved" id="yes" value="1" {{ $feedback->approved == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="approved" id="no" value="0" {{ $feedback->approved == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <select class="form-control" name="rating" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" {{ $feedback->rating == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="profile_img" accept="image/*,.avif,.webp">
                                <label class="custom-file-label">Upload Your Photo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter description" required>{{ $feedback->description }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
