@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Posts List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">+ Create New Post</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Feather Image</th>
                <th style="width: 40%;">Title</th>
                <th>Customer</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <td style="width:100px;">
                    @if($post->feather_image)
                        <img src="{{ asset('storage/' . $post->feather_image) }}" alt="Feather Image" class="img-fluid rounded" />
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->customer->name ?? 'N/A' }}</td>
                <td>{{ $post->category->name ?? 'N/A' }}</td>
                <td>
                    @if($post->status)
                        <span class="badge bg-success">Published</span>
                    @else
                        <span class="badge bg-secondary">Unpublished</span>
                    @endif
                </td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary" title="Show">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form style="display: inline;" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No posts found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
