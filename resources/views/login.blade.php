@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Yönetici Girişi</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input type="text" name="username" class="form-control" style="border-radius: 10px;" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Şifre</label>
                            <input type="password" name="password" class="form-control" style="border-radius: 10px;" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100" style="border-radius: 10px;">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
