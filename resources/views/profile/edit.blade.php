@extends('layouts.app')

@section('page_title')
    {{ trans('messages.profile') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
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
        <img src="{{ asset('imgs/profile-banner.jpg') }}" class="img-fluid w-100" alt="pets"
            style="max-height: 350px; height: 100%; width: 100%; object-fit: cover" />
        <div class="search-container">
            <div class="search-input" style="max-width: 500px; margin: auto; position: relative"></div>
        </div>
    </div>

    <div class="categories pofile-container">
        <div class="cards-container position-relative d-flex flex-wrap gap-5 justify-content-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                @php
                    $user = App\Models\User::findOrFail(auth()->user()->id);
                    $user_animals = App\Models\Marketplace::where('added_by',Auth::user()->id)->get();
                    $user_created_at = App\Models\User::select('created_at')->where('id',Auth::user()->id)->first();
                    $user_img = App\Models\User::select('image')->where('id',Auth::user()->id)->first();
                @endphp
                @if ($user_img->image != null)
                    {{-- ============= User Profile image ============= --}}
                    <!-- Display user profile image -->
                    <div class="card rounded-circle" style="background-color: #9b6641">
                        <div class="position-relative" style="text-align: center;">
                            <img src="{{ asset('assets/users/uploads/profile/'.$user_img->image) }}" class="card-img-top profile-img rounded-circle" alt="User Profile Picture" style="width: 150px;height:150px;" />
                        </div>
                    </div>
                    <div class="tab-content active" id="tab-Geographical" style="font-size: 20px">
                        <div class="content">
                            <!-- Update button -->
                            <button type="button" class="profile-img-icon"  onclick="showEditForm(this)" style="background:none; outline: none; border:none; margin: 0px !important;position: absolute;left: 115px;">
                                <span>
                                    <i class="fa-regular fa-pen-to-square" style="color:#9eb77d;"></i>
                                </span>
                            </button>
                        </div>
                        <div class="edit-form" style="display: none;">
                            <!-- Edit form for updating user profile image -->
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="file" name="image" />
                                <div class="mt-5">
                                    {{-- //////// Update Button  //////// --}}
                                    <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                                        Update <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                                    </button>
                                    {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                                    <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                                        Cancel <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <img src="{{ asset('assets/users/uploads/user2.jpg') }}" class="card-img-top profile-img rounded-circle"
                    alt="User Profile Picture" />
                @endif
                {{-- +++++++++++++++++++ username +++++++++++++++++++ --}}
                <div class="tab-content active" id="tab-about" style="font-size: 20px">
                    <div class="content">
                        <h2 class="username">
                            {{ $user->name }}
                            {{-- //////// Edit Button : Call showEditForm() function when clicked //////// --}}
                            <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background: none;">
                                <span>
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </span>
                            </button>
                        </h2>
                    </div>
                    {{-- //////// Edit Form //////// --}}
                    <div class="edit-form my-5" style="display: none;">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <textarea class="col-12" name="username">{{ $user->name }}</textarea>
                            {{-- //////// Update Button  //////// --}}
                            <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                                Update <span><i class="fa-regular fa-pen-to-square"></i></span>
                            </button>
                            {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                            <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                                Cancel <span><i class="fa-regular fa-solid fa-close"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
                {{-- +++++++++++++++++++ created_at +++++++++++++++++++ --}}
                <div class="d-flex flex-column align-items-center">
                    <p><i class="fa-solid fa-calendar-days"></i></p>
                    <p class="member-date">Member since: {{ $user_created_at->created_at->format('n/j/Y') }}</p>
                </div>
            </div>
            <div class="rating d-flex align-items-center mt-2 gap-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <p class="m-0 rating-text">(4)</p>
            </div>
            <div class="profile-show d-flex align-items-center mt-2 gap-1">

            </div>
            <!-- Add more card elements for other users -->
        </div>
    </div>
    {{-- ++++++++++++++++++++++++++ My list ++++++++++++++++++++++++++ --}}
    <div class="container">
        <h3 class="username">My list</h3>
        <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div class="row">
                @foreach ($user_animals as $user_animal)
                    {{-- ++++++++++++++ Card ++++++++++++++ --}}
                    <div class="col-md-4">
                        <a href="list-details.html" style="text-decoration: none;">
                            <div class="card list-card m-2" style="min-height:370px !important;">
                                <img src="{{ asset('assets/admin/uploads/marketplace/'.$user_animal->image) }}"
                                    class="card-img-top list-card-img fix-img" alt="image" style="width:100%;height:170px;" />
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title list-card-title w-100 text-center"
                                        style="color: black; text-decoration: none;">
                                        {{ $user_animal->name }}
                                    </h5>
                                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic mt-3"
                                        style="color: black; text-decoration: none;">
                                        <div class="d-flex justify-content-around gap-3">
                                            <p style="color: black; text-decoration: none;">Price: {{ $user_animal->price }}
                                                SR</p>
                                            <p style="color: black; text-decoration: none;">City: {{ $user_animal->city }}
                                            </p>
                                        </div>
                                        <p style="color: black; text-decoration: none;">Phone: {{ $user_animal->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        {{-- ++++++++++++++++++++++++++ footer ++++++++++++++++++++++++++ --}}
        @include('inc._footer')
    @endsection

    @push('js')
        <script src="{{ asset('js/showMore.js') }}"></script>
        <script src="{{ asset('js/Create1.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        {{-- ++++++++++++++++++++ Edit , Update , Cancel Buttons ++++++++++++++++++++ --}}
        <script>
            function showEditForm(button)
            {
                var tabContent = button.closest('.tab-content');
                var content = tabContent.querySelector('.content');
                var editForm = tabContent.querySelector('.edit-form');

                content.style.display = 'none';
                editForm.style.display = 'block';
            }
            function cancelEdit(button)
            {
                var tabContent = button.closest('.tab-content');
                var content = tabContent.querySelector('.content');
                var editForm = tabContent.querySelector('.edit-form');

                content.style.display = 'block';
                editForm.style.display = 'none';
            }
        </script>
    @endpush
