@extends('layouts.overview_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/accountStyles/account-styles.css') }}">
@endpush

@section('panel-section')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failure !</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="bg-white shadow py-3 mb-4 rounded-2">
        <h4 class="fw-bold px-3">Account Details</h4>
        <form action="/account/update" class="pt-3" method="post">
            @csrf
            <div class="mb-4 px-3">
                <label for="nameInput" class="form-label">Name*</label>
                <input name="Name" type="text"
                       class="form-control  @error('Name') is-invalid @enderror"  value="{{ $model->Name }}"  id="nameInput" placeholder="Enter name">
                @error('Name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 px-3">
                <label for="emailInput" class="form-label">Email*</label>
                <input name="Email" type="text"
                       class="form-control  @error('Email') is-invalid @enderror"  value="{{ $model->Email }}"  id="emailInput" placeholder="Enter email">
                @error('Email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 px-3">
                <label for="phoneInput" class="form-label">PhoneNumber</label>
                <input name="PhoneNumber" type="text"
                       class="form-control  @error('PhoneNumber') is-invalid @enderror"  value="{{ $model->PhoneNumber }}"  id="phoneInput" placeholder="Enter phone number">
                @error('PhoneNumber')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 px-3">
                <label for="bioInput" class="form-label">Bio</label>
                <textarea rows="5" name="Bio" id="bioInput" class="form-control @error('Bio') is-invalid @enderror" placeholder="Enter your bio here">{{ $model->Bio }}</textarea>
                @error('Bio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary text-white ms-3 mt-2">Update</button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow py-3 mb-4 rounded-2">
        <h4 class="fw-bold px-3">Password Change</h4>
        <form action="/account/changePassword" class="pt-3" method="post">
            @csrf
            <div class="mb-4 px-3">
                <label for="currentPasswordInput" class="form-label">Current Password*</label>
                <input name="CurrentPassword" type="password"
                       class="form-control  @error('CurrentPassword') is-invalid @enderror" id="currentPasswordInput" placeholder="Enter current password">
                @error('CurrentPassword')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 px-3">
                <label for="newPasswordInput" class="form-label">New Password*</label>
                <input name="NewPassword" type="password"
                       class="form-control  @error('NewPassword') is-invalid @enderror" id="newPasswordInput" placeholder="Enter new password">
                @error('NewPassword')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 px-3">
                <label for="confirmPasswordInput" class="form-label">Confirm Password*</label>
                <input name="ConfirmPassword" type="password"
                       class="form-control  @error('ConfirmPassword') is-invalid @enderror" id="confirmPasswordInput" placeholder="Enter confirmation password">
                @error('ConfirmPassword')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="btn btn-primary text-white ms-3 mt-2">Update</button>
            </div>
        </form>
    </div>

        <div class="bg-white shadow py-3 mb-4 rounded-2">
            <h4 class="fw-bold px-3">Delete Account</h4>
                <div class="mb-4 px-3">
                    <span class="text-secondary">
                        Deleting Account means your account will become <b>inactive</b> any sent applications or post application will be also invalidated.
                        You can always reactivate your account if you wish.
                    </span>
                </div>
                <div class="mb-4">
                    <a href="/account/deleteAccount" class="btn btn-danger text-white ms-3 mt-2">Delete Account</a>
                </div>
    </div>
@endsection
