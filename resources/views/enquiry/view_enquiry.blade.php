@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Enquiry List</h6>
                <a href="{{ route('enquiry.create') }}" class="btn btn-primary custom-btn">Add Enquiry</a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="EnquiryTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Contact</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Travel Date
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">City</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Passengers
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Interest
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Message
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enquirys as $enquiry)
                                <tr>
                                    <td class="text-center">
                                        <span class="text-sm">{{ $enquiry->id }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $enquiry->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <span class="text-xs text-secondary mb-1">{{ $enquiry->email }}</span>
                                            <span class="text-xs text-secondary">{{ $enquiry->phone }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">
                                            {{ \Carbon\Carbon::parse($enquiry->travel_date)->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">{{ $enquiry->city }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-sm bg-gradient-info">{{ $enquiry->total_passenger }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="badge badge-sm
                                            @switch($enquiry->select_your_interest)
                                                @case('Beach Holidays')
                                                    bg-gradient-primary
                                                    @break
                                                @case('Adventure Holidays')
                                                    bg-gradient-success
                                                    @break
                                                @case('Nightlife Holidays')
                                                    bg-gradient-warning
                                                    @break
                                                @case('Self Drive Holidays')
                                                    bg-gradient-danger
                                                    @break
                                                @default
                                                    bg-gradient-secondary
                                            @endswitch
                                        ">{{ $enquiry->select_your_interest }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">
                                            {{ $enquiry->message ? Str::words($enquiry->message, 8, '...') : 'No message' }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">
                                            {{ $enquiry->created_at->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <!-- Edit icon -->
                                        <a href="{{ route('enquiry.edit', $enquiry->id) }}"
                                            class="text-secondary font-weight-bold text-xs me-2 d-inline custom-btn"
                                            data-toggle="tooltip" data-original-title="Edit enquiry">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete icon -->
                                        <form action="{{ route('enquiry.destroy', $enquiry->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $enquiry->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)"
                                                onclick="confirm('Are you sure you want to delete this Enquiry?') ? document.getElementById('delete-form-{{ $enquiry->id }}').submit() : false;"
                                                class="text-danger font-weight-bold text-xs custom-btn"
                                                data-toggle="tooltip" data-original-title="Delete Enquiry">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        <p class="text-secondary mb-0">No Enquiry found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#EnquiryTable').DataTable({
                destroy: true, // Handle reinitialization
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                order: [
                    [0, 'desc']
                ], // Sort by ID (newest first)
                columnDefs: [{
                        // Make Actions column (last column) non-sortable and non-searchable
                        targets: -1, // Last column
                        orderable: false,
                        searchable: false
                    },
                    {
                        // Message column - searchable but not sortable
                        targets: 7,
                        orderable: false,
                        searchable: true
                    }
                ],
                language: {
                    search: "Search enquiries:",
                    lengthMenu: "Show _MENU_ enquiries per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ enquiries",
                    infoEmpty: "Showing 0 to 0 of 0 enquiries",
                    infoFiltered: "(filtered from _MAX_ total enquiries)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No enquiries available in table"
                },
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                drawCallback: function() {
                    // Re-initialize tooltips after table redraw
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            // Initialize tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
