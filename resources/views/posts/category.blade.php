@extends('layouts.app')

@section('content')
<div class="container">


   <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Category List</h3>
        <!-- Trigger Modal Button -->
        <button class="btn btn-success" data-toggle="modal" data-target="#createCategoryModal">
    + Add New Category
</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                        <button class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card" style="margin-top: 20px;">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0" style="text-align: center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td>

                                <!-- Edit Button -->
<a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCategoryModal-{{ $category->id }}">
    <i class="fas fa-edit"></i>
</a>

<!-- Edit Modal -->
<div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel-{{ $category->id }}">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name-{{ $category->id }}">Category Name</label>
                        <input type="text" class="form-control" id="name-{{ $category->id }}" name="name" value="{{ $category->name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <form style="display:inline;" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline delete-form">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger delete-button" data-id="{{ $category->id }}">
        <i class="fas fa-trash"></i>
    </button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('form');

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
                        <tr><td colspan="4" class="text-center text-muted">No categories found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
