@extends('layouts.app')

@section('content')
    <div class="card shadow-sm mt-4" style="border-radius: 15px;">
        <div class="card-body p-4">
            <h3 class="mb-4">Yeni Blog Yazısı Ekle</h3>
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Başlık</label>
                    <input type="text" name="title" class="form-control" style="border-radius: 10px;" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">İçerik</label>
                    <textarea name="content" class="form-control" rows="6" style="border-radius: 10px;" required></textarea>
                </div>
                <button type="submit" class="btn btn-success" style="border-radius: 10px;">Yazıyı Paylaş</button>
            </form>
        </div>
    </div>
@endsection
