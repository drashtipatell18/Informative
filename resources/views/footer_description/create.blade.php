@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($footer) ? 'Edit Footer' : 'Create Footer' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($footer) ? route('footer_description.update', $footer->id) : route('footer_description.store') }}" method="post"
                    enctype="multipart/form-data" id="footer-form">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" cols="50"> {{ $footer->description ?? '' }}</textarea>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($footer)
                                Update Footer
                            @else
                                Create Footer
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
            $('#footer-form').validate({
                rules: {
                    description: {
                        required: true,
                        minlength: 10,  // minimum 10 characters
                        maxlength: 1000 // maximum 1000 characters
                    }
                },
                messages: {
                    description: {
                        required: "Description is required",
                        minlength: "Description must be at least 10 characters long",
                        maxlength: "Description must be less than 1000 characters"
                    }
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
        });
    </script>
@endpush
