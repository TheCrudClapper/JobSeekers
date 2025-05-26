@extends ("layouts.main");

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/jobOfferStyles/jobOffer.css') }}">
@endpush

@section('content')
    <div class="container form-container">
        <div class="row">
            <div class="col-md-8">
                <div class="bg-white shadow p-4 rounded-2">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="fw-bold text-primary">{{ $job->Title }}</h4>
                            <div>
                                <i class="fa-solid fa-location-dot me-2"></i><span
                                    class="me-4">{{ $job->Location }}</span>
                                <i class="fa-regular fa-clock me-2"></i>{{ $job->JobType->Name }}
                            </div>
                        </div>
                        <div class="col-2 text-end">
                            <a href="" class="btn btn-primary">
                                <i class="fa-regular fa-1.5x fa-heart"></i>
                            </a>
                        </div>
                    </div>

                    <hr>
                    <h4 class="fw-bold">Job Description</h4>
                    <div class="job-description-container">
                        {!! nl2br(e($job->Description)) !!}
                    </div>
                    <hr>
                    <form class="m-0">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white shadow p-4 rounded-2 mb-3">
                    <h4 class="fw-bold">Job Summary</h4>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Published:</span>
                            <span>{{ date('d-m-Y', strtotime($job->DateCreated)) }}</span>
                        </li>
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Vacancy:</span>
                            <span>{{ $job->Vacancy }}</span>
                        </li>
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Location:</span>
                            <span>{{ $job->Locatio }}</span>
                        </li>
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Salary:</span>
                            <span>{{ $job->Salary }}</span>
                        </li>
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Job Type:</span>
                            <span>{{ $job->JobType->Name }}</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white shadow p-4 rounded-2">
                    <h4 class="fw-bold">Company Details</h4>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Company:</span>
                            <span>{{ $job->CompanyName }}</span>
                        </li>
                        <li class="mb-1">
                            <span class="fw-bold text-secondary">Location:</span>
                            <span>{{ $job->CompanyLocation }}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
@endsection
