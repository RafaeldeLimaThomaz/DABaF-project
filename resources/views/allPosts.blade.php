@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="text-align: center; color: blue">
        {{ __('Posts') }}
    </div>
    <div style="margin: 10px">
    <a href="{{ route('post.form') }}" class="btn btn-primary">New post</a>
    </div>

    <div class="card-body">
        <div class="row mb-3" style="align-items: center; align-content: center">
            <table style="border-collapse: separate;
            border-spacing: 0;
            width: 80%; /* Adjust the width as needed */
            margin: 0 auto; /* Center the table */
            border-radius: 10px;">
                <thead>
                    <tr>
                        <th style="text-align: center; padding: 10px">Title</th>
                        <th style="text-align: center; padding: 10px">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ccc;">{{ $post->title }}</td>
                        <td style="padding: 10px; border: 1px solid #ccc;">{{ $post->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection