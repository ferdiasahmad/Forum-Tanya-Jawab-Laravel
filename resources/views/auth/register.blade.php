@extends('layouts.head')

<body>
    <main id="tt-pagecontent" class="tt-offset-none">
        <div class="container">
            <div class="tt-loginpages-wrapper">
                <div class="tt-loginpages">
                    @if ($errors->any())
                    <div class="card card-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <a class="tt-block-title">
                        <div class="tt-title">
                            Selamat datang
                        </div>
                        <div class="tt-description">
                            Isi form untuk mendaftar
                        </div>
                    </a>
                    <form class="form-default" method="POST" action="{{ route('login.register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Konfirmasi Password</label>
                            <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block">Daftar</button>
                        </div>
                        <p>Sudah punya  akun? <a href="{{ route('login') }}" class="tt-underline">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
</body>
