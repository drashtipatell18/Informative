@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($videoslider) ? 'Edit Video Slider' : 'Create Video Slider' }}</h6>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($videoslider) ? route('videoslider.update', $videoslider->id) : route('videoslider.store') }}"
                    method="post" enctype="multipart/form-data" id="videoslider-from">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($videoslider) ? $videoslider->name : old('name') }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" class="form-control" id="video" name="video" accept="video/*">

                        {{-- Hidden field to retain old video --}}
                        @if (isset($videoslider) && $videoslider->video)
                            <input type="hidden" name="old_video" value="{{ $videoslider->video }}">

                            <div class="mt-2">
                                <p class="text-muted">Current video: {{ $videoslider->video }}</p>
                                <video width="200" height="150" controls class="rounded">
                                    <source src="{{ asset('video/videoslider/' . $videoslider->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($videoslider)
                                Update Video Slider
                            @else
                                Create Video Slider
                            @endisset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#videoslider-from').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        minength: "Name must be at least 3 characters long",
                        maxlength: "Name must be less than 255 charaters"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('in-valid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-valid').removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    var submitbtn = $(from).find('button[type="submit"]');
                    var originalText = submitbtn.text();
                    submitBtn.prop('disabled', true).text('Processing...');
                    form.submit();
                }
            });
        });
    </script>
@endpush
