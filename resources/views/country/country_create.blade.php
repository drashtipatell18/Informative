@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($country) ? 'Edit Country' : 'Create Country' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($country) ? route('country.update', $country->id) : route('country.store') }}"
                    method="post" enctype="multipart/form-data" id="country-form">
                    @csrf

                    <div class="mb-3 form-group">
                        <label for="code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="code" name="code"
                            value="{{ old('code', $country->code ?? '') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Country Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $country->name ?? '') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">-- Select Category --</option>
                            <option value="1"
                                {{ (isset($category) && $category->name == 'Domestic') || old('category_id') == '1' ? 'selected' : '' }}>
                                Domestic
                            </option>
                            <option value="2"
                                {{ (isset($category) && $category->name == 'International') || old('category_id') == '2' ? 'selected' : '' }}>
                                International
                            </option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="day" class="form-label">Day</label>
                        <input type="number" class="form-control" id="day" name="day"
                            value="{{ old('day', $country->day ?? '') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="images" class="form-label">Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                        @if (isset($country) && $country->images && is_array($country->images) && count($country->images) > 0)
                            <div class="mt-3">
                                <label>Existing Images:</label>
                                <div class="d-flex flex-wrap gap-4" id="existing-images">
                                    @foreach ($country->images as $index => $image)
                                        <div class="position-relative existing-image" data-image="{{ $image }}">
                                            <img src="{{ asset('images/countries/' . $image) }}" alt="Country Image"
                                                class="img-thumbnail" width="100">
                                            <button type="button"
                                                class="btn btn-sm btn-primary custom-btn position-absolute top-0 start-100 translate-middle remove-image rounded-circle"
                                                data-image="{{ $image }}"
                                                style="width: 24px; height: 24px; padding: 0; font-size: 14px; line-height: 1; display: flex; align-items: center; justify-content: center;">
                                                &times;
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="hidden" id="removed-images" name="removed_images" value="">
                            </div>
                        @endif
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            {{ isset($country) ? 'Update Country' : 'Create Country' }}
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
        $(document).ready(function() {
            $('#country-form').validate({
                rules: {
                    code: {
                        required: true,
                        minlength: 2,
                        maxlength: 10
                    },
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    category_id: {
                        required: true
                    },
                    day: {
                        required: true,
                        number: true,
                        min: 1
                    }
                },
                messages: {
                    code: {
                        required: "Country code is required",
                        minlength: "Minimum 2 characters",
                        maxlength: "Maximum 10 characters"
                    },
                    name: {
                        required: "Name is required",
                        minlength: "At least 3 characters",
                        maxlength: "Less than 255 characters"
                    },
                    category_id: {
                        required: "Category is required"
                    },
                    day: {
                        required: "Day is required",
                        number: "Must be a number",
                        min: "Minimum value is 1"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    var btn = $(form).find('button[type="submit"]');
                    var originalText = btn.text();
                    btn.prop('disabled', true).text('Processing...');
                    form.submit();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const removedImagesInput = document.getElementById('removed-images');

            document.querySelectorAll('.remove-image').forEach(button => {
                button.addEventListener('click', function() {
                    const imageName = this.getAttribute('data-image');

                    // Show confirmation dialog
                    const confirmed = confirm('Are you sure you want to remove this image?');
                    if (!confirmed) {
                        return; // If user cancels, do nothing
                    }

                    // Remove the image visually
                    this.parentElement.remove();

                    // Track removed images
                    let removed = removedImagesInput.value ? removedImagesInput.value.split(',') :
                    [];
                    removed.push(imageName);
                    removedImagesInput.value = removed.join(',');
                });
            });
        });
    </script>
@endpush
