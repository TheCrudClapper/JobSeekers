@extends('layouts.overview_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/jobOfferStyles/jobOffer.css') }}">
@endpush

@section('panel-section')
    <div class="col-12 bg-white shadow py-3 mb-4 rounded-2" >
        <h4 class="fw-bold px-3 m-0">Edit Job Listing</h4>
    </div>
    <div class="bg-white shadow py-3 mb-4 rounded-2">
        <h4 class="fw-bold px-3">Job Details</h4>
        <form action="/job/edit-job/{{ $job->Id }}" class="pt-3" method="post">
            @csrf
            <div class="row m-1">
                <div class="col-6 mb-4 px-3">
                    <label for="titleInput" class="form-label">Title*</label>
                    <input name="Title" type="text"
                           class="form-control @error('Title') is-invalid @enderror"
                           value="{{ old('Title', $job->Title) }}" id="titleInput"
                           placeholder="Enter Title">
                    @error('Title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-4">
                    <label for="categoryInput" class="form-label">Category*</label>
                    <select name="CategoryId" class="form-select @error('Category') is-invalid @enderror" >
                        <option selected disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->Id }}" {{ old('CategoryId', $job->CategoryId) == $category->Id ? 'selected' : '' }}>
                                {{ $category->Name }}
                            </option>
                        @endforeach
                    </select>
                    @error('CategoryId')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row m-1">
                <div class="col-6 mb-4">
                    <label for="vacancyInput" class="form-label">Vacancy*</label>
                    <input name="Vacancy" type="number"
                           class="form-control @error('Vacancy') is-invalid @enderror"
                           value="{{ old('Vacancy', $job->Vacancy) }}" id="vacancyInput">
                    @error('Vacancy')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-4">
                    <label for="salaryInput" class="form-label">Salary*</label>
                    <input name="Salary" type="number"
                           class="form-control @error('Salary') is-invalid @enderror"
                           value="{{ old('Salary', $job->Salary) }}" id="salaryInput" placeholder="Enter salary">
                    @error('Salary')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row m-1">
                <div class="col-6 mb-4">
                    <label for="locationInput" class="form-label">Location*</label>
                    <input name="Location" type="text"
                           class="form-control @error('Location') is-invalid @enderror"
                           value="{{ old('Location', $job->Location) }}" id="locationInput" placeholder="Enter location">
                    @error('Location')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-4">
                    <label for="jobTypeInput" class="form-label">Job Type*</label>
                    <select name="JobTypeId" class="form-select @error('JobTypeId') is-invalid @enderror" >
                        <option selected disabled>Select Job Type</option>
                        @foreach($jobTypes as $jobtype)
                            <option value="{{ $jobtype->Id }}" {{ old('JobTypeId', $job->JobTypeId) == $jobtype->Id ? 'selected' : '' }}>
                                {{ $jobtype->Name }}
                            </option>
                        @endforeach
                    </select>
                    @error('JobTypeId')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row m-1">
                <div class="col-12 mb-4">
                    <label for="descriptionInput" class="form-label">Description*</label>
                    <textarea name="Description" rows="10" id="descriptionInput"
                              class="form-control @error('Description') is-invalid @enderror"
                              placeholder="Enter description, requirements, etc">{{ old('Description', $job->Description) }}</textarea>
                    @error('Description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="mx-3">
            <h4 class="fw-bold px-3">Company Details</h4>

            <div class="row m-1">
                <div class="col-6 mb-4">
                    <label for="companyNameInput" class="form-label">Company Name*</label>
                    <input name="CompanyName" type="text"
                           class="form-control @error('CompanyName') is-invalid @enderror"
                           value="{{ old('CompanyName', $job->CompanyName) }}" id="companyNameInput" placeholder="Enter company name">
                    @error('CompanyName')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-4">
                    <label for="companyLocationInput" class="form-label">Company Location*</label>
                    <input name="CompanyLocation" type="text"
                           class="form-control @error('CompanyLocation') is-invalid @enderror"
                           value="{{ old('CompanyLocation', $job->CompanyLocation) }}" id="companyLocationInput" placeholder="Enter company location">
                    @error('CompanyLocation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary text-white ms-3 mt-2">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
