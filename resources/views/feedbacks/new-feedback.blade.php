@extends('adminlte::page')

@section('title', 'Create Feedback')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('feedbacks.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Create Feedback</h3>
                        <div class="card-tools">
                            <a href="{{ route('feedbacks') }}" class="btn btn-light btn-sm"><i class="fas fa-fw fa-th-large"></i> View Feedbacks</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" name="company" placeholder="Enter company" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" placeholder="Enter designation" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-1">
                                    <label>Approved:</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="approved" id="yes" value="1" checked="">
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="approved" id="no" value="0">
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <select class="form-control" name="rating" required>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="profile_img" accept="image/*,.avif,.webp" required>
                                <label class="custom-file-label">Upload Your Photo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter description" required></textarea>
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

@section('js')
    <script>
        $(function () {

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

            $('.custom-file-input').on('change', function () {
                let fileNames = Array.from(this.files).map(file => file.name).join(', ');
                if (fileNames) {
                    $(this).next('.custom-file-label').html(fileNames);
                } else {
                    $(this).next('.custom-file-label').html('Choose file');
                }
            });
        });
    </script>
@stop
