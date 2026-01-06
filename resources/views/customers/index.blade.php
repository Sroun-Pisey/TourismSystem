@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Customer List</h3>
        <a href="{{ route('customers.create') }}" class="btn btn-success">+ Add New Customer</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="margin-top: 10px;">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($customer->profile_image)
                                    <img src="{{ asset('storage/' . $customer->profile_image) }}" alt="Profile" width="40" height="40" class="rounded-circle">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <span class="badge bg-{{ $customer->status == 'active' ? 'success' : ($customer->status == 'banned' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($customer->status) }}
                                </span>
                            </td>
                            <td>{{ $customer->phone ?? '-' }}</td>
                            <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                            <td>

                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                            zz

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const deleteButtons = document.querySelectorAll('.delete-button');

                                        deleteButtons.forEach(button => {
                                            button.addEventListener('click', function () {
                                                const form = this.closest('.delete-form');

                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "This action cannot be undone.",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#d33',
                                                    cancelButtonColor: '#6c757d',
                                                    confirmButtonText: 'Yes, delete it!',
                                                    cancelButtonText: 'Cancel'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        form.submit();
                                                    }
                                                });
                                            });
                                        });
                                    });
                                </script>

                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No customers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
