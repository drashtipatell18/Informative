@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Service List</h6>
                <a href="{{ route('service.create') }}" class="btn btn-primary custom-btn">Add Service</a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="ServiceTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                <th class="text-secondary opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td class="text-center">
                                        <span class="text-sm">{{ $service->id }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ $service->image ? asset('images/services/' . $service->image) : asset('assets/img/team-2.jpg') }}"
                                                    class="avatar avatar-sm me-3" alt="service{{ $service->id }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h3 class="mb-0 text-sm">{{ $service->name }}</h3>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">
                                            {{ $service->description ? Str::words($service->description, 10, '...') : 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <!-- Edit icon -->
                                        <a href="{{ route('service.edit', $service->id) }}"
                                            class="text-secondary font-weight-bold text-xs me-2 d-inline custom-btn"
                                            data-toggle="tooltip" data-original-title="Edit service">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete icon -->
                                        <form action="{{ route('service.destroy', $service->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $service->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)"
                                                onclick="confirm('Are you sure you want to delete this Service?') ? document.getElementById('delete-form-{{ $service->id }}').submit() : false;"
                                                class="text-danger font-weight-bold text-xs custom-btn"
                                                data-toggle="tooltip" data-original-title="Delete Service">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <p class="text-secondary mb-0">No Service found</p>
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
            $('#ServiceTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                order: [
                    [0, 'asc']
                ], // Sort by ID by default
                columnDefs: [
                    {
                        targets: [0], // ID column - sortable and searchable
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [1], // Image column - not sortable, not searchable
                        orderable: false,
                        searchable: false
                    },
                    {
                        targets: [2], // Name column - sortable and searchable
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [3], // Description column - sortable and searchable
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [4], // Actions column - not sortable, not searchable
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    search: "Search services:",
                    lengthMenu: "Show _MENU_ services per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ services",
                    infoEmpty: "Showing 0 to 0 of 0 services",
                    infoFiltered: "(filtered from _MAX_ total services)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No services available in table"
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
