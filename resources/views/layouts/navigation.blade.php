<nav class="navbar navbar-light navbar-expand-md bg-light justify-content-between container-fluid">
    <a class="navbar-brand" href="{{route('dashboard')}}">Laravel9 Vue3 Blog App</a>
    <button class="navbar-toggler ml-1" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="mainNav">
        <ul class="navbar-nav mx-auto text-md-center text-left">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'blog.create' }" class="nav-link">Create Article</a>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'companies.index' }" class="nav-link">Companies</a>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'companies.create'}" class="nav-link">Create Companies</a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-bell"></i></a> </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" id="navDropdown">
                    <i class="fas fa-user-alt"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navDropdown">
                    <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                    <li><a class="dropdown-item" href="#">{{ Auth::user()->email }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<vue-progress-bar></vue-progress-bar>
