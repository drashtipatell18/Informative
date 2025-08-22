@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">AboutUS</h6>
                <a href="{{ route('aboutus.create') }}" class="btn btn-primary custom-btn">Add AboutUs</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="aboutTravelTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutus as $item)
                                <tr>
                                    <td class="align-middle text-center text-sm">{{ $item->id }}</td>
                                    <td class="align-middle text-center text-sm">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ Str::limit($item->title, 30) }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs">{{ Str::limit($item->description, 50) }}</span>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            // Decode JSON and get first image only
                                            $images = $item->images ? json_decode($item->images, true) : [];
                                            $firstImage =
                                                !empty($images) && is_array($images) ? trim($images[0]) : null;
                                        @endphp

                                        @if ($firstImage)
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('images/AboutUs/' . $firstImage) }}" alt="Product Image"
                                                style="width: 30px; height: 30px; object-fit: cover; border: 2px solid #dee2e6;"
                                               >
                                        @else
                                            <img src="{{ asset('images/AboutUs/dummy_product.png') }}"
                                                alt="Default Product Image" class="img-fluid rounded-circle"
                                                style="width: 30px; height: 30px; object-fit: cover; border: 2px solid #dee2e6;">
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('aboutus.edit', $item->id) }}" class="btn btn-primary custom-btn"
                                            title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('aboutus.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger custom-btn" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this about us?');"><i
                                                    class="bi bi-trash"></i></button>
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
                    // DataTable initialization
                    $('#aboutTravelTable').DataTable({
                        responsive: true,
                        pageLength: 10,
                        lengthMenu: [
                            [5, 10, 25, 50, -1],
                            [5, 10, 25, 50, "All"]
                        ],
                        order: [
                            [0, 'desc']
                        ], // Sort by ID desc by default
                        columnDefs: [{
                                targets: [0, 1, 2, 4, 5], // Sortable columns
                                orderable: true,
                                searchable: true
                            },
                            {
                                targets: [3, 6], // Image and Actions columns
                                orderable: false,
                                searchable: false
                            }
                        ],
                        language: {
                            search: "Search travels:",
                            lengthMenu: "Show _MENU_ travels per page",
                            info: "Showing _START_ to _END_ of _TOTAL_ travels",
                            infoEmpty: "Showing 0 to 0 of 0 travels",
                            infoFiltered: "(filtered from _MAX_ total travels)",
                            paginate: {
                                first: "First",
                                last: "Last",
                                next: '<i class="bi bi-arrow-right-short"></i>',
                                previous: '<i class="bi bi-arrow-left-short"></i>'
                            },
                            emptyTable: "No travels available in table"
                        },
                        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                            '<"row"<"col-sm-12"tr>>' +
                            '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                        drawCallback: function() {
                            $('[data-toggle="tooltip"]').tooltip();
                        }
                    });

                    // Function to view full image
                    function viewFullImage(src) {
                        const modal = $(`
                <div class="modal fade" id="imageModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Full Image</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="${src}" class="img-fluid" alt="Full size image">
                            </div>
                        </div>
                    </div>
                </div>
            `);

                        $('body').append(modal);
                        $('#imageModal').modal('show');

                        $('#imageModal').on('hidden.bs.modal', function() {
                            $(this).remove();
                        });
                    }
    </script>
@endpush
