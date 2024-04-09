@extends('layouts.app')
@section('page_title')
    المتجر
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    {{-- +++++++++++++++++++++++++++++ alerts +++++++++++++++++++++++++++++ --}}
    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.error')
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
                    <img src="{{ asset('/imgs/bird.png') }}" class="card-img-top mt-2" alt="bird"
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
                    <img src="{{ asset('/imgs/cats.png') }}" class="card-img-top mt-2" alt="bird"
                        style="width: 100px; margin: auto" />
                </a>
                <div class="card-body">
                    <a href="./Cats-categorie-admin.html" style="all: unset; cursor: pointer">
                        <p class="card-text text-light">Cats</p>
                    </a>
                </div>
            </div>
            <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
                <a href="{{ route('animals.index') }}" style="all: unset; cursor: pointer">
                    <img src="./imgs/animals.png" class="card-img-top mt-2" alt="bird"
                        style="width: 100px; margin: auto" />
                </a>
                <div class="card-body">
                    <a href="{{ route('animals.index') }}" style="all: unset; cursor: pointer">
                        <p class="card-text text-light">Other animals</p>
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
                        <p class="card-text text-light">Marketplace & Adopt</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="animal-container d-flex justify-content-center align-items-center flex-column my-5"
        style="position: relative">
        {{-- ++++++++++++++++ create "animal" button ++++++++++++++++ --}}
        <button class="create-animal-profile btn text-light"
            style="position: absolute;left: 50px;top: 0;background: #a84e10;color: white;border-radius: 15px;font-size: 20px;padding: 10px 20px;"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create Your List +
        </button>
        {{-- ++++++++++++++++ create "animal" Model ++++++++++++++++ --}}
        @include('admin.marketplace.partials.create_modal')

        {{-- //////////////////////////////// tabs content //////////////////////////////// --}}
        <div class="animal-container d-flex justify-content-center align-items-center flex-column my- style="position:
            relativ>
            <h2 style="color: #9eb77d; font-size: 40px" class="mb-3">
                Select Listings you want to
            </h2>
            <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
                {{-- ++++++++++++++++++++++ Animal Card ++++++++++++++++++++++ --}}
                <div class="card" style="width: 18rem">
                    <a href="{{ route('marketplace.show', 'Animal') }}" style="all: unset; cursor: pointer" target="_blank">
                        <img src="./imgs/animalmark.jpg" class="card-img-top fix-img" alt="animalmark" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="{{ route('marketplace.show', 'Animal') }}" style="all: unset; cursor: pointer" target="_blank">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                Animal
                            </h5>
                        </a>
                    </div>
                </div>
                {{-- ++++++++++++++++++++++ Animal Item Card ++++++++++++++++++++++ --}}
                <div class="card" style="width: 18rem">
                    <a href="{{ route('marketplace.show', 'Animal Items') }}" style="all: unset; cursor: pointer"  target="_blank">
                        <img src="./imgs/animitemark.png" class="card-img-top fix-img" alt="animitemark" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="{{ route('marketplace.show', 'Animal Items') }}" style="all: unset; cursor: pointer" target="_blank">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                Animal Item
                            </h5>
                        </a>
                    </div>
                </div>
                {{-- ++++++++++++++++++++++ Animal Adoption Card ++++++++++++++++++++++ --}}
                <div class="card" style="width: 18rem">
                    <a href="{{ route('marketplace.show', 'Animal Adoption') }}" style="all: unset; cursor: pointer" target="_blank">
                        <img src="./imgs/animadomark.jpg" class="card-img-top fix-img" alt="animadomark" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="{{ route('marketplace.show', 'Animal Adoption') }}" style="all: unset; cursor: pointer" target="_blank">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                Animal Adoption
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- ++++++++++++++++++++ dog +++++++++++++++++++ --}}
    <div class="tab-content tab-content-custom" id="dog" style="font-size: 20px">
        <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/Market/C20.PNG" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Husky
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: 82 SR</p>
                            <p>City: JEDDAH</p>
                        </div>
                        <p>Phone: 0583715231</p>
                        <button class="btn list-card-btn">
                            Delete <span><i class="fa-solid fa-trash"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- ++++++++++++++++++++ bird +++++++++++++++++++ --}}
    <div class="tab-content tab-content-custom" id="bird" style="font-size: 20px">
        <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/Market/C30.PNG" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        LoveBird
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: 25 SR</p>
                            <p>City: Makkah</p>
                        </div>
                        <p>Phone: 0584482790</p>
                        <button class="btn list-card-btn">
                            Delete <span><i class="fa-solid fa-trash"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- ++++++++++++++++++++ other +++++++++++++++++++ --}}
    <div class="tab-content tab-content-custom" id="other" style="font-size: 20px">
        <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/Market/C40.PNG" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Turtle
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: 20 SR</p>
                            <p>City: AlRyadih</p>
                        </div>
                        <p>Phone: 058182361</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                        <button class="btn list-card-btn">
                            Delete <span><i class="fa-solid fa-trash"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- ================= Card ================= --}}
            <div class="card list-card m-2" style="width: 18rem">
                <img src="./imgs/.jpg" class="card-img-top list-card-img fix-img" alt="..." />
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title list-card-title w-100 text-center">
                        Card title
                    </h5>
                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                        <div class="d-flex justify-content-around gap-3">
                            <p>Price: xx SR</p>
                            <p>City: xxxxx</p>
                        </div>
                        <p>Phone: 0xxxxx</p>
                    </div>
                    <button class="btn list-card-btn">
                        Delete <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('inc._footer')
@endsection

@push('js')
    <script src="{{ asset('js/showMore.js') }}"></script>
    <script src="{{ asset('js/Create1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="./js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- +++++++++++++++++ "Delete Category" js +++++++++++++++++ -->
    <script>
        // Appear "Delete Category Data" in the "Delete Modal InputFields"
        $("#modalDelete").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            // Get "categoryId" from "data-id" "custom attribute"
            var sectionId = button.data('category_id');
            // Get "categoryName" from "data-category_name" "custom attribute"
            var sectionName = button.data('category_name');
            // Put "Category data" in "Delete Modal InputFields"
            var modal = $(this);
            // Put "Category id" in "Edit Modal "id InputField"
            modal.find('.modal-body #category_id').val(sectionId);
            // Put "Category name" in "Edit Modal" "category_name InputField"
            modal.find('.modal-body #category_name').val(sectionName);
        });
    </script>
@endpush
