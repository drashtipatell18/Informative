@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($testimonial) ? 'Edit Testimonial' : 'Create Testimonial' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($testimonial) ? route('testimonial.update', $testimonial->id) : route('testimonial.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      id="testimonial-form">

                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ isset($testimonial) ? $testimonial->name : old('name') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ isset($testimonial) ? $testimonial->description : old('description') }}</textarea>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">

                        @if(isset($testimonial) && $testimonial->image)
                            <input type="hidden" name="old_image" value="{{ $testimonial->image }}">
                            <div class="mt-2">
                                <img src="{{ asset('images/testimonial/' . $testimonial->image) }}"
                                     alt="Testimonial Image" class="img-fluid rounded" width="100">
                            </div>
                        @endif
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">
                            {{ isset($testimonial) ? 'Update' : 'Create' }} Testimonial
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
    $(document).ready(function () {
        $('#testimonial-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                description: {
                    required: true,
                    minlength: 10
                },
                image: {
                    extension: "jpg|jpeg|png|gif"
                }
            },
            messages: {
                name: {
                    required: "Please enter a name",
                    minlength: "Name must be at least 3 characters"
                },
                description: {
                    required: "Please enter a description",
                    minlength: "Description must be at least 10 characters"
                },
                image: {
                    extension: "Only image files are allowed (jpg, jpeg, png, gif)"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endpush
