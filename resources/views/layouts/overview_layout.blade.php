@extends("layouts.main");

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/accountStyles/account-styles.css') }}">
@endpush

@section("content")
    <div class="container form-container">
        <div class="row">
            <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                <div class="bg-white shadow p-3 mb-4 text-center rounded-2">
                    <div class="rounded-1">
                        <img height="150" class="rounded-circle" width="150" src="{{ asset('images/logo.png') }}">
                    </div>
                    <span class="fw-bold fs-4">{{ auth()->user()->Name }}</span>
                    <p class="mt-1">
                        <a href="#" class="btn btn-primary">Change Profile Picture</a>
                    </p>

                </div>
                <div class="bg-white shadow rounded-2">
                    <div class="px-3 py-3">
                        <a class="own-link-style" href="/account/profile">Account Settings</a>
                    </div>
                    <hr class="w-100 p-0 m-0">
                    <div class="px-3 py-3">
                        <a class="own-link-style" href="/job/create">Post Job Listing</a>
                    </div>
                    <hr class="w-100 p-0 m-0">
                    <div class="px-3 py-3">
                        <a class="own-link-style" href="/job/user-jobs">My Job Listings</a>
                    </div>
                    <hr class="w-100 p-0 m-0">
                    <div class="px-3 py-3">
                        <a class="own-link-style">Job Application</a>
                    </div>
                    <hr class="w-100 p-0 m-0">
                    <div class="px-3 py-3">
                        <a class="own-link-style" href="/account/logout">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 ">
                @yield('panel-section')
            </div>
        </div>
    </div>
@endsection
