@extends ("layouts.main");

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/homeStyles/home.css') }}">
@endpush


@section("content")
    <div class="container-fluid">
        <div class="landing-page-banner">
            <img src="{{ asset('images/landing-banner.jpg') }}">
        </div>
    </div>
    <div class="container search-panel shadow">
        <form class="d-inline" action="/job/job-browser" method="GET">
            @csrf
            <div class="row">
                <div class="col-12 col-md-3 mb-3 mb-md-0">
                    <input type="text" name="Title" class="form-control" value="{{ request('Title') }}"
                           placeholder="Title">
                </div>
                <div class="col-12 col-md-3 mb-3 mb-md-0">
                    <input type="text" name="Location" class="form-control" value="{{ request('Location') }}"
                           placeholder="Location">
                </div>
                <div class="col-12 col-md-3 mb-3 mb-md-0">
                    <select name="CategoryId" class="form-select @error('CategoryId') is-invalid @enderror">
                        <option selected disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->Id }}" {{ request('CategoryId') == $category->Id ? 'selected' : '' }}>
                                {{ $category->Name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3 mb-3 mb-md-0">
                    <button type="submit" class="btn bg-primary w-100 text-white">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid darker-background ">
        <div class="container home-panels">
            <div class="row mb-4 ms-1">
                <div class="col-auto p-0">
                    <p class="fw-bold fs-3 m-0">Popular Categories</p>
                    <hr class="spacer">
                </div>
            </div>
            <div class="row">
                @foreach($topCategories as $item)
                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <div class="categories-card  shadow">
                            <p>
                                <a href="job/job-browser/?CategoryId={{ $item->Id }}"
                                   class="fw-bold">{{ $item->Name }}</a>
                            </p>
                            <span>{{ $item->jobs_count }} avaliable listings</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid white-background">
        <div class="container home-panels">
            <div class="row mb-4 ms-1">
                <div class="col-auto p-0">
                    <p class="fw-bold fs-3 m-0">Featured Jobs</p>
                    <hr class="spacer">
                </div>
            </div>
            <div class="row">
                @foreach($featuredJobs as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card border-0 bg-light rounded shadow">
                            <div class="card-body p-4">
                                <span
                                    class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">{{ $item->jobtype->Name }}</span>
                                <h5>{{ $item->Title }}</h5>
                                <div class="mt-3">
                                    <span class="text-muted d-block"><i class="fa-solid fa-building me-2"></i>{{ $item->CompanyName }}</span>
                                    <span class="text-muted d-block"><i class="fa-solid fa-location-dot me-2"></i>{{ $item->Location }}</span>
                                    <span class="text-muted d-block"><i class="fa-solid fa-dollar-sign me-2"></i>{{ $item->Salary }}/month<span>
                                </div>

                                <div class="mt-3">
                                    <a href="/job/show-job/{{ $item->Id }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid darker-background mb-0">
        <div class="container home-panels">
            <div class="row mb-4 ms-1">
                <div class="col-auto p-0">
                    <p class="fw-bold fs-3 m-0">Latest Jobs</p>
                    <hr class="spacer">
                </div>
            </div>
            <div class="row">
                @foreach($latestJobs as $item)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card border-0 bg-light rounded shadow">
                            <div class="card-body p-4">
                                <span
                                    class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">{{ $item->jobtype->Name }}</span>
                                <h5>{{ $item->Title }}</h5>
                                <div class="mt-3">
                                    <span class="text-muted d-block"><i class="fa-solid fa-building me-2"></i>{{ $item->CompanyName }}</span>
                                    <span class="text-muted d-block"><i class="fa-solid fa-location-dot me-2"></i>{{ $item->Location }}</span>
                                    <span class="text-muted d-block"><i class="fa-solid fa-dollar-sign me-2"></i>{{ $item->Salary }}/month<span>
                                </div>
                                <div class="mt-3">
                                    <a href="/job/show-job/{{ $item->Id }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
