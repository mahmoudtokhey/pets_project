@extends('layouts.app')
@section('page_title')
   الحيوانات
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
  integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
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
            Create Animal Profile +
        </button>
        {{-- ++++++++++++++++ create "animal" Model ++++++++++++++++ --}}
        @include('admin.animals.partials.create_modal')

        {{-- ++++++++++++++++++++++++++ Animals Table ++++++++++++++++++++++++++ --}}
        <h2 style="color: #9eb77d" class="mb-3">{{ trans('messages.animal_information') }}</h2>
            @if( !empty($animals) && $animals->count() > 0 )
                <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
                    @foreach ($animals as $animal)
                    <div class="card" style="width: 18rem">
                        <a href="{{ route('animals.show',$animal->id) }}" style="all: unset; cursor: pointer">
                            <img src="{{ asset('assets/admin/uploads/animals/'.$animal->image) }}" class="card-img-top fix-img" alt="Birds" />
                        </a>
                        <div class="card-body" style="background-color: #9b6641">
                            <a href="{{ route('animals.show',$animal->id) }}" style="all: unset; cursor: pointer">
                                <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                    {{ $animal->name }}
                                </h5>
                            </a>
                        </div>
                        {{-- //////////// Edit , Delete Button //////////// --}}
                        <div class="btns d-flex justify-content-around align-items-center my-2">
                            {{-- =========== Edit Button =========== --}}
                            <a  href="{{ route('animals.show',$animal->id) }}" title="تعديل" class="btn btn-sm btn-success">
                                {{ trans('messages.edit') }}  <i class="las la-pen"></i>
                            </a>
                            {{-- =========== Edit Modal =========== --}}
                            {{-- @include('admin.animals.partials.edit_modal') --}}
                            {{-- =========== Delete Button =========== --}}
                            <a  href="#modalDelete" title="حذف" class="modal-effect btn btn-sm btn-danger"
                                data-animal_id="{{ $animal->id }}"
                                data-animal_name="{{ $animal->name }}"
                                data-bs-toggle="modal" data-bs-effect="effect-scale">حذف <i  class="las la-trash"></i>
                            </a>
                            <!-- +++++++++++++++++++++++++++++ Delete Modal  +++++++++++++++++++++++++++++ -->
                            @include('admin.animals.partials.delete_modal')
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="col-8 text-center alert alert-danger">
                    لا توجد حيوانات
                </div>
            @endif
            {{-- ++++++++++++++++++++++++ show more button ++++++++++++++++++++++++ --}}
            @if($animals->count() > 0)
                <div class="col-12 m-auto text-center mb-3">
                    <button class="show-more btn text-light mt-5" style="background-color: #9b6641">
                        show more
                    </button>
                </div>
            @endif
        </div>
    @include('inc._footer')
@endsection

@push('js')
    <script src="{{ asset('js/showMore.js') }}"></script>
    <script src="{{ asset('js/Create1.js') }}"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="./js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- +++++++++++++++++ "Delete Category" js +++++++++++++++++ -->
    <script>
        // Appear "Delete animal Data" in the "Delete Modal InputFields"
        $("#modalDelete").on('show.bs.modal', function(event){
            var button      = $(event.relatedTarget);
            // Get "animalId" from "data-id" "custom attribute"
            var sectionId   = button.data('animal_id');
            // Get "animalName" from "data-category_name" "custom attribute"
            var sectionName = button.data('animal_name');
            // Put "animal data" in "Delete Modal InputFields"
            var modal       = $(this);
            // Put "animal id" in "Edit Modal "id InputField"
            modal.find('.modal-body #animal_id').val(sectionId);
            // Put "animal name" in "Edit Modal" "category_name InputField"
            modal.find('.modal-body #animal_name').val(sectionName);
        });
    </script>
@endpush
