@extends('layouts.app')

@section('page_title')
Home Page
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/style.css')}}" />
@endpush

@section('content')

    @include('inc._navbar')
  <div class="container-fluid" style="
        overflow: hidden;
        border-bottom: 10px solid #9b6641;
        padding: 0;
        position: relative;
      ">
    <img src="./imgs/pets.jpg" class="img-fluid w-100" alt="pets"
      style="max-height: 450px; height: 100%; width: 100%; object-fit: cover" />
    <div class="search-container">
      <div class="search-input" style="max-width: 600px; margin: auto; position: relative">
        <input type="text" class="form-control" placeholder="Enter to search for animals"
          aria-describedby="inputGroup-sizing-default" />
        <i class="fa-solid fa-magnifying-glass" style="
              position: absolute;
              right: 20px;
              top: 50%;
              transform: translateY(-50%);
            "></i>
      </div>
      <div class="search-description" style="margin-top: 15px">
        <span style="padding: 10px; background: #fff">
          Find information about all the animals you want to know about and
          shop for one
        </span>
      </div>
    </div>
  </div>

  <div class="container categories">
    <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
      <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
        <a href="./Birds-categorie.html" style="all: unset; cursor: pointer">
          <img src="./imgs/bird.png" class="card-img-top mt-2" alt="bird" style="width: 100px; margin: auto" />
        </a>
        <div class="card-body">
          <a href="./Birds-categorie.html" style="all: unset; cursor: pointer">
            <p class="card-text text-light">Birds</p>
          </a>
        </div>
      </div>
      <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
        <a href="./Cats-categorie.html" style="all: unset; cursor: pointer">
          <img src="./imgs/cats.png" class="card-img-top mt-2" alt="bird" style="width: 100px; margin: auto" />
        </a>
        <div class="card-body">
          <a href="./Cats-categorie.html" style="all: unset; cursor: pointer">
            <p class="card-text text-light">Cats</p>
          </a>
        </div>
      </div>
      <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
        <a href="./Other-Animal.html" style="all: unset; cursor: pointer">
          <img src="./imgs/animals.png" class="card-img-top mt-2" alt="bird" style="width: 100px; margin: auto" />
        </a>
        <div class="card-body">
          <a href="./Other-Animal.html" style="all: unset; cursor: pointer">
            <p class="card-text text-light">Other animals</p>
          </a>
        </div>
      </div>
      <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
        <a href="./Market.html" style="all: unset; cursor: pointer">
          <img src="./imgs/marketplace.png" class="card-img-top mt-2" alt="Market" style="width: 100px; margin: auto" />
        </a>
        <div class="card-body">
          <a href="./Market.html" style="all: unset; cursor: pointer">
            <p class="card-text text-light">Marketplace & Adopt</p>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="animal-container d-flex justify-content-center align-items-center flex-column my-5"
    style="position: relative">
    <h2 style="color: #9eb77d; font-size: 40px" class="mb-3">
      Animal Information
    </h2>
    <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
      <div class="card" style="width: 18rem">
        <a href="./Husky.html
          " style="all: unset; cursor: pointer">
          <img src="./imgs/husky.jpg" class="card-img-top fix-img" alt="husky" />
        </a>
        <div class="card-body" style="background-color: #9b6641">
          <a href="./Husky.html
          " style="all: unset; cursor: pointer">
            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
              Husky
            </h5>
          </a>
        </div>
        <div></div>
      </div>
      <div class="card" style="width: 18rem">
        <a href="./Yellow-naped.html" style="all: unset; cursor: pointer">
          <img src="./imgs/yellow-naped.jpg" class="card-img-top fix-img" alt="yellow-naped" />
        </a>
        <div class="card-body" style="background-color: #9b6641">
          <a href="./Yellow-naped.html
          " style="all: unset; cursor: pointer">
            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
              Yellow Naped
            </h5>
          </a>
        </div>
        <div></div>
      </div>
      <div class="card" style="width: 18rem">
        <a href="./Sphynx.html
          " style="all: unset; cursor: pointer">
          <img src="./imgs/sphynx.jpg" class="card-img-top fix-img" alt="sphynx" />
        </a>
        <div class="card-body" style="background-color: #9b6641">
          <a href="./Sphynx.html
          " style="all: unset; cursor: pointer">
            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
              Sphynx
            </h5>
          </a>
        </div>
        <div></div>
      </div>
      <div class="card" style="width: 18rem">
        <a href="./gold-fish.html
          " style="all: unset; cursor: pointer">
          <img src="./imgs/gold-fish.jpg" class="card-img-top fix-img" alt="gold-fish" />
        </a>
        <div class="card-body" style="background-color: #9b6641">
          <a href="./gold-fish.html
          " style="all: unset; cursor: pointer">
            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
              Common goldfish
            </h5>
          </a>
        </div>
        <div></div>
      </div>
      <div class="more-animals">
        <div class="card" style="width: 18rem">
          <a href="./index.html
          " style="all: unset; cursor: pointer">
            <img src="./imgs/Oystercatcher.jpg" class="card-img-top fix-img" alt="Oystercatcher" />
          </a>
          <div class="card-body" style="background-color: #9b6641">
            <a href="./index.html
          " style="all: unset; cursor: pointer">
              <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                Oystercatcher
              </h5>
            </a>
          </div>
          <div></div>
        </div>
        <div class="card" style="width: 18rem">
          <a href="./index.html
          " style="all: unset; cursor: pointer">
            <img src="./imgs/HorseArabian.jpg" class="card-img-top fix-img" alt="Arabian horse" />
          </a>
          <div class="card-body" style="background-color: #9b6641">
            <a href="./index.html
          " style="all: unset; cursor: pointer">
              <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                Arabian Horse
              </h5>
            </a>
          </div>
          <div></div>
        </div>
        <div class="card" style="width: 18rem">
          <a href="./index.html
          " style="all: unset; cursor: pointer">
            <img src="./imgs/Mandrill.jpg" class="card-img-top fix-img" alt="Mandrill" />
          </a>
          <div class="card-body" style="background-color: #9b6641">
            <a href="./index.html
          " style="all: unset; cursor: pointer">
              <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                Mandrill
              </h5>
            </a>
          </div>
          <div></div>
        </div>
        <div class="card" style="width: 18rem">
          <a href="./index.html
          " style="all: unset; cursor: pointer">
            <img src="./imgs/Dalmatian.jpg" class="card-img-top fix-img" alt="Dalmatian" />
          </a>
          <div class="card-body" style="background-color: #9b6641">
            <a href="./index.html
          " style="all: unset; cursor: pointer">
              <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                Dalmatian
              </h5>
            </a>
          </div>
          <div></div>
        </div>
      </div>
    </div>
    <button class="show-more btn text-light mt-5" style="background-color: #9b6641">
      show more
    </button>
  </div>
  @include('inc._footer')
@endsection
