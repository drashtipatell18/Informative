@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($information) ? 'Edit Information' : 'Create Information' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($information) ? route('information.update', $information->id) : route('information.store') }}" method="post"
                    enctype="multipart/form-data" id="information-form">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type"
                            value="{{ isset($information) ? $information->type : old('type') }}">
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($information)
                                Update Information
                            @else
                                Create Information
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
            $('#information-form').validate({
                rules: {
                    type: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        minlength: "Name must be at least 3 characters long",
                        maxlength: "Name must be less than 255 characters"
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
