<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

    <!-- Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- RIGHT -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->name }}
                </span>

                <i class="fas fa-user-circle fa-2x text-gray-400"></i>

            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>

</nav>