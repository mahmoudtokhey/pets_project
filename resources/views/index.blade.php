@extends('layouts.app')

@section('page_title')
Home Page
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/style.css')}}" />
@endpush

@section('content')

    @include('inc._navbar')
    {{-- +++++++++++++++++++++++++++++ alerts +++++++++++++++++++++++++++++ --}}
    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.error')

    <div class="container-fluid" style=" overflow: hidden; border-bottom: 10px solid #9b6641; padding: 0; position: relative;">
        <img src="./imgs/pets.jpg" class="img-fluid w-100" alt="pets" style="max-height: 450px; height: 100%; width: 100%; object-fit: cover" />
        {{-- +++++++++++++++ Animal Search +++++++++++++++ --}}
        <div class="search-container">
            {{-- ======== Search inputField ======== --}}
            <div class="search-input" style="max-width: 600px; margin: auto; position: relative">
                {{-- Search Token --}}
                <input type="hidden" id="token_search" value="{{csrf_token() }}">
                {{-- Seach URL --}}
                <input type="hidden" id="ajax_search_url" value="{{ route('admin.uoms.ajax_search') }}">
                <input type="text" class="form-control" placeholder="Enter to search for animals" id="search_by_text" />
            </div>
            <div class="search-description" style="margin-top: 15px">
                <span style="padding: 10px; background: #fff">
                Find information about all the animals you want to know about and
                shop for one
                </span>
            </div>
        </div>
  </div>
  {{-- +++++++++++++++++++++++++++++++++ Categories +++++++++++++++++++++++++++++++++ --}}
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
  {{-- +++++++++++++++++++++++++++++++++ Animal Information +++++++++++++++++++++++++++++++++ --}}
  <div class="animal-container d-flex justify-content-center align-items-center flex-column my-5" style="position: relative">
    <h2 style="color: #9eb77d; font-size: 40px" class="mb-3">Animal Information</h2>
    @php
        $animals = App\Models\Animal::all();
    @endphp
    <div class="row">
        <div class="cards-container d-flex flex-wrap justify-content-center gap-5" id="ajax_responce_serarchDiv">
            @foreach ($animals as $animal)
                <div class="card col-3">
                    <a href="{{ route('animals.show',$animal->id) }}" style="all: unset; cursor: pointer" target="_blank">
                        <img src="{{ asset('assets/admin/uploads/animals/'.$animal->image) }}" class="card-img-top fix-img" style="width: 100%;height:200px;" alt="animal image" />
                    </a>
                    <div class="card-body" style="background-color: #9b6641">
                        <a href="{{ route('animals.show',$animal->id) }}" style="all: unset; cursor: pointer" target="_blank">
                            <h5 class="card-title text-center mt-3 text-light" style="font-style: italic">
                                {{ $animal->name }}
                            </h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="my-2 text-center">
    <button class="show-more btn text-light mt-5" style="background-color: #9b6641">
        show more
    </button>
</div>
  @include('inc._footer')
@endsection
@push('js')
    <script src="{{ asset('js/ajax_search.js') }}"></script>
@endpush
