@extends('layouts.web')

@section('content')

    @include('partials.pageHeader', ['title' => $title, 'breadcrumbs' => $breadcrumbs])

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 order-2 order-md-1 order-lg-1">
                    <div class="card filter-card">
                        <div class="card-body">
                            <h6 class="text-dark">All Filters</h6>
                            <hr>
                            <div class="accordion" id="filters-accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="company-type-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#company-type" aria-expanded="true" aria-controls="company-type-body">
                                            Company Type
                                        </button>
                                    </h2>
                                    <div id="company-type" class="accordion-collapse collapse show" aria-labelledby="company-type-header">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" name="company_type" type="checkbox" value="corporate" id="f-ct-corporate">
                                                <label class="form-check-label" for="f-ct-corporate">Corporate</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="company_type" type="checkbox" value="startup" id="f-ct-startup">
                                                <label class="form-check-label" for="f-ct-startup">Startup</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="company_type" type="checkbox" value="foreign-mnc" id="f-ct-foreign-mnc">
                                                <label class="form-check-label" for="f-ct-foreign-mnc">Foreign MNC</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="company_type" type="checkbox" value="indian-mnc" id="f-ct-indian-mnc">
                                                <label class="form-check-label" for="f-ct-indian-mnc">Indian MNC</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="company_type" type="checkbox" value="mnc" id="f-ct-mnc">
                                                <label class="form-check-label" for="f-ct-mnc">MNC</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="work-mode-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#work-mode" aria-expanded="true" aria-controls="work-mode-body">
                                            Work Mode
                                        </button>
                                    </h2>
                                    <div id="work-mode" class="accordion-collapse collapse show" aria-labelledby="work-mode-header">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" name="work_mode" type="checkbox" value="wfo" id="f-wm-wfo">
                                                <label class="form-check-label" for="f-wm-wfo">Work from office</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="work_mode" type="checkbox" value="hybrid" id="f-wm-hybrid">
                                                <label class="form-check-label" for="f-wm-hybrid">Hybrid</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="work_mode" type="checkbox" value="remote" id="f-wm-remote">
                                                <label class="form-check-label" for="f-wm-remote">Remote</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="experience-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#experience-body" aria-expanded="false" aria-controls="experience-body">
                                            Experience
                                        </button>
                                    </h2>
                                    <div id="experience-body" class="accordion-collapse collapse show" aria-labelledby="experience-header">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="f-ex-year" class="form-label">1</label>
                                                <input type="range" class="form-range" name="experience" value="1" min="0" max="30" id="f-ex-year">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="department-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#department-body" aria-expanded="false" aria-controls="department-body">
                                            Department
                                        </button>
                                    </h2>
                                    <div id="department-body" class="accordion-collapse collapse show" aria-labelledby="department-header">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk-Sales">
                                                <label class="form-check-label" for="chk-Sales">
                                                    Sales &amp; Business Development
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk-BFSI">
                                                <label class="form-check-label" for="chk-BFSI">
                                                    BFSI, Investments &amp; Trading 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk-Production">
                                                <label class="form-check-label" for="chk-Production">
                                                    Production, Manufacturing &amp; Engineering 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk-Medical">
                                                <label class="form-check-label" for="chk-Medical">
                                                    Medical, Healthcare &amp; Pharmaceuticals
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk-Business">
                                                <label class="form-check-label" for="chk-Business">
                                                    Business, Consulting &amp; Freelancing
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="chk-Others">
                                                <label class="form-check-label" for="chk-Others">
                                                    Others
                                                </label>
                                            </div>

                                            <div class="text-center">
                                                <a href="#" class="btn btn-link font-14">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="salary-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#salary-body" aria-expanded="false" aria-controls="salary-body">
                                            Salary
                                        </button>
                                    </h2>
                                    <div id="salary-body" class="accordion-collapse collapse show" aria-labelledby="salary-header">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" name="salary" value="0to3" type="checkbox" id="f-sl-one">
                                                <label class="form-check-label" for="f-sl-one">
                                                    0-3 Lakhs
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="salary" value="3to6" type="checkbox" id="f-sl-two">
                                                <label class="form-check-label" for="f-sl-two">
                                                    3-6 Lakhs
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="salary" value="6to10" type="checkbox" id="f-sl-three">
                                                <label class="form-check-label" for="f-sl-three">
                                                    6-10 Lakhs
                                                </label>
                                            </div>
                                            <div style="display:none;">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="salary" value="10to15" type="checkbox" id="f-sl-four">
                                                    <label class="form-check-label" for="f-sl-four">
                                                        10-15 Lakhs
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="salary" value="15to25" type="checkbox" id="f-sl-five">
                                                    <label class="form-check-label" for="f-sl-five">
                                                        15-25 Lakhs
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="salary" value="25to50" type="checkbox" id="f-sl-six">
                                                    <label class="form-check-label" for="f-sl-six">
                                                        25-50 Lakhs
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="salary" value="50to75" type="checkbox" id="f-sl-seven">
                                                    <label class="form-check-label" for="f-sl-seven">
                                                        50-75 Lakhs
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="salary" value="75plus" type="checkbox" id="f-sl-eight">
                                                    <label class="form-check-label" for="f-sl-eight">
                                                        75+ Lakhs
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="#" class="btn btn-link font-14" id="show-salaries">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="role-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#role-body" aria-expanded="false" aria-controls="role-body">
                                            Role Category
                                        </button>
                                    </h2>
                                    <div id="role-body" class="accordion-collapse collapse show" aria-labelledby="role-header">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" name="role" value="1001" type="checkbox" id="f-rl-one">
                                                <label class="form-check-label" for="f-rl-one">
                                                    Retail & B2C Sales
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="role" value="1002" type="checkbox" id="f-rl-two">
                                                <label class="form-check-label" for="f-rl-two">
                                                    BD / Pre Sales
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="role" value="1003" type="checkbox" id="f-rl-three">
                                                <label class="form-check-label" for="f-rl-three">
                                                    Life Insurance
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <a href="#" class="btn btn-link font-14" id="show-role">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="education-header">
                                        <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#education-body" aria-expanded="false" aria-controls="education-body">
                                            Education
                                        </button>
                                    </h2>
                                    <div id="education-body" class="accordion-collapse collapse show" aria-labelledby="education-header">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" name="education" value="1001" type="checkbox" id="f-rl-one">
                                                <label class="form-check-label" for="f-rl-one">
                                                    Any Postgraduate
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="education" value="1002" type="checkbox" id="f-rl-two">
                                                <label class="form-check-label" for="f-rl-two">
                                                    MBA/PGDM
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="education" value="1003" type="checkbox" id="f-rl-three">
                                                <label class="form-check-label" for="f-rl-three">
                                                    Any Graduate
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <a href="#" class="btn btn-link font-14" id="show-education">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 order-1 order-md-2 order-lg-2">
                    <div class="row mb-3">
                        <div class="col-7 col-md-8 col-lg-9">
                        Total {{ $totalJobs }} Jobs Found
                        </div>
                        <div class="col-5 col-md-4 col-lg-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-gray">Sort by:</span>&nbsp; Relevance
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><button class="dropdown-item" type="button">Date Added</button></li>
                                    <li><button class="dropdown-item" type="button">Relevance</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @foreach($jobs as $job)
                            <div class="card job-card mb-3">
                                <div class="card-body">
                                    <div class="job-header">
                                        <div class="job-head">
                                            <div class="job-title">{{ $job->title }}</div>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="job-company" style="{{ !$job->company || empty($job->company->name) ? 'visibility: hidden;' : '' }}">
                                                    {{ $job->company->shortcode ?? $job->company->name ?? '' }}
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
                                            {{ $job->created_at->diffForHumans() }}
                                        </div>
                                        <div class="job-action">
                                            <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-link">View Job Post&nbsp;<i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection