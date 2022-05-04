<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href={{ asset ('adminpanel/index.html')}}>
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                    <span class="badge badge-primary">NEW</span>
                </a>
            </li>
            <li class="nav-title">Extras</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Pages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href={{ asset ('adminpanel/login.html')}} target="_top">
                            <i class="nav-icon icon-star"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ asset ('adminpanel/register.html')}} target="_top">
                            <i class="nav-icon icon-star"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ asset ('adminpanel/404.html')}} target="_top">
                            <i class="nav-icon icon-star"></i> Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ asset ('adminpanel/500.html')}} target="_top">
                            <i class="nav-icon icon-star"></i> Error 500</a>
                    </li>
                </ul>
            </li>
            {{--            DOGS--}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Dogs</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route ('dogs')}} target="_top">
                            <i class="nav-icon icon-star"></i> All Dogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route ('dogs.create')}} target="_top">
                            <i class="nav-icon icon-star"></i> Create new god</a>
                    </li>
                </ul>
            </li>
            {{--            USERS--}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Users</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('users.index')}} target="_top">
                            <i class="nav-icon icon-star"></i>All Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('users.create')}} target="_top">
                            <i class="nav-icon icon-star"></i> Create new user</a>
                    </li>
                </ul>
            </li>

            {{--            Reviews--}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Reviews</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route ('reviews.index')}} target="_top">
                            <i class="nav-icon icon-star"></i> All Reviews</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
