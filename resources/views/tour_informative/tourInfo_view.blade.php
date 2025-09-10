@extends('layouts.app')

@section('content')
    <style>
        .ck.ck-powered-by {
            display: none !important;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Tour View List</h6>
                <a href="{{ route('tour_details.create') }}" class="btn btn-primary custom-btn">Add Tour View</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="tourDetailsTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Information</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tour_details as $item)
                                <tr>
                                    <td class="align-middle text-center text-sm">{{ $item->id }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->information->type }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->title }}</td>
                                    <td class="align-middle text-center text-sm">{{ Str::words(strip_tags($item->description), 10, '...') }}</td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('tour_details.edit', $item->id) }}"
                                            class="btn btn-primary custom-btn" title="Edit"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('tour_details.destroy', $item->id) }}"
                                            class="btn btn-danger custom-btn" title="Delete"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
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
            $('#tourDetailsTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                order: [
                    [0, 'asc']
                ], // Sort by ID by default
                columnDefs: [{
                        targets: [0], // ID column - sortable and searchable
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [1], // Name column - sortable and searchable
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [2], // Actions column - not sortable, not searchable
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    search: "Search TourDetails :",
                    lengthMenu: "Show _MENU_ TourDetails per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ TourDetails",
                    infoEmpty: "Showing 0 to 0 of 0 TourDetails",
                    infoFiltered: "(filtered from _MAX_ total TourDetails)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No categories available in table"
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
