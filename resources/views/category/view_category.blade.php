@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Category List</h6>
                <a href="{{ route('category.create') }}" class="btn btn-primary custom-btn">Add Category</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="categoryTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $item)
                                <tr>
                                    <td class="align-middle text-center text-sm">{{ $key + 1 }}</td>
                                    <td class="align-middle text-center text-sm">{{ $item->name }}</td>
                                    <td class="align-middle text-center text-sm">
                                        <!-- Edit icon -->
                                        <a href="{{ route('category.edit', $item->id) }}"
                                            class="text-secondary font-weight-bold text-xs me-2 d-inline custom-btn"
                                            data-toggle="tooltip" data-original-title="Edit category">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete icon -->
                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)"
                                                onclick="confirm('Are you sure you want to delete this category?') ? document.getElementById('delete-form-{{ $item->id }}').submit() : false;"
                                                class="text-danger font-weight-bold text-xs custom-btn"
                                                data-toggle="tooltip" data-original-title="Delete user">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </form>
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
            $('#categoryTable').DataTable({
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
                    search: "Search categories:",
                    lengthMenu: "Show _MENU_ categories per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ categories",
                    infoEmpty: "Showing 0 to 0 of 0 categories",
                    infoFiltered: "(filtered from _MAX_ total categories)",
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
