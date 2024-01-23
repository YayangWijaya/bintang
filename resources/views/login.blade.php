@extends('layouts.default')

@section('content')
<div class="my-account" style="margin-top: 75px;">
    <form method="post" class="login" method="post" action="{{ route('login') }}">
        <h2>Login Form</h2>
        @csrf
        <p class="form-row form-row-wide">
            <label for="email">Email:
                <i class="ln ln-icon-Male"></i>
                <input type="text" class="input-text" name="email" id="email" required/>
            </label>
        </p>

        <p class="form-row form-row-wide">
            <label for="password">Password:
                <i class="ln ln-icon-Lock-2"></i>
                <input class="input-text" type="password" name="password" id="password" required/>
            </label>
        </p>

        @if (session()->get('message'))
            <p style="color: #E12A2A;">{{ session()->get('message') }}</p>
        @endif

        <p class="form-row">
            <input type="submit" class="button border fw margin-top-10" value="Login"/>
            <span>Belum punya akun? <a href="{{ route('signup') }}">Daftar</a></span>
        </p>
    </form>
</div>
@endsection
