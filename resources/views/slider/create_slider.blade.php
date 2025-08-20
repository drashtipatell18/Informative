@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($slider) ? 'Edit Slider' : 'Create Slider' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store') }}"
                    method="post" enctype="multipart/form-data" id="slider-from">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($slider) ? $slider->name : old('name') }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"
                            placeholder="Enter slider description...">{{ isset($slider) ? $slider->description : old('description') }}</textarea>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="photo" class="form-label"> Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">

                        {{-- Hidden field to retain old photo --}}
                        @if (isset($slider) && $slider->image)
                            <input type="hidden" name="old_photo" value="{{ $slider->image }}">

                            <div class="mt-2">
                                <img src="{{ asset('images/sliders/' . $slider->image) }}" alt="Profile Image"
                                    class="img-fluid rounded" width="100">
                            </div>
                        @endif
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($slider)
                                Update Slider
                            @else
                                Create Slider
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
            $('#slider-from').validate({
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

