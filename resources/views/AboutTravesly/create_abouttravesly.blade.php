@extends('layouts.app')
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

        .is-valid {
            border-color: #28a745;
        }

        .image-container {
            position: relative;
            display: inline-block;
            margin: 5px;
        }

        .image-container img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .image-container.image-loading {
            opacity: 0.5;
            pointer-events: none;
        }

        .remove-btn {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .remove-btn:hover {
            background: #c82333;
        }

        .custom-btn {
            min-width: 150px;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($aboutTravel) ? 'Edit About Travel' : 'Create About Travel' }}</h6>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($aboutTravel) ? route('travesly.update', $aboutTravel->id) : route('travesly.store') }}"
                    method="post" enctype="multipart/form-data" id="about-travel-form">
                    @csrf

                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($aboutTravel) ? $aboutTravel->name : old('name') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="5">{{ isset($aboutTravel) ? $aboutTravel->description : old('description') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Images (multiple)</label>
                        <div id="existing-images" class="d-flex flex-wrap" style="gap: 10px;">

                            @if (isset($aboutTravel) && $aboutTravel->image)
                                @php
                                    $mediaFiles = json_decode($aboutTravel->image, true) ?? [];
                                @endphp
                                @foreach ($mediaFiles as $index => $file)
                                    @if (!empty($file))
                                        <div class="image-container position-relative" data-image="{{ $file }}"
                                            style="width: 120px; height: 120px;">
                                            <img src="{{ asset('images/AboutTravesly/' . $file) }}" alt="About Travel Media"
                                                class="img-thumbnail w-100 h-100" style="object-fit: cover;">
                                            <button type="button"
                                                class="btn btn-danger btn-sm remove-btn position-absolute"
                                                style="top: 5px; right: 5px; width: 25px; height: 25px; padding: 0; border-radius: 50%;"
                                                onclick="removeImageImmediately(this, '{{ $file }}')"
                                                title="Remove Image">×</button>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="file" class="form-control" id="image" name="image[]" multiple accept="image/*">
                        <input type="hidden" name="old_image" id="old_image"
                            value="{{ isset($aboutTravel) ? $aboutTravel->image : '' }}">
                        <input type="hidden" name="deleted_images" id="deleted_images" value="">
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($aboutTravel)
                                Update About Travel
                            @else
                                Create About Travel
                            @endisset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Form validation
            $('#about-travel-form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    description: {
                        required: true,
                        minlength: 10,
                        maxlength: 1000
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        minlength: "Name must be at least 3 characters long",
                        maxlength: "Name must be less than 255 characters"
                    },
                    description: {
                        required: "Description is required",
                        minlength: "Description must be at least 10 characters long",
                        maxlength: "Description must be less than 1000 characters"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-valid').removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    var submitBtn = $(form).find('button[type="submit"]');
                    var originalText = submitBtn.text();
                    submitBtn.prop('disabled', true).text('Processing...');
                    form.submit();
                }
            });

            window.removeImageImmediately = removeImageImmediately;

            // Get the correct about travel ID
            const aboutTravelId = {{ isset($aboutTravel) ? $aboutTravel->id : 'null' }};
            console.log('About Travel ID:', aboutTravelId); // Debug line

            // Immediate AJAX deletion function
            function removeImageImmediately(button, imageName) {
                if (!confirm('Are you sure you want to delete this image?')) {
                    return;
                }

                if (aboutTravelId && aboutTravelId !== null) {
                    // Add loading state
                    const imageContainer = $(button).closest('.image-container');
                    imageContainer.addClass('image-loading');
                    $(button).prop('disabled', true);

                    $.ajax({
                        url: '{{ route('abouttravesly.image.destroy') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            image_name: imageName,
                            about_travel_id: aboutTravelId
                        },
                        success: function(response) {
                            if (response.success) {
                                imageContainer.fadeOut(300, function() {
                                    $(this).remove();
                                });
                                showMessage('Image deleted successfully', 'success');
                            } else {
                                imageContainer.removeClass('image-loading');
                                $(button).prop('disabled', false);
                                showMessage('Error deleting image: ' + response.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            imageContainer.removeClass('image-loading');
                            $(button).prop('disabled', false);
                            let errorMessage = 'Error deleting image. Please try again.';

                            console.log('AJAX Error:', xhr); // Debug line

                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.status === 404) {
                                errorMessage = 'Delete route not found. Please check your routes.';
                            } else if (xhr.status === 500) {
                                errorMessage = 'Server error occurred while deleting image.';
                            }

                            showMessage(errorMessage, 'error');
                        }
                    });
                } else {
                    showMessage('Cannot delete image: About Travel ID not found', 'error');
                }
            }

            // Function to show messages
            function showMessage(message, type) {
                // Remove existing messages
                $('.alert').remove();

                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const alertHtml = `
                    <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;

                $('.card-body').prepend(alertHtml);

                // Auto hide after 3 seconds
                setTimeout(function() {
                    $('.alert').fadeOut();
                }, 3000);
            }

            // Preview new images before upload (optional enhancement)
            $('#image').change(function() {
                const files = this.files;
                $('#new-image-previews').remove(); // Remove existing previews

                if (files.length > 0) {
                    let previewsHtml =
                        '<div id="new-image-previews" class="d-flex flex-wrap mt-2" style="gap: 10px;">';

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const previewHtml = `
                                    <div class="image-container">
                                        <img src="${e.target.result}" alt="New Image Preview" style="width: 120px; height: 120px;" >
                                        <span class="badge bg-info position-absolute" style="top: -5px; left: -5px; font-size: 10px;">New</span>
                                    </div>
                                `;
                                $('#new-image-previews').append(previewHtml);
                            };
                            reader.readAsDataURL(file);
                        }
                    }

                    previewsHtml += '</div>';
                    $('#existing-images').after(previewsHtml);
                }
            });
        });
    </script>
@endpush
