<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="./index.html"><img src="./imgs/logo.png" alt="logo" style="height: 70px" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              All About Pets
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="./index.html">Home Page</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="./Birds-categorie.html">Birds</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="./Cats-categorie.html">Cats</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="./Other-Animal.html">Other Animal</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="./market.html">Marketplace & Adopt</a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="d-flex align-items-center justify-content-center">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item" role="button">English</li>
            <li class="breadcrumb-item" role="button">العربية</li>
          </ol>
          <div class="mx-3 vr"></div>
          <a href="{{route('login')}}" class="m-0">
            <img src="./imgs/profile.png" alt="profile" style="height: 30px" />
          </a>
          @guest
          <p class="mx-1 my-0"></p>
          <a href="{{route('register')}}" style="color: black" class="m-0">Sign Up</a>
          <p class="mx-2 my-0">|</p>
          <a href="{{route('login')}}" style="color: black" class="m-0">LOGIN</a>
          @endguest
          @auth
          <p class="mx-1 my-0"></p>
          <a href="{{ route('profile.edit') }}" style="color: black" class="m-0">{{auth()->user()->name}}</a>
          @endauth
        </div>
      </div>
    </div>
</nav>