@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($tour_details) ? 'Edit Tour Details' : 'Create Tour Details' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($tour_details) ? route('tour_details.update', $tour_details->id) : route('tour_details.store') }}"
                    method="post" enctype="multipart/form-data" id="tour_details-form">
                    @csrf
                    @if (isset($tour_details))
                        @method('PUT')
                    @endif

                    <div class="mb-3 form-group">
                        <label for="country_id" class="form-label">Country</label>
                        <select class="form-control" name="country_id" id="country_id">
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ old('country_id', $tour_details->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="information_id" class="form-label">Information</label>
                        <select class="form-control" name="information_id" id="information_id">
                            <option value="">-- Select Information --</option>
                            @foreach ($informations as $information)
                                <option value="{{ $information->id }}"
                                    {{ old('information_id', $tour_details->information_id ?? '') == $information->id ? 'selected' : '' }}>
                                    {{ $information->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 form-group" id="title-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $tour_details->title ?? '') }}">
                    </div>

                    <div class="mb-3 form-group" id="description-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $tour_details->description ?? '') }}</textarea>
                    </div>

                   <div class="mb-3 form-group" id="image-group" style="display: none;">
                        <label for="images" class="form-label">Upload Images</label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*" class="form-control" />

                        @if(!empty($tour_details->image_path))
                            <div class="mt-3" id="image-preview">
                                @php
                                    $images = explode(',', $tour_details->image_path);
                                @endphp
                                @foreach($images as $img)
                                    <img src="{{ asset('tour_images/' . $img) }}" alt="Tour Image" style="max-width: 150px; margin-right: 10px; margin-bottom:10px;"/>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            {{ isset($tour_details) ? 'Update Tour Details' : 'Create Tour Details' }}
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
            document.addEventListener('DOMContentLoaded', function () {
                const informationSelect = document.getElementById('information_id');
                const descriptionGroup = document.getElementById('description-group');
                const titleGroup = document.getElementById('title-group');
                const imageGroup = document.getElementById('image-group');

                const mediaInformationIds = @json($mediaInformationIds);

                function toggleFields() {
                    const selectedId = parseInt(informationSelect.value);
                    if (mediaInformationIds.includes(selectedId)) {
                        descriptionGroup.style.display = 'none';
                        imageGroup.style.display = 'block';
                    } else {
                        descriptionGroup.style.display = 'block';
                        imageGroup.style.display = 'none';
                    }
                }

                toggleFields();

                informationSelect.addEventListener('change', toggleFields);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tour_details-form').validate({
                rules: {
                    information_id: {
                        required: true
                    },
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                },
                messages: {
                    title: {
                        required: "Title is required",
                        minlength: "At least 3 characters",
                        maxlength: "Less than 255 characters"
                    },
                    information_id: {
                        required: "Information is required"
                    },
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
    </script>
   

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
