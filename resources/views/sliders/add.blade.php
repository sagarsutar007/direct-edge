@extends('adminlte::page')

@section('title', 'Add New Slider')

@section('content')
<div class="row">
    <div class="col-md-7 mx-auto">
        <form action="{{ route('sliders.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card mt-2">
                <div class="card-header">
                    <h3 class="card-title">
                        Add Slider
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('sliders') }}" class="btn btn-link btn-sm p-0"><i class="fas fa-fw fa-reply"></i> Back to Sliders</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="products-material-item-container">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Slider Title: <sup class="text-danger">*</sup></label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="title" class="@error('title') is-invalid @enderror form-control" name="title" placeholder="Enter Slider title" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slider-img">Slider Images:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="slider-img" accept="image/*" multiple>
                                            <label class="custom-file-label" for="slider-img">Slider Images</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Slider Descrpition:</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter Slider Description" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="primary_button_text">Primary Button Text:</label>
                                    <input type="text" id="primary_button_text" name="primary_button_text" class="form-control" value="{{ old('primary_button_text') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="primary_button_link">Primary Button Link:</label>
                                    <input type="url" id="primary_button_link" name="primary_button_link" class="form-control" value="{{ old('primary_button_link') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="secondary_button_text">Secondary Button Text:</label>
                                    <input type="text" id="secondary_button_text" name="secondary_button_text" class="form-control" value="{{ old('secondary_button_text') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="secondary_button_link">Secondary Button Link:</label>
                                    <input type="url" id="secondary_button_link" name="secondary_button_link" class="form-control" value="{{ old('secondary_button_link') }}">
                                </div>
                            </div>

                            
                            
                            <div class="col-md-12">
                                <div class="form-group mb-1 form-check-inline">
                                    <label>Status:</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="published" value="1" checked="" {{ old('status') == '1' ? 'selected' : '' }}>
                                    <label class="form-check-label" for="published">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="not-published" value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    <label class="form-check-label" for="not-published">Draft</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('sliders.create') }}" class="btn btn-outline-danger"><i class="fas fa-fw fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-fw fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop


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
                $(this).next('.custom-file-label').html(fileNames);
            });
        });
    </script>
@stop
