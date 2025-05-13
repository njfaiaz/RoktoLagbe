<div class="container header">
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ route('user.dashboard') }}" class="">
                <div class="nav__logo">RoktoLagbe<span class="dot">.com</span></div>
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('user.dashboard') }}"
                            class="nav__link {{ request()->routeIs('user.dashboard') ? 'active-link' : '' }}">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ route('user.search') }}"
                            class="nav__link {{ request()->routeIs('user.search') ? 'active-link' : '' }}">
                            <i class='bx bx-search nav__icon'></i>
                            <span class="nav__name">Search</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ route('user.history') }}"
                            class="nav__link {{ request()->routeIs('user.history') ? 'active-link' : '' }}">
                            <i class='bx bx-history nav__icon'></i>
                            <span class="nav__name">History</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ route('user.fake') }}"
                            class="nav__link {{ request()->is('user.fake') ? 'active-link' : '' }}">
                            <i class='bx bxs-user-x nav__icon'></i>
                            <span class="nav__name">Fake User</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="support.html" class="nav__link {{ request()->is('support') ? 'active-link' : '' }}">
                            <i class='bx bx-support nav__icon'></i>
                            <span class="nav__name">Support</span>
                        </a>
                    </li>

                </ul>

            </div>
            @php
                $user = auth()->user();
                $profileImage =
                    auth()->user()->profiles && auth()->user()->profiles->image
                        ? asset(auth()->user()->profiles->image)
                        : asset('images/profile_av.jpg');
            @endphp

            <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                <img src="{{ $profileImage }}" width="60" height="60">
            </div>

            <!--------------------- setting-menu ---------------------------------------->
            <div class="setting-menu">
                <div id="dark-btn">
                    <span></span>
                </div>
                <div class="setting-menu-inner">
                    <div class="user-profile">
                        <a href="{{ route('user.profile') }}">
                            <img src="{{ $profileImage }}" width="60" height="60"></a>
                        <div>
                            <p> {{ $user->name ?? 'Guest' }} </p>
                            <a href="{{ route('user.profile') }}">See Your Profile

                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="user-profile">
                        <img src="{{ asset('assets/frontend/img') }}/feedback.png">
                        <div>
                            <p> Giv Feed Back </p>
                            <a href="profile.html">Help us</a>
                        </div>
                    </div>
                    <hr>
                    <div class="setting-link">
                        <img src="{{ asset('assets/frontend/img') }}/setting.png" class="setting-icon">
                        <a href="profile.html">Setting & Privacy <img
                                src="{{ asset('assets/frontend/img') }}/arrow.png" width="10px"></a>
                    </div>
                    <div class="setting-link">
                        <img src="{{ asset('assets/frontend/img') }}/help.png" class="setting-icon">
                        <a href="profile.html"> Help & Support <img src="{{ asset('assets/frontend/img') }}/arrow.png"
                                width="10px"></a>
                    </div>
                    <div class="setting-link">
                        <img src="{{ asset('assets/frontend/img') }}/display.png" class="setting-icon">
                        <a href="profile.html"> Display & Accessibility <img
                                src="{{ asset('assets/frontend/img/arrow.png') }}" width="10px"></a>
                    </div>

                    <div class="setting-link">
                        <img src="{{ asset('assets/frontend/img') }}/logout.png" class="setting-icon">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout <img src="{{ asset('assets/frontend/img') }}/arrow.png" width="10px"></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
        </nav>
    </header>
</div>
