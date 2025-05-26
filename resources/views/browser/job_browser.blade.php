@extends('layouts.browser_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/jobOfferStyles/jobOffer.css') }}">
@endpush

@section('job-offers')
    @foreach($jobs as $job)
        <a href="/job/show-job/{{ $job->Id }}" class="text-decoration-none">
            <div class="bg-white rounded-2 p-3 shadow mb-4 job-listing">
                <div class="row">
                    <div class="col-2">
                        <img class="img-fluid" src="{{ asset('images/company.png') }}">
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-auto">
                                <h4 class="fw-bold text-primary">{{ $job->Title }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="text-secondary">{{ $job->Salary }} zł gross / month</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto text-black">
                                <span>{{ $job->CompanyName }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto text-black">
                                <span>{{ $job->Location}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach

@endsection
