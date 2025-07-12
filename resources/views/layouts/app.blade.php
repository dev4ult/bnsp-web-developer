@include('header')
<nav class="shadow p-5 flex justify-between items-center">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <div class="flex gap-5 items-center">

        <div class="dropdown dropdown-hover dropdown-end">
            <div tabindex="0" role="button" class="bg-black text-white text-2xl w-10 h-10 grid place-content-center rounded-full"><i class="iconoir-user"></i></div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                <li><a href="{{ route('profile.index') }}">Profil Saya</a></li>
                <li><a href="{{ route('logout') }}" class="bg-red-500 mt-1 hover:bg-red-600">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
@include('footer')