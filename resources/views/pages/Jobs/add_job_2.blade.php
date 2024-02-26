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
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Jobs For <strong>{{ $customer->full_name}}
                </strong></h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


            <a href="{{ route("job.detail",$customer->id) }}" class="btn btn-warning btn-icon-text me-1 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="paper"></i>
                View Khata
            </a>

        </div>
    </div>
    {{--    @dd($customer->account === null)--}}
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">

                @if(count($customer->jobs) >= 1)
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Jobs</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5 my-3">
                                        <h3 class="mb-2"> {{ count($customer->jobs) }}</h3>
                                        <div class="d-flex align-items-baseline  ">
                                            <p class="text-success ">
                                                <span>Based on Data</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card" style="background-color: #0d6efd;color: white;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">New Customer Added</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                @if($customer->account != null)
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Total Pending Payment</h6>

                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-xl-12 my-3">
                                        <h3 class="mb-2">PKR {{ $customer->account->amount ?? "0" }}</h3>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success">
                                                <span>Based on Data </span>
                                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div> <!-- row -->



    {{--    Form with Cloth specific field to add a job --}}
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Job </h6>

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
