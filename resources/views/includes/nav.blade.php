<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="">
        <img src="" width="50" height="50" class="d-inline-block align-top"  alt="">
        multiBOUTIQUE
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}"> Accueil </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>
                @if(auth('vendeur')->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                </li>
             @endif
        </ul>

       </li>
       <ul class="navbar-nav ms-auto">
        @if(auth('vendeur')->check())
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-person-fill"></i> ProfileVendeur</a>
            </li>
            <li class="nav-item">
                <form id="logout-form-vendeur" action="{{ route('vendeurs.logout') }}" method="POST" style="display: none;">
                    @csrf
                    <button class="nav-link" type="submit">Logout</button>
                </form>
                <a class="nav-link" href="{{ route('vendeurs.logout') }}">
                    Logout
                </a>
            </li>
        @elseif(auth('client')->check())
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-person-fill"></i> Profile</a>
            </li>
            <form id="logout-form-client" action="{{ route('clients.logout') }}" method="POST" style="display: none;">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <a class="nav-link" href="{{ route('clients.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form-client').submit();">
                Logout
            </a>
            
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vendeurs.loginForm') }}">Vendeur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.loginForm') }}">Client</a>
            </li>
        @endif
    </ul>
    
    </div>
</nav>