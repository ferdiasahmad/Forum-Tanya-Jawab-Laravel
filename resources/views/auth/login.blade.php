@extends('layouts.head')

<body>
 <main id="tt-pageContent" class="tt-offset-none">
    <div class="container">
        <div class="tt-loginpages-wrapper">
            <div class="tt-loginpages">
                @if ($errors->any())
                <div class="card card-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <a class="tt-block-title">
                    <div class="tt-title">
                        Selamat Datang
                    </div>
                    <div class="tt-description">
                        Log in untuk memulai
                    </div>
                </a>
                <form class="form-default" method="POST" action="{{ route('login.auth') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-block">
                            Login
                        </button>
                    </div>
                    <p>Belum punya akun? <a href="{{ route('register') }}" class="tt-underline">Daftar disini</a></p>
                </form>
            </div>
        </div>
    </div>
 </main>
 <script src="{{ asset('assets/js/bundle.js') }}"></script>
</body>
