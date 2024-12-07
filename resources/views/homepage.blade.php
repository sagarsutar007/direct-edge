@extends('layouts.web')

@section('content')
    <!-- Carousel Start -->
    @if ($sliders->isNotEmpty())
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="w-100" src="{{ asset('img/' . $slider->slider_img) }}" alt="{{ $slider->title }}">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase">{{ $slider->title }}</h5>
                                <h1 class="display-1 text-white mb-md-4">{{ $slider->description }}</h1>
                                @if ($slider->primary_button_text)
                                    <a href="{{ $slider->primary_button_link }}" class="btn btn-orange py-md-3 px-md-5 me-3 rounded-pill">
                                        {{ $slider->primary_button_text }}
                                    </a>
                                @endif
                                @if ($slider->secondary_button_text)
                                    <a href="{{ $slider->secondary_button_link }}" class="btn btn-secondary py-md-3 px-md-5 rounded-pill">
                                        {{ $slider->secondary_button_text }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        <p>No sliders available.</p>
    @endif

    <!-- Carousel End -->

    @include('partials.about')
    @include('partials.features')

    <div class="container-fluid bg-orange text-secondary p-5">
        <div class="row">
            <div class="col-md-7">
                <h1 class="display-5 mb-4 text-white">Register Yourself</h1>
                <p class="text-white">Join our platform today and unlock a world of opportunities designed to fuel your personal and professional growth! By registering, you'll gain access to exclusive resources, career advancement tools, and a network of like-minded individuals ready to collaborate and innovate. Whether you're looking to enhance your skills, connect with industry leaders, or explore exciting new paths, our platform is your gateway to success. Don't miss out on the chance to elevate your journey—sign up now and take the first step toward a brighter, more fulfilling future!</p>
            </div>
            <div class="col-md-5" id="register-form">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="form-floating-1" placeholder="John Doe">
                            <label for="form-floating-1">Full Name</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="form-floating-3" placeholder="Subject">
                            <label for="form-floating-3">Mobile Number</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="form-floating-2" placeholder="name@example.com">
                            <label for="form-floating-2">Email address</label>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        
                    </div>
                    <div class="col-12">
                        <button class="btn btn-dark w-100 py-3" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection