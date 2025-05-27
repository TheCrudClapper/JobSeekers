@extends('layouts.overview_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('websiteCss/jobOfferStyles/jobOffer.css') }}">
@endpush

@section('panel-section')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success !</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="bg-white shadow py-3 mb-4 rounded-2">
        <h4 class="fw-bold px-3">Your job applications</h4>
        <div class="col-12 px-3" id="job-container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Applied Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobApplications as $item)
                    <tr id="account-{{ $item->Id }}">
                        <td>
                            {{ $item->job->Title }}
                        </td>
                        <td>{{ $item->DateCreated->format('d-m-Y') }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>
                            <a href="/job/show-job/{{ $item->job->Id }}" class="btn btn-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <button class="delete-item btn btn-danger" data-id = "{{ $item->Id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".delete-item").on('click', function(e){
            e.preventDefault();
            let accountId = $(this).data('id');
            console.log(accountId);
            $.ajax({
                url: "/application/delete-application/" + accountId,
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(){
                    $("#account-" + accountId).remove();
                },
                error: function(){
                    alert("Could not job application job.");
                }
            });
        })
    </script>
@endsection
