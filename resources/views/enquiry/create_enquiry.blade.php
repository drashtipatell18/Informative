@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-header pb-0">
                <h6>{{ isset($enquiry) ? 'Edit Enquiry' : 'Create Enquiry' }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ isset($enquiry) ? route('enquiry.update', $enquiry->id) : route('enquiry.store') }}"
                    method="post" id="enquiry-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name"
                                    value="{{ isset($enquiry) ? $enquiry->name : old('name') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email"
                                    value="{{ isset($enquiry) ? $enquiry->email : old('email') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone"
                                    value="{{ isset($enquiry) ? $enquiry->phone : old('phone') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="travel_date" class="form-label">Travel Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('travel_date') is-invalid @enderror"
                                    id="travel_date" name="travel_date"
                                    value="{{ isset($enquiry) ? $enquiry->travel_date : old('travel_date') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city"
                                    value="{{ isset($enquiry) ? $enquiry->city : old('city') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <label for="total_passenger" class="form-label">Total Passengers <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('total_passenger') is-invalid @enderror"
                                    id="total_passenger" name="total_passenger" min="1"
                                    value="{{ isset($enquiry) ? $enquiry->total_passenger : old('total_passenger') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="select_your_interest" class="form-label">Select Your Interest <span
                                class="text-danger">*</span></label>
                        <select class="form-control @error('select_your_interest') is-invalid @enderror"
                            id="select_your_interest" name="select_your_interest" required>
                            <option value="">Choose your interest...</option>
                            <option value="Beach Holidays"
                                {{ (isset($enquiry) && $enquiry->select_your_interest == 'Beach Holidays') || old('select_your_interest') == 'Beach Holidays' ? 'selected' : '' }}>
                                Beach Holidays
                            </option>
                            <option value="Adventure Holidays"
                                {{ (isset($enquiry) && $enquiry->select_your_interest == 'Adventure Holidays') || old('select_your_interest') == 'Adventure Holidays' ? 'selected' : '' }}>
                                Adventure Holidays
                            </option>
                            <option value="Nightlife Holidays"
                                {{ (isset($enquiry) && $enquiry->select_your_interest == 'Nightlife Holidays') || old('select_your_interest') == 'Nightlife Holidays' ? 'selected' : '' }}>
                                Nightlife Holidays
                            </option>
                            <option value="Self Drive Holidays"
                                {{ (isset($enquiry) && $enquiry->select_your_interest == 'Self Drive Holidays') || old('select_your_interest') == 'Self Drive Holidays' ? 'selected' : '' }}>
                                Self Drive Holidays
                            </option>
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4"
                            placeholder="Enter your message or special requirements...">{{ isset($enquiry) ? $enquiry->message : old('message') }}</textarea>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary custom-btn">
                            @isset($enquiry)
                                Update Enquiry
                            @else
                                Create Enquiry
                            @endisset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#enquiry-form').validate({
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
                        phone: {
                            required: true,
                            digits: true,
                            minlength: 10,
                            maxlength: 15
                        },
                        travel_date: {
                            required: true,
                            date: true
                        },
                        city: {
                            required: true,
                            minlength: 2,
                            maxlength: 100
                        },
                        total_passenger: {
                            required: true,
                            number: true,
                            min: 1,
                            max: 50
                        },
                        select_your_interest: {
                            required: true
                        }
                    },
                    messages: {
                        name: {
                            required: "Name is required",
                            minlength: "Name must be at least 3 characters long",
                            maxlength: "Name must be less than 255 characters"
                        },
                        email: {
                            required: "Email is required",
                            email: "Please enter a valid email address",
                            maxlength: "Email must be less than 255 characters"
                        },
                        phone: {
                            required: "Phone number is required",
                            digits: "Please enter only numbers",
                            minlength: "Phone number must be at least 10 digits",
                            maxlength: "Phone number must be less than 15 digits"
                        },
                        travel_date: {
                            required: "Travel date is required",
                            date: "Please enter a valid date"
                        },
                        city: {
                            required: "City is required",
                            minlength: "City must be at least 2 characters long",
                            maxlength: "City must be less than 100 characters"
                        },
                        total_passenger: {
                            required: "Number of passengers is required",
                            number: "Please enter a valid number",
                            min: "At least 1 passenger is required",
                            max: "Maximum 50 passengers allowed"
                        },
                        select_your_interest: {
                            required: "Please select your interest"
                        }
                    },
                    errorElement: 'span',
                    errorClass: 'invalid-feedback',
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

                        // Disable button and show processing state
                        submitBtn.prop('disabled', true).text('Processing...');

                        // Optional: Re-enable button after form submission (in case of errors)
                        setTimeout(function() {
                            submitBtn.prop('disabled', false).text(originalText);
                        }, 3000);

                        form.submit();
                    }
                });

                // Optional: Add custom validation method for future date
                $.validator.addMethod("futureDate", function(value, element) {
                    if (!value) return true; // Let required handle empty values
                    var today = new Date();
                    var inputDate = new Date(value);
                    return inputDate >= today;
                }, "Travel date must be today or in the future");

                // Optional: Apply future date validation to travel_date
                $("#travel_date").rules("add", {
                    futureDate: true
                });
            });
        </script>
    @endpush
@endsection
