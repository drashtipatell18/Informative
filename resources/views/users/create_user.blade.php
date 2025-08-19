@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header pb-0">
                <h6>{{ isset($user) ? 'Edit User' : 'Create User' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="post"
                    enctype="multipart/form-data" id="user-form">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ isset($user) ? $user->name : old('name') }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ isset($user) ? $user->email : old('email') }}">
                    </div>

                    @if (!isset($user))
                        <div class="mb-3 form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    @endif

                    <div class="mb-3 form-group">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-select" id="role_id" name="role_id">
                            <option value="" disabled {{ !isset($user) || !$user->role_id ? 'selected' : '' }}>Select
                                Role</option>
                            @foreach ($roles as $key => $role)
                                <option value="{{ $key }}"
                                    {{ (isset($user) && $user->role_id == $key) || old('role_id') == $key ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="photo" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                        {{-- Hidden field to retain old photo --}}
                        @if (isset($user) && $user->photo)
                            <input type="hidden" name="old_photo" value="{{ $user->photo }}">

                            <div class="mt-2">
                                <img src="{{ asset('images/users/' . $user->photo) }}" alt="Profile Image"
                                    class="img-fluid rounded" width="100">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            value="{{ isset($user) ? $user->phone : old('phone') }}">
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($user)
                                Update User
                            @else
                                Create User
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

        .is-valid {
            border-color: #198754;
        }

        .form-group {
            position: relative;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Debug: Check if jQuery and validation plugin are loaded
            console.log('jQuery loaded:', typeof $ !== 'undefined');
            console.log('jQuery Validate loaded:', typeof $.fn.validate !== 'undefined');

            // Add custom validation method for file extensions
            $.validator.addMethod("extension", function(value, element, param) {
                if (!value) return true; // File is optional
                param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
                return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
            }, "Please enter a value with a valid extension.");

            $('#user-form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255
                    },
                    @if (!isset($user))
                        password: {
                            required: true,
                            minlength: 8
                        },
                    @endif
                    role_id: {
                        required: true
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Name must be at least 3 characters long",
                        maxlength: "Name cannot exceed 255 characters"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address",
                        maxlength: "Email cannot exceed 255 characters"
                    },
                    @if (!isset($user))
                        password: {
                            required: "Please enter a password",
                            minlength: "Password must be at least 8 characters long"
                        },
                    @endif
                    role_id: {
                        required: "Please select a role"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Only digits are allowed",
                        minlength: "Phone number must be at least 10 digits",
                        maxlength: "Phone number cannot exceed 15 digits"
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
                    // Optional: Add loading state
                    var submitBtn = $(form).find('button[type="submit"]');
                    var originalText = submitBtn.text();
                    submitBtn.prop('disabled', true).text('Processing...');
                    // Submit the form
                    form.submit();
                }
            });

        });
    </script>
@endpush
