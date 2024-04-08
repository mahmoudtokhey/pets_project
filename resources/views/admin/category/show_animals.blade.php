@extends('layouts.app')
@section('page_title')
    عرض حيوانات القسم
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
    <div class="animal-container d-flex justify-content-center align-items-center flex-column my-5"
        style="position: relative">
        {{-- ++++++++++++++++++++++++++ category_animals Table ++++++++++++++++++++++++++ --}}
        <h2 style="color: #9eb77d" class="mb-3">{{ trans('messages.category_animals') }} : {{ $category_name->name }}</h2>
         @if( !empty($category_animals) && $category_animals->count() > 0 )
             <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
                 @foreach ($category_animals as $category_animal)
                     <div class="card" style="width: 18rem">
                         <a href="{{ route('category.show_animals',$category_animal->id) }}" style="all: unset; cursor: pointer">
                             <img src="{{ asset('assets/admin/uploads/animals/'.$category_animal->image) }}" class="card-img-top fix-img" alt="Birds" />
                         </a>
                         <div class="card-body" style="background-color: #9b6641">
                             <a href="./Birds-categorie-admin.html" style="all: unset; cursor: pointer">
                                 <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                     {{ $category_animal->name }}
                                 </h5>
                             </a>
                         </div>
                     </div>
                 @endforeach
             </div>
         @else
             <div class="col-8 text-center alert alert-danger">
                لا توجد حيوانات للقسم
             </div>
         @endif
         </div>
         @if($category_animals->count() > 0)
             <div class="col-12 m-auto text-center mb-3">
                 <button class="show-more btn text-light mt-5" style="background-color: #9b6641">
                     show more
                 </button>
             </div>
         @endif
     </div>

     @include('inc._footer')
 @endsection
    </div>
