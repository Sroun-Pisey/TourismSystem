@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 40px">
    <h2>Post Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $post->id }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $post->title }}</td>
        </tr>
        <tr>
            <th>Customer</th>
            <td>{{ $post->customer->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $post->category->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Content</th>
            <td>{{ $post->content }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span class="badge {{ $post->status ? 'bg-success' : 'bg-secondary' }}">
                    {{ $post->status ? 'Published' : 'Draft' }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Feather Image</th>
            <td>
                @if($post->feather_image)
                    <img src="{{ asset('storage/' . $post->feather_image) }}" width="120" height="120" style="object-fit: cover; border: 1px solid #ccc;">
                @else
                    <img src="{{ asset('img/no_image.jpg') }}" width="120" height="120" style="object-fit: cover; border: 1px solid #ccc;">
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
</div>

@endsection
