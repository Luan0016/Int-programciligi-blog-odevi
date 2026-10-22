@extends('layouts.app')

@section('content')
    <div class="card shadow-sm mt-4" style="border-radius: 15px;">
        <div class="card-body p-5">
            <h1 class="mb-4">{{ $post->title }}</h1>
            <p style="white-space: pre-line;">{{ $post->content }}</p>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-4" style="border-radius: 10px;">Geri Dön</a>
        </div>
    </div>
@endsection
