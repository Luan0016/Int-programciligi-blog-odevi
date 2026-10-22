@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Son Yazılar</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm" style="border-radius: 15px;">
                    <div class="card-body mt-2">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($post->content, 100) }}</p>

                        <div class="d-flex gap-2 align-items-center">
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm" style="border-radius: 10px;">Devamını Oku</a>

                            @if(session('is_admin'))
                                <form action="{{ route('admin.destroy', $post->id) }}" method="POST" class="m-0" onsubmit="return confirm('Bu yazıyı silmek istediğine emin misin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 10px;">Sil</button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Henüz blog yazısı eklenmemiş.</p>
            </div>
        @endforelse
    </div>
@endsection
