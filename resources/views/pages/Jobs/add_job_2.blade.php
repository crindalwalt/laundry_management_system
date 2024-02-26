@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Advanced Elements</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Job for {{$customer->full_name}}</h6>

                    <form class="forms-sample" method="POST" action="{{ route("job.save") }}">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">JOB-ID</label>
                                <input class="form-control mb-4 mb-md-0" value="{{$job_id}}" name="job_id" readonly/>

                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cloths</label>
                                <input class="form-control" type="number" name="cloth"/>
                                @error("cloth")
                                <div class="badge rounded-pill bg-danger my-2">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Payment</label>
                                <input class="form-control mb-4 mb-md-0" type="number" name="payment"/>
                                @error("payment")
                                <div class="badge rounded-pill bg-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Picking Time</label>
                                <input class="form-control" type="datetime-local" name="picking_time"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="job_type" class="form-label">Job Type</label>
                                <select class="form-select" name="job_type" id="job_type">
                                    <option selected disabled>Select Job Type</option>
                                    <option value="pressing">Pressing</option>
                                    <option value="dry_cleaning">Dry Cleaning</option>
                                    <option value="washing">Washing</option>
                                </select>
                                @error("job_type")
                                <div class="badge rounded-pill bg-danger my-2">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="payment_status" class="form-label">Payment Status</label>
                                <select class="form-select" name="payment_status" id="payment_status">
                                    <option value="pending" selected>Udhar</option>
                                    <option value="paid">Paid</option>
                                </select>
                                @error("payment_status")
                                <div class="badge rounded-pill bg-danger my-2">{{ $message }}</div> @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <textarea class="form-control" name="description" id="tinymceExample"
                                          rows="10"></textarea>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-lg px-5 mb-4 mb-md-0" type="submit">Add Job</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pickr/pickr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/pickr.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
@endpush
