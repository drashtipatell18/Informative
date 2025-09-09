@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-2">Contact List</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="contactTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    City</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Phone</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Message</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $item)
                                <tr>
                                    <td class="align-middle text-center text-sm">{{ $item->id }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->name }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->email }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->city }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->phone }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->message }}</td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('contact.destroy', $item->id) }}"
                                            class="btn btn-danger custom-btn"><i class="bi bi-trash"></i></a>
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
            $('#contactTable').DataTable({
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
                        targets: [3], // Status column (0-indexed) - CORRECT
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [5], // Created date column (0-indexed) - CORRECT
                        type: 'date'
                    },
                    {
                        targets: [6], // Actions column (0-indexed) - CORRECT
                        orderable: false,
                        searchable: false
                    }
                ],

                language: {
                    search: "Search contacts:",
                    lengthMenu: "Show _MENU_ contacts per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ contacts",
                    infoEmpty: "Showing 0 to 0 of 0 contacts",
                    infoFiltered: "(filtered from _MAX_ total contacts)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No contact available in table"
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
            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

        });
    </script>
@endpush
