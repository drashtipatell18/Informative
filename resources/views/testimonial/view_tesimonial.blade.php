@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Testimonial List</h6>
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary custom-btn">Add Testimonial</a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="TestimonialTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                <th class="text-secondary opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($testimonials as $testimonial)
                                <tr>
                                    <td class="text-center">
                                        {{ $testimonial->id }}
                                    </td>

                                    <td class="text-center">
                                        <img src="{{ $testimonial->image ? asset('images/testimonial/' . $testimonial->image) : asset('assets/img/placeholder.jpg') }}"
                                             alt="testimonial image" width="50" height="50"
                                             class="rounded-circle">
                                    </td>

                                    <td class="text-center">
                                        {{ $testimonial->name }}
                                    </td>

                                    <td class="text-center">
                                        {{ Str::words($testimonial->description, 10, '...') }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                           class="text-secondary font-weight-bold text-xs me-2 d-inline custom-btn" data-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}"
                                              method="POST" class="d-inline"
                                              id="delete-form-{{ $testimonial->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-danger font-weight-bold text-xs custom-btn"
                                                    onclick="if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $testimonial->id }}').submit();"
                                                    data-toggle="tooltip" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No Testimonials Found
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
        $(document).ready(function () {
            $('#TestimonialTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                order: [[0, 'asc']],
                columnDefs: [
                    { targets: 0, orderable: true, searchable: true },
                    { targets: 1, orderable: false, searchable: false },
                    { targets: 2, orderable: true, searchable: true },
                    { targets: 3, orderable: true, searchable: true },
                    { targets: 4, orderable: false, searchable: false }
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ testimonials",
                    infoEmpty: "Showing 0 to 0 of 0 testimonials",
                    infoFiltered: "(filtered from _MAX_ total testimonials)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No testimonials available"
                },
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                     '<"row"<"col-sm-12"tr>>' +
                     '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                drawCallback: function () {
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
