@extends('layouts.app')
@section('page_title')
    لوحة التحكم
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        .card-body {
            padding: 0 !important;
            padding-bottom: 5px !important;
        }

        .fix-img {
            height: 200px;
            object-fit: cover;
        }

        .multi-img2 {
            max-width: 250px;
            /* Set maximum width */
            max-height: 250px;
            /* Set maximum height */
            border-radius: 20px;
        }
    </style>
@endpush

@section('content')
    @include('inc._navbar')

    <div class="container-fluid"
        style="
overflow: hidden;
border-bottom: 10px solid #9b6641;
padding: 0;
position: relative;
">
        <img src="./imgs/pets.jpg" class="img-fluid w-100" alt="pets Image"
            style="max-height: 450px; height: 100%; width: 100%; object-fit: cover" />
        <div class="search-container">
            <div class="search-input" style="max-width: 600px; margin: auto; position: relative">
                <input type="text" class="form-control" placeholder="Enter to search for animals"
                    aria-describedby="inputGroup-sizing-default" />
                <i class="fa-solid fa-magnifying-glass"
                    style="
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
    "></i>
            </div>
            <div class="search-description" style="margin-top: 15px">
                <span style="padding: 10px; background: #fff">
                    Find all the animals you want to know about and shop for one
                </span>
            </div>
        </div>
    </div>

    <div class="container categories">
        <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
            <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
                <a href="./Birds-categorie-admin.html" style="all: unset; cursor: pointer">
                    <img src="./imgs/bird.png" class="card-img-top mt-2" alt="bird"
                        style="width: 100px; margin: auto" />
                </a>
                <div class="card-body">
                    <a href="./Birds-categorie-admin.html" style="all: unset; cursor: pointer">
                        <p class="card-text text-light">{{ trans('messages.birds') }}</p>
                    </a>
                </div>
            </div>
            <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
                <a href="./Cats-categorie-admin.html" style="all: unset; cursor: pointer">
                    <img src="./imgs/cats.png" class="card-img-top mt-2" alt="bird"
                        style="width: 100px; margin: auto" />
                </a>
                <div class="card-body">
                    <a href="./Cats-categorie-admin.html" style="all: unset; cursor: pointer">
                        <p class="card-text text-light">{{ trans('messages.cats') }}</p>
                    </a>
                </div>
            </div>
            <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
                <a href="./Other-Animal-admin.html" style="all: unset; cursor: pointer">
                    <img src="./imgs/animals.png" class="card-img-top mt-2" alt="bird"
                        style="width: 100px; margin: auto" />
                </a>
                <div class="card-body">
                    <a href="./Other-Animal-admin.html" style="all: unset; cursor: pointer">
                        <p class="card-text text-light">{{ trans('messages.other_animals') }}</p>
                    </a>
                </div>
            </div>
            <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
                <a href="./Market-admin.html" style="all: unset; cursor: pointer">
                    <img src="./imgs/marketplace.png" class="card-img-top mt-2" alt="Market"
                        style="width: 100px; margin: auto" />
                </a>
                <div class="card-body">
                    <a href="./Market-admin.html" style="all: unset; cursor: pointer">
                        <p class="card-text text-light">{{ trans('messages.marketplace_and_adopt') }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="animal-container d-flex justify-content-center align-items-center flex-column my-5"
        style="position: relative">
        <button class="create-animal-profile btn text-light"
            style="
  position: absolute;
  left: 50px;
  top: 0;
  background: #a84e10;
  color: white;
  border-radius: 15px;
  font-size: 20px;
  padding: 10px 20px;
"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{ trans('messages.create') }} +
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog my-modal modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                            <div class="container d-flex flex-column gap-4 align-items-center justify-content-center">
                                <h1>{{ trans('messages.create') }}</h1>
                                <p>Choose image</p>
                                {{-- +++++++++++++++++ image inputField +++++++++++++++++ --}}
                                <div class="input-group mb-3">
                                    <input type="file" name="image" class="form-control" id="inputGroupFile01"
                                        onchange="displaySelectedImage(event)" />
                                </div>
                                <div
                                    class="multi-img-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                                </div>
                                {{-- +++++++++++++++++ Name inputField +++++++++++++++++ --}}
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control name-input"
                                        placeholder="Enter Name" aria-label="name" aria-describedby="basic-addon1"
                                        id="nameInput" />
                                </div>


                                <div class="input-group">

                                </div>
                            </div>
                        </div>
                        {{-- +++++++++++++++++ submit button +++++++++++++++++ --}}
                        <div class="modal-footer justify-content-center">
                            <button id="submitBtn" type="submit" class="btn" style="background-color: #a84e10"
                                disabled>Submit Post <i class="fa-solid fa-upload" style="color: #000"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <h2 style="color: #9eb77d" class="mb-3">{{ trans('messages.animal_categories') }}</h2>
        <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
            <div class="card" style="width: 18rem">
                <a href="./Birds-categorie-admin.html
  " style="all: unset; cursor: pointer">
                    <img src="./imgs/Birdcat.jpg" class="card-img-top fix-img" alt="Birds" />
                </a>
                <div class="card-body" style="background-color: #9b6641">
                    <a href="./Birds-categorie-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            {{ trans('messages.birds') }}
                        </h5>
                    </a>
                </div>
                <div class="btns d-flex justify-content-around align-items-center my-2">
                    <button class="btn list-card-btn" style="background-color: #9eb77d;">
                        {{ trans('messages.edit') }} <i class="fa-regular fa-pen-to-square text-black"></i>
                    </button>


                    <button class="btn list-card-btn" style="background-color: #9eb77d;">
                        {{ trans('messages.delete') }} <i class="fa-solid fa-trash"></i>
                    </button>




                </div>
            </div>
            <div class="card" style="width: 18rem">
                <a href="./Cats-categorie-admin.html" "
            style=" all: unset; cursor: pointer">
          <img src="./imgs/catsh.jpg" class="card-img-top fix-img" alt="Cats" />
        </a>
        <div class="card-body" style="background-color: #9b6641">
          <a href="./Cats-categorie-admin.html
  " style="all: unset; cursor: pointer">
            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                {{ trans('messages.cats') }}
            </h5>
          </a>
        </div>
        <div class="btns d-flex justify-content-around align-items-center my-2">
          <button class="btn list-card-btn" style="background-color: #9eb77d;">
            {{ trans('messages.edit') }} <i class="fa-regular fa-pen-to-square text-black"></i>
          </button>

          <button class="btn list-card-btn" style="background-color: #9eb77d;">
            {{ trans('messages.delete') }} <i class="fa-solid fa-trash"></i>
          </button>

        </div>
        </div>
        <div class="card" style="width: 18rem">
        <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
          <img src="./imgs/dogsh.jpg" class="card-img-top fix-img" alt="Dogs"" />
                </a>
                <div class=" card-body" style="background-color: #9b6641">
                    <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            {{ trans('messages.dogs') }}
                        </h5>
                    </a>
                </div>
                <div class="btns d-flex justify-content-around align-items-center my-2">
                    <button class="btn list-card-btn" style="background-color: #9eb77d;">
                        {{ trans('messages.edit') }} <i class="fa-regular fa-pen-to-square text-black"></i>
                    </button>

                    <button class="btn list-card-btn" style="background-color: #9eb77d;">
                        {{ trans('messages.delete') }} <i class="fa-solid fa-trash"></i>
                    </button>

                </div>
            </div>
            <div class="card" style="width: 18rem">
                <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                    <img src="./imgs/Horsesh.jpg" class="card-img-top fix-img" alt="Horses" />
                </a>
                <div class="card-body" style="background-color: #9b6641">
                    <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            {{ trans('messages.horses') }}
                        </h5>
                    </a>
                </div>
                <div class="btns d-flex justify-content-around align-items-center my-2">
                    <button class="btn list-card-btn" style="background-color: #9eb77d;">
                        {{ trans('messages.edit') }} <i class="fa-regular fa-pen-to-square text-black"></i>
                    </button>

                    <button class="btn list-card-btn" style="background-color: #9eb77d;">
                        {{ trans('messages.delete') }} <i class="fa-solid fa-trash"></i>
                    </button>

                </div>
            </div>
            <div class="more-animals">
                <div class="card" style="width: 18rem">
                    <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                        <img src="./imgs/Rabbitsh.jpg" class="card-img-top fix-img" alt="Rabbits" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                {{ trans('messages.rabbits') }}
                            </h5>
                        </a>
                    </div>
                    <div class="btns d-flex justify-content-around align-items-center my-2">
                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Edit <i class="fa-regular fa-pen-to-square text-black"></i>
                        </button>

                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Delete <i class="fa-solid fa-trash"></i>
                        </button>

                    </div>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                        <img src="./imgs/Fishesh.jpg" class="card-img-top fix-img" alt="Fishes" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                Fishes
                            </h5>
                        </a>
                    </div>
                    <div class="btns d-flex justify-content-around align-items-center my-2">
                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Edit <i class="fa-regular fa-pen-to-square text-black"></i>
                        </button>

                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Delete <i class="fa-solid fa-trash"></i>
                        </button>

                    </div>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                        <img src="./imgs/turtleh.jpg" class="card-img-top fix-img" alt="turtles" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                Turtles
                            </h5>
                        </a>
                    </div>
                    <div class="btns d-flex justify-content-around align-items-center my-2">
                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Edit <i class="fa-regular fa-pen-to-square text-black"></i>
                        </button>

                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Delete <i class="fa-solid fa-trash"></i>
                        </button>

                    </div>
                </div>
                <div class="card" style="width: 18rem">
                    <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                        <img src="./imgs/squirrelh.jpg" class="card-img-top fix-img" alt="squirrels" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="./Other-Animal-admin.html
  " style="all: unset; cursor: pointer">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                Squirrels
                            </h5>
                        </a>
                    </div>
                    <div class="btns d-flex justify-content-around align-items-center my-2">
                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Edit <i class="fa-regular fa-pen-to-square text-black"></i>
                        </button>

                        <button class="btn list-card-btn" style="background-color: #9eb77d;">
                            Delete <i class="fa-solid fa-trash"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <button class="show-more btn text-light mt-5" style="background-color: #9b6641">
            show more
        </button>
    </div>

    @include('inc._footer')
@endsection

@push('js')
    <script src="{{ asset('js/showMore.js') }}"></script>
    <script src="{{ asset('js/Create2-cate.js') }}"></script>
@endpush
