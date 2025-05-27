@extends ("layouts.main");

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/applicationStyles/application-styles.css') }}">
@endpush

@section("content")
    <div class="container">
        <div class="row d-flex justify-content-center form-container">
            <div class="col-6 bg-white shadow">
                <h4 class="fw-bold p-3">Job Application</h4>
                <hr class="m-0 mb-4">
                <form  method="POST" enctype="multipart/form-data" action="@if(request('JobId')) /application/createApplication/{{ request('JobId') }} @else # @endif">
                    @csrf
                    <div class="mb-4 px-3">
                        <label for="cvInput" class="form-label">CV*</label>
                        <input name="Cv" type="file"
                               class="form-control @error('Cv') is-invalid @enderror" value="{{ old('Cv') }}" id="vacancyInput" placeholder="Enter vacancy count">
                        @error('Cv')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 px-3">
                        <label for="letterInput" class="form-label">Motivational Letter</label>
                        <input name="Letter" type="file"
                               class="form-control @error('Letter') is-invalid @enderror" value="{{ old('Letter') }}" id="letterInput" placeholder="Enter vacancy count">
                        @error('Letter')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4 px-3">
                        <p class="fw-bold">Disclaimer:</p>
                        <span class="text-muted">All data necessary to process application that are not covered in motivational letter or cv can be taken from your profile data.<b> So watch what you post in Bio section !</b>
                    </span>
                    </div>
                    <div class="mb-4 px-3">
                        <button type="submit" class="btn btn-primary w-25">Send</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
@endsection
