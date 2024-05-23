<header>
    <div class="container">
        <div class="logo">
            <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="logo">
        </div>
        <nav class="nav-wrapper">
            <ul>
                <li>
                    <a href="{{ route('home')}}">HOME</a>
                </li>
                <li>
                    <a href="{{ route('comics.index')}}">COMICS</a>
                </li>
                <li>
                    <a href="{{ route('comics.create')}}">ADD COMIC</a>
                </li>
            </ul>
        </nav>
    </div>
</header>