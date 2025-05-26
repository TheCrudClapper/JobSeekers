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
                    <h3 class="fw-bold mb-4">Login</h3>
                    <form action="/account/loginUser" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email*</label>
                            <input name="Email" type="email"
                                   class="form-control @error('Email') is-invalid @enderror" value="{{ old('Email') }}" id="emailInput" placeholder="example@gmail.com">
                            @error('Email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Password*</label>
                            <input name="Password" type="password"
                                   class="form-control  @error('Password') is-invalid @enderror"  value="{{ old('Password') }}"  id="passwordInput" placeholder="Enter Password">
                            @error('Password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="justify-content-between d-flex">
                                <button type="submit" class="btn btn-primary fw-bold">Login</button>
                                <a href="#" class="text-primary text-end text-decoration-none">Forgot Password ?</a>
                            </div>
                        </div>
                        @error('GeneralError')
                            <div class="mb-3">
                                <span class="text-danger text-center"> {{ $message }} </span>
                            </div>
                        @enderror

                    </form>
                </div>
            </div>
            <div class="mt-3 text-center">
                Don't have account yet ? <a class="text-decoration-none" href="/account/register">Register</a>
            </div>
        </div>

    </div>
@endsection
