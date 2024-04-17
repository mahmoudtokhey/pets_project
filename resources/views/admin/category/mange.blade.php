@extends('layouts.app')
@section('page_title')
    الاقسام
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
    {{-- +++++++++++++++++++++++++++++ navbar +++++++++++++++++++++++++++++ --}}
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
        <img src="/imgs/pets.jpg" class="img-fluid w-100" alt="pets Image"
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
        {{-- ++++++++++++++++++++++++++++++++ Add_Category Button ++++++++++++++++++++++++++++++++ --}}
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
        {{-- ++++++++++++++++++ create Modal ++++++++++++++++++ --}}
        @include('admin.category.partials.create_modal')

        {{-- ++++++++++++++++++++++++++ Categories Table ++++++++++++++++++++++++++ --}}
        <h2 style="color: #9eb77d" class="mb-3">{{ trans('messages.animal_categories') }}</h2>
        @if( !empty($categories) && $categories->count() > 0 )
            <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
                @foreach ($categories as $category)
                    <div class="card" style="width: 18rem">
                        <a href="{{ route('category.show_animals',$category->id) }}" style="all: unset; cursor: pointer" target="_blank">
                            <img src="{{ asset('assets/admin/uploads/categories/'.$category->image) }}" class="card-img-top fix-img" alt="Birds" />
                        </a>
                        <div class="card-body" style="background-color: #9b6641">
                            <a href="{{ route('category.show_animals',$category->id) }}" style="all: unset; cursor: pointer" target="_blank">
                                <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                    {{ $category->name }}
                                </h5>
                            </a>
                        </div>
                        <div class="btns d-flex justify-content-around align-items-center my-2">
                            {{-- =========== Edit Button =========== --}}
                            {{-- <button class="btn list-card-btn" style="background-color: #9eb77d;">
                                {{ trans('messages.edit') }} <i class="fa-regular fa-pen-to-square text-black"></i>
                            </button> --}}
                            <a  href="#" title="تعديل" class="modal-effect btn btn-sm btn-success"
                                            data-effect="effect-scale"
                                data-bs-target="#edit{{ $category->id }}"
                                data-section_id="{{ $category->id }}"
                                data-section_name="{{ $category->name }}"
                                data-bs-toggle="modal" data-bs-effect="effect-scale"
                            >
                            {{ trans('messages.edit') }}  <i class="las la-pen"></i>
                            </a>
                            {{-- ++++++++++++++++++++++++++++++++++ Edit Modal ++++++++++++++++++++++++++++++++++ --}}
                            @include('admin.category.partials.edit_modal')
                            {{-- =========== Delete Button =========== --}}
                            <a  href="#modalDelete" title="حذف" class="modal-effect btn btn-sm btn-danger"
                                data-category_id="{{ $category->id }}"
                                data-category_name="{{ $category->name }}"
                                data-bs-toggle="modal" data-bs-effect="effect-scale">حذف <i  class="las la-trash"></i>
                            </a>
                            <!-- +++++++++++++++++++++++++++++ Delete Modal  +++++++++++++++++++++++++++++ -->
                            @include('admin.category.partials.delete_modal')
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-8 text-center alert alert-danger">
                لا توجد اقسام
            </div>
        @endif
        </div>
        @if($categories->count() > 0)
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
    <script src="{{ asset('js/Create2-cate.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- +++++++++++++++++ "Delete Category" js +++++++++++++++++ -->
    <script>
        // Appear "Delete Category Data" in the "Delete Modal InputFields"
        $("#modalDelete").on('show.bs.modal', function(event){
            var button      = $(event.relatedTarget);
            // Get "categoryId" from "data-id" "custom attribute"
            var sectionId   = button.data('category_id');
            // Get "categoryName" from "data-category_name" "custom attribute"
            var sectionName = button.data('category_name');
            // Put "Category data" in "Delete Modal InputFields"
            var modal       = $(this);
            // Put "Category id" in "Edit Modal "id InputField"
            modal.find('.modal-body #category_id').val(sectionId);
            // Put "Category name" in "Edit Modal" "category_name InputField"
            modal.find('.modal-body #category_name').val(sectionName);
        });
    </script>
@endpush
