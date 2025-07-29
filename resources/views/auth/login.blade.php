@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md border border-gray-200">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Selamat Datang 
    </h2>

    <form method="POST" action="{{ route('login.action') }}" class="space-y-5">
        @csrf

        @if ($errors->has('login'))
            <div class="text-red-500 text-sm text-center">
                {{ $errors->first('login') }}
            </div>
        @endif

        {{-- Username --}}
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                Username
            </label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Password
            </label>
            <input type="password" id="password" name="password" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>

        {{-- Remember Me --}}
        <div class="flex items-center justify-between text-sm">
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <span class="ml-2 text-gray-600">Ingat Saya</span>
            </label>
            <a href="#" class="text-blue-600 hover:underline">Lupa Password?</a>
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition transform hover:scale-105">
            Masuk
        </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
        Belum punya akun?
        <a href="#" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
    </p>
</div>
@endsection
