<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="./index.html">
            <img src="/imgs/logo.png" alt="logo" style="height: 70px" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ trans('messages.all_about_pets') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="./index.html">
                                {{ __('messages.home_page') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="./Birds-categorie.html">
                                {{ __('messages.birds') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="./Cats-categorie.html">
                                {{ __('messages.cats') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="./Other-Animal.html">
                                {{ __('messages.other_animals') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="./market.html">
                                {{ __('messages.marketplace_and_adopt') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex align-items-center justify-content-center">
                {{-- +++++++++++++++++++++ Language Selector +++++++++++++++++++ --}}
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item" role="button">
                        <a href="{{ route('frontend_change_locale', 'en') }}">
                            <img src="{{ URL::asset('imgs/flags/US.png') }}" alt="">English
                        </a>
                    </li>
                    <li class="breadcrumb-item" role="button">
                        <a href="{{ route('frontend_change_locale', 'ar') }}">
                            <img src="{{ URL::asset('imgs/flags/EG.png') }}" alt="">العربية
                        </a>
                    </li>
                </ol>
                {{-- +++++++++++++++++++++ login / Register +++++++++++++++++++++ --}}
                <div class="mx-3 vr"></div>
                <a href="{{ route('login') }}" class="m-0">
                    @php
                        $user_img = App\Models\User::select('image')->where('id',Auth::user()->id)->first();
                    @endphp
                    @if ($user_img->image != null)
                        <img src="{{ asset('assets/users/uploads/profile/'.$user_img->image) }}" class="rounded-circle" alt="profile" style="width:40px;height: 40px" />
                    @else
                        {{-- <img src="/imgs/profile.png" alt="profile" style="height: 30px" /> --}}
                        <img src="{{ asset('assets/users/uploads/user2.jpg') }}" alt="profile" style="width:30px;height:30px;border-radius:50%;" />
                    @endif
                </a>
                @guest
                    <p class="mx-1 my-0"></p>
                    <a href="{{ route('register') }}" style="color: black" class="m-0">Sign Up</a>
                    <p class="mx-2 my-0">|</p>
                    <a href="{{ route('login') }}" style="color: black" class="m-0">LOGIN</a>
                @endguest
                @auth
                    <p class="mx-1 my-0"></p>
                    <a href="" style="color: black"
                        class="m-0">
                    </a>
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit',auth()->user()->id) }}">
                                        <i class="fa fa-user"></i>
                                        {{ __('messages.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                {{-- ++++++++++++ Logout ++++++++++++  --}}
                                <li>
                                    <a  class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>
                                        {{ __('messages.logout') }}
                                      </a>
                                      <form id="logout-form" action="{{ route('profile.logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                </li>

                            </ul>
                        </li>
                    </ul>
                @endauth

            </div>
        </div>
    </div>
</nav>
