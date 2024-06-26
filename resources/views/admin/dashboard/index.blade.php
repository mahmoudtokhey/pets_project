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

    {{-- +++++++++++++++++++++++++++++ _header +++++++++++++++++++++++++++++ --}}
    @include('admin.inc._header')

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
            Create Animal Profile +
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog my-modal" style="max-width: 50%; width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container d-flex flex-column gap-4 align-items-center justify-content-center">
                            <h1>Create Animal Profile</h1>
                            <p>Choose image Profile </p>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile01"
                                    onchange="displaySelectedImage(event)" />
                            </div>
                            <div
                                class="multi-img1-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control name-input" placeholder="Enter Name"
                                    aria-label="name" aria-describedby="basic-addon1" id="nameInput" />
                            </div>

                            <div class="input-group mb-3">
                                <select class="form-select" aria-label="Default select example"
                                    style="width: 300px; margin: 0 auto; display: block;" id="categorySelect">
                                    <option selected>Select the category</option>
                                    <option value="1">Birds</option>
                                    <option value="2">Cats</option>
                                    <option value="3">Dogs</option>
                                    <option value="4">Horses</option>
                                </select>

                            </div>
                            <div class="input-group mb-3">

                                <textarea class="form-control" placeholder="Write about the animal you want to introduce" id="AboutTextarea"
                                    style="width: 300px; height: 150px;"></textarea>

                            </div>

                            <div class="input-group mb-3">

                                <textarea class="form-control" placeholder="Write the characteristics of the animal " id="characteristicsTextarea"
                                    style="width: 300px; height: 150px;"></textarea>

                            </div>

                            <div class="input-group mb-3">

                                <textarea class="form-control" placeholder="Write the animal's Dietary Preference" id="DietaryTextarea"
                                    style="width: 300px; height: 150px;"></textarea>

                            </div>


                            <div class="input-group mb-3">

                                <textarea class="form-control" placeholder="Write the care requirements for the animal" id="careTextarea"
                                    style="width: 300px; height: 150px;"></textarea>

                            </div>

                            <div class="input-group mb-3">

                                <textarea class="form-control" placeholder="Write Animal health recommendations" id="healthTextarea"
                                    style="width: 300px; height: 150px;"></textarea>

                            </div>


                            <p>Choose pictures of the animal </p>

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02"
                                    onchange="displaySelectedImage(event)" />
                            </div>
                            <div
                                class="multi-img2-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">

                            </div>


                            <p>Choose geographic distribution images </p>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile03"
                                    onchange="displaySelectedImage(event)" />
                            </div>
                            <div
                                class="multi-img3-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">




                                <div class="input-group">






                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button id="submitBtn" type="button" class="btn" style="background-color: #a84e10" disabled>
                            Submit Post <i class="fa-solid fa-upload" style="color: #000"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>


        <h2 style="color: #9eb77d" class="mb-3">Animal Information</h2>
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
                <a href="./Yellow-naped-admin.html" "
        style=" all: unset; cursor: pointer">
      <img src="./imgs/yellow-naped.jpg" class="card-img-top fix-img" alt="yellow-naped" />
    </a>
    <div class="card-body" style="background-color: #9b6641">
      <a href="./Yellow-naped-admin.html" " style=" all: unset; cursor: pointer">
                    <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                        Yellow naped
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
            <div class="btns d-flex justify-content-around align-items-center my-2">
                <button class="btn list-card-btn" style="background-color: #9eb77d;">
                    Edit <i class="fa-regular fa-pen-to-square text-black"></i>
                </button>

                <button class="btn list-card-btn" style="background-color: #9eb77d;">
                    Delete <i class="fa-solid fa-trash"></i>
                </button>

            </div>
        </div>
        <div class="more-animals">
            <div class="card" style="width: 18rem">
                <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                    <img src="./imgs/Oystercatcher.jpg" class="card-img-top fix-img" alt="Oystercatcher" />
                </a>
                <div class="card-body" style="background-color: #9b6641">
                    <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            Oystercatcher
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
                <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                    <img src="./imgs/HorseArabian.jpg" class="card-img-top fix-img" alt="Arabian horse" />
                </a>
                <div class="card-body" style="background-color: #9b6641">
                    <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            Arabian Horse
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
                <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                    <img src="./imgs/Mandrill.jpg" class="card-img-top fix-img" alt="Mandrill" />
                </a>
                <div class="card-body" style="background-color: #9b6641">
                    <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            Mandrill
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
                <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                    <img src="./imgs/Dalmatian.jpg" class="card-img-top fix-img" alt="Dalmatian" />
                </a>
                <div class="card-body" style="background-color: #9b6641">
                    <a href="./index-admin.html
  " style="all: unset; cursor: pointer">
                        <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                            Dalmatian
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
    <script src="{{ asset('js/Create1.js') }}"></script>
@endpush
