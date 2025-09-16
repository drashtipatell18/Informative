@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Video Slider List</h6>
                <a href="{{ route('videoslider.create') }}" class="btn btn-primary custom-btn">Add Slider</a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="VideoSliderTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Video</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($videosliders as $key => $slider)
                                <tr>
                                    <td class="text-center">
                                        <span class="text-sm">{{ $key + 1 }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex px-2 py-1 justify-content-center">
                                            <div class="video-preview-container" style="position: relative;">
                                                @if ($slider->video)
                                                    <!-- Video Element -->
                                                    <video width="80" height="60"
                                                        style="border-radius: 8px; object-fit: cover;" muted
                                                        preload="metadata" onmouseover="this.play()"
                                                        onmouseout="this.pause(); this.currentTime = 0;">
                                                        <source src="{{ asset('video/videoslider/' . $slider->video) }}"
                                                            type="video/mp4">
                                                        <source src="{{ asset('video/videoslider/' . $slider->video) }}"
                                                            type="video/webm">
                                                        Your browser does not support the video tag.
                                                    </video>

                                                    <!-- Play button overlay -->
                                                    <div
                                                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); pointer-events: none;">
                                                        <i class="bi bi-play-circle-fill text-white"
                                                            style="font-size: 20px; text-shadow: 0 0 10px rgba(0,0,0,0.5);"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h3 class="mb-0 text-sm">{{ $slider->name }}</h3>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- Edit icon -->
                                        <a href="{{ route('videoslider.edit', $slider->id) }}"
                                            class="text-secondary font-weight-bold text-xs me-2 d-inline custom-btn"
                                            data-toggle="tooltip" data-original-title="Edit slider">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete icon -->
                                        <form action="{{ route('videoslider.destroy', $slider->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $slider->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)"
                                                onclick="confirm('Are you sure you want to delete this Slider?') ? document.getElementById('delete-form-{{ $slider->id }}').submit() : false;"
                                                class="text-danger font-weight-bold text-xs custom-btn"
                                                data-toggle="tooltip" data-original-title="Delete Slider">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <!-- Remove the colspan row, DataTables will handle empty state -->
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
            $('#VideoSliderTable').DataTable({
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
                        targets: [1], // Video column - not sortable, not searchable
                        orderable: false,
                        searchable: false
                    },
                    {
                        targets: [2], // Name column - sortable and searchable
                        orderable: true,
                        searchable: true
                    },
                    {
                        targets: [3], // Actions column - not sortable, not searchable
                        orderable: false,
                        searchable: false
                    }
                    // Removed the [4] target since there are only 4 columns (0,1,2,3)
                ],
                language: {
                    search: "Search sliders:",
                    lengthMenu: "Show _MENU_ sliders per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ sliders",
                    infoEmpty: "Showing 0 to 0 of 0 sliders",
                    infoFiltered: "(filtered from _MAX_ total sliders)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No sliders available in table"
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
