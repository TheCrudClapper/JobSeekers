@extends("layouts.main");

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/jobOfferStyles/jobOffer.css') }}">
@endpush

@section('content')
    <div class="container form-container">
        <div class="row">
            <div class="col-md-3 bg-white shadow p-4 rounded-2 h-50">
                <form method="get" action="" id="filterFrom">
                    @csrf
                    <div class="mb-5">
                        <h4 class="fw-bold">Job Filters</h4>
                        <hr class="spacer">
                    </div>

                    <div class="mb-4">
                        <label for="titleInput" class="form-label fw-bold">Title</label>
                        <input name="Title" type="text"
                               class="form-control @error('Title') is-invalid @enderror" value="{{ request('Title') }}"
                               id="titleInput" placeholder="Enter title">
                    </div>
                    <div class="mb-4">
                        <label for="locationInput" class="form-label fw-bold">Location</label>
                        <input name="Location" type="text"
                               class="form-control @error('Title') is-invalid @enderror"
                               value="{{ request('Location') }}"
                               id="locationInput" placeholder="Enter location">
                    </div>
                    <div class="mb-4">
                        <label for="categorySelect" class="form-label fw-bold">Category</label>
                        <select name="CategoryId" id="categorySelect" class="form-select @error('Category') is-invalid @enderror">
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->Id }}"
                                    {{ request('CategoryId') == $category->Id ? 'selected' : '' }}>
                                    {{ $category->Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="companyInput" class="form-label fw-bold">Company Name</label>
                        <input name="CompanyName" type="text"
                               class="form-control @error('Company') is-invalid @enderror"
                               value="{{ request('CompanyName') }}"
                               id="companyInput" placeholder="Enter phrase">
                    </div>
                    <div class="mb-4">
                        <label for="salaryInput" class="form-label fw-bold">Salary</label>
                        <div class="row">
                            <div class="col-6">
                                <input name="SalaryFrom" type="number"
                                       class="form-control @error('SalaryFrom') is-invalid @enderror"
                                       value="{{ request('SalaryFrom') }}"
                                       id="salaryInput" placeholder="From">
                            </div>
                            <div class="col-6">
                                <input name="SalaryTo" type="number"
                                       class="form-control @error('SalaryTo') is-invalid @enderror"
                                       value="{{ request('SalaryTo') }}"
                                       id="salaryInput" placeholder="To">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="dateFromInput" class="form-label fw-bold">Created Starting</label>
                        <input name="DateFrom" type="date"
                               class="form-control @error('DateFrom') is-invalid @enderror"
                               value="{{ request('DateFrom') }}"
                               id="dateFromInput" placeholder="Enter phrase">
                    </div>
                    <div class="mb-4">
                        <label for="dateToInput" class="form-label fw-bold">Created till</label>
                        <input name="DateTo" type="date"
                               class="form-control @error('DateTo') is-invalid @enderror"
                               value="{{ request('DateTo') }}"
                               id="dateToInput" placeholder="Enter phrase">
                    </div>
                    <div class="mb-4">
                        <label for="vacancyInput" class="form-label fw-bold">Vacancy</label>
                        <div class="row">
                            <div class="col-6">
                                <input name="VacancyFrom" type="number"
                                       class="form-control @error('VacancyFrom') is-invalid @enderror"
                                       value="{{ request('VacancyFrom') }}"
                                       id="vacancyInput" placeholder="From">
                            </div>
                            <div class="col-6">
                                <input name="VacancyTo" type="number"
                                       class="form-control @error('VacancyTo') is-invalid @enderror"
                                       value="{{ request('VacancyTo') }}"
                                       id="vacancyInput" placeholder="To">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="form-label fw-bold">Job Type</p>

                        @foreach($jobTypes as $jobType)
                            <div class="mb-1">
                                <input type="checkbox" name="JobTypeId[]" value="{{ $jobType->Id }}">
                                <span>{{ $jobType->Name }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-4">
                        <p class="form-label fw-bold">Sort By</p>

                        <select class="form-select" name = "SortOption" id="sortSelect">
                            <option disabled selected>Sorting</option>
                            @foreach($sortOptions as $sortOption)
                                <option value="{{ $sortOption->Value }}">{{ $sortOption->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                    <div class="mb-4">
                        <a href="/job/job-browser" class="btn btn-secondary w-100">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h6><span class="fw-bold">Job Listings</span> - {{ $jobs->count() }} found</h6>
                <div class="bg-white shadow py-3 mb-4 rounded-2">
                    <div class="px-3">
                        <div class="row">
                            <div class="col-4">
                                @php
                                    //trying to map the sort_option value with its corresponding name to display user friendly text
                                    //optional - gets the value even if null
                                    $selectedSortName = optional($sortOptions->firstWhere('Value', request('SortOption')))->Name ?? 'Not Sorted';
                                @endphp
                                <span class="fw-bold">Sorted by: </span>{{ $selectedSortName }}
                            </div>
                            <div class="col-8 text-end">
                                <button class="btn">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </button>
                                <span> 1 from 83 325</span>
                                <button class="btn">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('job-offers')
            </div>
        </div>
    </div>
@endsection
