@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Countries List</h6>
                <a href="{{ route('country.create') }}" class="btn btn-primary custom-btn">Add Country</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="countryTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Code</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Category</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Day</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $key => $country)
                                <tr>
                                    <td class="align-middle text-center text-sm">{{ $key + 1 }}</td>
                                    <td class="align-middle text-center text-sm">{{ $country->code }}</td>
                                    <td class="align-middle text-center text-sm">{{ $country->name }}</td>
                                    <td class="align-middle text-center text-sm">{{ $country->category->name ?? 'N/A' }}</td>
                                    <td class="align-middle text-center text-sm">{{ $country->day }}</td>
                                    <td class="align-middle text-center text-sm">
                                        @php
                                            // Handle both string and array cases
                                            $images = $country->images;
                                            if (is_string($images)) {
                                                $images = json_decode($images, true) ?? [];
                                            } elseif (is_null($images)) {
                                                $images = [];
                                            }
                                        @endphp

                                        @if (is_array($images) && count($images) > 0)
                                            @foreach ($images as $image)
                                                <img src="{{ asset('images/countries/' . $image) }}"
                                                     alt="Country Image"
                                                     width="50"
                                                     class="me-1 mb-1"
                                                     onerror="this.style.display='none'">
                                            @endforeach
                                        @else
                                            <span class="text-muted">No images</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('country.edit', $country->id) }}"
                                            class="btn btn-primary custom-btn" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('country.destroy', $country->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger custom-btn" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this country?');">
                                                <i class="bi bi-trash"></i>
                                            </button>
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
            $('#countryTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                        targets: [0, 1, 2, 3, 4],
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [5, 6],
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    search: "Search countries:",
                    lengthMenu: "Show _MENU_ countries per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ countries",
                    infoEmpty: "Showing 0 to 0 of 0 countries",
                    infoFiltered: "(filtered from _MAX_ total countries)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No countries available in table"
                },
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                drawCallback: function() {
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
