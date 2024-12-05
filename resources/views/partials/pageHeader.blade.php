<!-- Page Header Start -->
<div class="container-fluid bg-dark p-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-white">{{ $title ?? 'Unknown Page' }}</h1>
            @if (!empty($breadcrumbs))
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                        <a href="{{ $breadcrumb['url'] ?? '#' }}">{{ $breadcrumb['name'] }}</a>
                        <i class="fas fa-angle-double-right text-orange px-2"></i>
                    @else
                        <span class="text-white">{{ $breadcrumb['name'] }}</span>
                    @endif
                @endforeach
            @else
                <a href="{{ url('/') }}">Home</a>
                <i class="far fa-square text-orange px-2"></i>
                <span class="text-white">{{ $title ?? 'Unknown Page' }}</span>
            @endif
        </div>
    </div>
</div>
<!-- Page Header End -->
