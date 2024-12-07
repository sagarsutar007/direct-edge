@extends('layouts.web')

@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card job-card mb-3">
                        <div class="card-body">
                            <div class="job-header">
                                <div class="job-head">
                                    <div class="job-title">{{ $job->title }}</div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="job-company" style="{{ !$job->company || empty($job->company->name) ? 'visibility: hidden;' : '' }}">
                                            {{ $job->company ? $job->company->name : '' }}
                                        </div>
                                        <div class="job-company-rating ms-2" style="{{ !$job->company || empty($job->company->rating) ? 'visibility: hidden;' : '' }}">
                                            <i class="fas fa-star text-warning"></i> {{ $job->company ? ($job->company->rating ?? '0') : '0' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="job-company-logo">
                                    <img src="/img/companies/{{ optional($job->company)->logo ?: 'default.png' }}" class="img-thumbnail" height="80px" width="80px" alt="">
                                </div>
                            </div>
                            <div class="job-features">
                                @if(!empty($job->experience))
                                <div class="job-feature-item">
                                    <i class="bi bi-briefcase"></i>
                                    <span>{{ $job->experience }}</span>
                                </div>
                                @endif

                                @if(!empty($job->cost_to_company))
                                <div class="job-feature-item">
                                    <i class="bi bi-currency-rupee"></i>
                                    <span>{{ $job->cost_to_company }}</span>
                                </div>
                                @endif

                                @if(!empty($job->location))
                                <div class="job-feature-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>{{ $job->location }}</span>
                                </div>
                                @endif

                                @if(!empty($job->type))
                                <div class="job-feature-item">
                                    <i class="bi bi-file-earmark-text"></i>
                                    <span>{{ $job->type }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="job-footer">
                                <div class="job-uploaded">
                                    Posted: <span class="text-dark font-weight-bold">{{ $job->created_at->diffForHumans() }}</span> | Openings: <span class="text-dark font-weight-bold">{{ $job->vacancy_count ?? 1 }}</span> | Viewed: <span class="text-dark font-weight-bold">{{ $job->views }}</span>
                                </div>
                                <div class="job-action">
                                    <button class="btn btn-outline-primary rounded-pill">Apply now&nbsp;<i class="bi bi-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card job-description mb-3">
                        <div class="card-body">
                            <div class="job-title">Job Description</div>
                            <div class="job-text">
                                {!! $job->description !!}
                            </div>
                        </div>
                    </div>

                    <div class="card company-details">
                        <div class="card-body">
                            <div class="font-weight-bold text-dark">About Company</div>
                            <div class="company-text">
                                {{ $job->company ? $job->company->description : "Not Available!" }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card job-featured">
                        <div class="card-header">
                            <h6 class="card-title">Jobs you might like</h6>
                        </div>
                        <div class="card-body">
                            @foreach ($randomJobs as $randomJob)
                                <a href="{{ route('jobs.show', $randomJob->slug) }}">
                                    <div class="featured-job-item">
                                        <h6 class="featured-job-item-title">{{ $randomJob->title }}</h6>
                                        <p class="featured-job-item-text">{{ $randomJob->company->name ?? "" }}</p>
                                        <p class="featured-job-item-rating mb-0">
                                            <i class="fas fa-star text-warning"></i> {{ $randomJob->company ? ($randomJob->company->rating ?? '0') : '0' }}
                                        </p>
                                        <div class="featured-job-item-meta">
                                            <div class="featured-job-item-location">
                                                <i class="bi bi-geo-alt"></i> {{ $randomJob->location }}
                                            </div>
                                            <div class="featured-job-item-date">
                                                Posted {{ $randomJob->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection