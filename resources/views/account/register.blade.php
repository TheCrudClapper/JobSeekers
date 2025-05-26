@extends ("layouts.main");

<!-- Appending styles  -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/accountStyles/account-styles.css') }}">
@endpush

@section("content")
    <div class="container my-3">
        <div class="row d-flex justify-content-center form-container">
            <div class="col-5 bg-white shadow">
                <div class="p-5">
                    <h3 class="fw-bold mb-4">Register</h3>
                    <form action="/account/registerUser/" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Name*</label>
                            <input name="Name" type="text" value="{{ old('Name') }}"
                                   class="form-control @error('Name') is-invalid @enderror" id="nameInput"
                                   placeholder="example@gmail.com">
                            @error('Name')
                            <div class="error-div text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email*</label>
                            <input name="Email" type="email" value="{{ old('Email') }}"
                                   class="form-control @error('Email') is-invalid @enderror" id="emailInput"
                                   placeholder="example@gmail.com">
                            @error('Email')
                            <div class="error-div text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password*</label>
                            <input name="Password" type="password" value="{{ old('Password') }}"
                                   class="form-control @error('Password') is-invalid  @enderror " id="passwordInput"
                                   placeholder="Enter Password">
                            @error('Password')
                            <div class="error-div text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmPasswordInput" class="form-label">Confirm Password*</label>
                            <input name="ConfirmPassword" type="password" value="{{ old('ConfirmPassword') }}"
                                   class="form-control @error('ConfirmPassword') is-invalid  @enderror "
                                   id="confirmPasswordInput" placeholder="Confirm Password">
                            @error('ConfirmPassword')
                            <div class="error-div text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary fw-bold">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 text-center">
                Have an account ? <a class="text-decoration-none" href="/account/login">Login</a>
            </div>
        </div>

    </div>
@endsection
