<nav class="flex items-center gap-2 text-sm">
    @auth
        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 font-medium text-gray-700 hover:bg-gray-100">Dasbor</a>
    @else
        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 font-medium text-gray-700 hover:bg-gray-100">Masuk</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="rounded-md bg-gray-900 px-3 py-2 font-medium text-white hover:bg-gray-700">Daftar</a>
        @endif
    @endauth
</nav>
