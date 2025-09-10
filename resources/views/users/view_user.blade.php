@extends('layouts.app')
@section('content')
    <div class="container mt-5">

        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">User List</h6>
                <a href="{{ route('users.create') }}" class="btn btn-primary custom-btn">Add User</a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="userTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">User Info
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Role
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Phone</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Created Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <span class="text-sm">{{ $user->id }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ $user->photo ? asset('images/users/' . $user->photo) : asset('assets/img/team-2.jpg') }}"
                                                    class="avatar avatar-sm me-3" alt="user{{ $user->id }}">

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->role->name ?? 'User' }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span
                                            class="badge badge-sm {{ $user->status == 'active' ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                            {{ ucfirst($user->status ?? 'offline') }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs">{{ $user->phone ?? 'N/A' }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $user->created_at ? $user->created_at->format('d/m/y') : 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- Edit icon -->
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-secondary font-weight-bold text-xs me-2 d-inline custom-btn"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete icon -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)" onclick="confirm('Are you sure you want to delete this user?') ? document.getElementById('delete-form-{{ $user->id }}').submit() : false;"
                                                class="text-danger font-weight-bold text-xs custom-btn"
                                                data-toggle="tooltip" data-original-title="Delete user">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <p class="text-secondary mb-0">No users found</p>
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
            $('#userTable').DataTable({
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
                    search: "Search users:",
                    lengthMenu: "Show _MENU_ users per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ users",
                    infoEmpty: "Showing 0 to 0 of 0 users",
                    infoFiltered: "(filtered from _MAX_ total users)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: '<i class="bi bi-arrow-right-short"></i>',
                        previous: '<i class="bi bi-arrow-left-short"></i>'
                    },
                    emptyTable: "No users available in table"
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
