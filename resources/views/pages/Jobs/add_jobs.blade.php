@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet"/>

@endpush

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Add a Job</h4>
            <p class="lead">
                Add a new User or select from existing list
            </p>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">


            <button type="button" class="btn btn-info btn-icon-text mb-2 mb-md-0 me-1 ">
                <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                Back to Home
            </button>
            <a href="{{ route("jobs.all") }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                All Job
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add New Customer</h6>
                    <form class="forms-sample" method="POST" action="{{ route("customer.add") }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Name</label>
                                <input class="form-control mb-4 mb-md-0" name="full_name" type="text"/>
                                @error("full_name")
                                <div class="bg-danger rounded-pill badge">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input class="form-control" name="phone" type="tel"/>
                                @error("phone")
                                <div class="bg-danger rounded-pill badge">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input class="btn btn-primary btn-lg mb-4 mb-md-0 px-5" type="submit" value="Next"/>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Existing Customers</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Colony</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($customers)

                                @foreach($customers as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->phone_number}}</td>
                                        <td>{{ $item->colony ?? "Not Provided" }}</td>

                                        <td>
                                            <a href="{{ route("job.detail",$item->id) }}"
                                               class="btn btn-sm btn-outline-warning btn-icon-text mb-2  mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="eye"></i>
                                                view Details
                                            </a>
                                            <a href="{{ route("job.step2",$item->id) }}"
                                               class="btn btn-sm btn-success     btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="plus-circle"></i>
                                                Add Job
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <p>No data found</p>
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-md-6 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title">Select 2</h4>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://select2.org/" target="_blank"> Official Select2 Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Single select box using select 2</label>--}}
{{--                        <select class="js-example-basic-single form-select" data-width="100%">--}}
{{--                            <option value="TX">Texas</option>--}}
{{--                            <option value="NY">New York</option>--}}
{{--                            <option value="FL">Florida</option>--}}
{{--                            <option value="KN">Kansas</option>--}}
{{--                            <option value="HW">Hawaii</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Multiple select using select 2</label>--}}
{{--                        <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">--}}
{{--                            <option value="TX">Texas</option>--}}
{{--                            <option value="WY">Wyoming</option>--}}
{{--                            <option value="NY">New York</option>--}}
{{--                            <option value="FL">Florida</option>--}}
{{--                            <option value="KN">Kansas</option>--}}
{{--                            <option value="HW">Hawaii</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title">Typeahead</h4>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://github.com/twitter/typeahead.js" target="_blank"> Official Typeahead.js Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <label class="form-label">Basic</label>--}}
{{--                            <div id="the-basics">--}}
{{--                                <input class="typeahead" autocomplete="off" type="text" placeholder="States of USA">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <label class="form-label">Bloodhound</label>--}}
{{--                            <div id="bloodhound">--}}
{{--                                <input class="typeahead" type="text" placeholder="States of USA">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-6 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h6 class="card-title">Tags input</h6>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://www.npmjs.com/package/jquery-tags-input" target="_blank"> Official jQuery-tags-input Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <p class="mb-2">Type something to add a new tag</p>--}}
{{--                    <div>--}}
{{--                        <input name="tags" id="tags" value="New York,Texas,Florida,New Mexico" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h6 class="card-title">Color picker</h6>--}}
{{--                    <p class="text-muted mb-3">Flat, simple, and responsive Color-Picker library. Read the <a href="https://github.com/Simonwep/pickr" target="_blank"> Official @simonwep/pickr Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <p class="mb-2">Click the color square to activate the Color Picker</p>--}}
{{--                    <div class="d-flex">--}}
{{--                        <div class="me-2">--}}
{{--                            <!-- Example 1 -->--}}
{{--                            <div id="pickr_1"></div>--}}
{{--                        </div>--}}
{{--                        <div class="me-2">--}}
{{--                            <!-- Example 2 -->--}}
{{--                            <div id="pickr_2"></div>--}}
{{--                        </div>--}}
{{--                        <div class="me-2">--}}
{{--                            <!-- Example 3 -->--}}
{{--                            <div id="pickr_3"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-6 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h6 class="card-title">Date picker</h6>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://flatpickr.js.org/" target="_blank"> Official Flatpickr Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <div class="input-group flatpickr" id="flatpickr-date">--}}
{{--                        <input type="text" class="form-control" placeholder="Select date" data-input>--}}
{{--                        <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h6 class="card-title">Time picker</h6>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://flatpickr.js.org/" target="_blank"> Official Flatpickr Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <div class="input-group flatpickr" id="flatpickr-time">--}}
{{--                        <input type="text" class="form-control" placeholder="Select time" data-input>--}}
{{--                        <span class="input-group-text input-group-addon" data-toggle><i data-feather="clock"></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h6 class="card-title">Dropzone</h6>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://www.dropzonejs.com/" target="_blank"> Official Dropzone.js Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <form action="/file-upload" class="dropzone" id="exampleDropzone"></form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h6 class="card-title">Dropify</h6>--}}
{{--                    <p class="text-muted mb-3">Read the <a href="https://github.com/JeremyFagis/dropify" target="_blank"> Official Dropify Documentation </a>for a full list of instructions and other options.</p>--}}
{{--                    <input type="file" id="myDropify"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@push('plugin-scripts')
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
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>

@endpush

@push('custom-scripts')
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
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
