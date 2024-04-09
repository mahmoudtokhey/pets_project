@extends('layouts.app')
@section('page_title')
    تفاصيل الحيوان
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
    <div class="animal-container d-flex justify-content-center align-items-center flex-column my-5"
        style="position: relative">

        {{-- ++++++++++++++++++++++++++ Animals Table ++++++++++++++++++++++++++ --}}
        <div class="tabs" style="margin-top: 20px">
            <div class="wrapper">
                <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
                <ul class="tabs-box">
                    {{-- ============= About Tab ============= --}}
                    <li class="tab active" data-tab="tab-about">{{ trans('messages.about') }}</li>
                    {{-- ============= Characteristics Tab ============= --}}
                    <li class="tab" data-tab="tab-characteristics">{{ __('messages.characteristics') }}</li>
                    {{-- ============= Dietary perference Tab ============= --}}
                    <li class="tab" data-tab="tab-dietary">@lang('messages.dietary_perference')</li>
                    {{-- ============= Care Requirements Tab ============= --}}
                    <li class="tab" data-tab="tab-care">{{ trans('messages.care_requirements') }}</li>
                    {{-- ============= Health Recommendations ============= --}}
                    <li class="tab" data-tab="tab-health">{{ trans('messages.health_recommendations') }}</li>
                    {{-- ============= Pictures ============= --}}
                    <li class="tab" data-tab="tab-pictures">{{ trans('messages.pictures') }}</li>
                    {{-- ============= Geographical Distribution ============= --}}
                    <li class="tab" data-tab="tab-Geographical">{{ trans('messages.geographical_distribution') }}</li>
                </ul>
                <div class="icon">
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </div>

        <div class="tabs">
            {{-- ============= "About Tab" Content ============= --}}
            <div class="tab-content active" id="tab-about" style="font-size: 20px">
                <div class="content">
                    <p>{{ $animal->introduce_animal }}</p>
                    {{-- //////// Edit Button : Call showEditForm() function when clicked //////// --}}
                    <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                        <span>
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </span>
                    </button>
                </div>
                {{-- //////// Edit Form //////// --}}
                <div class="edit-form" style="display: none;">
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea class="col-12" name="introduce_animal">{{ $animal->introduce_animal }}</textarea>
                        {{-- //////// Update Button  //////// --}}
                        <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Update <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                        {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                        <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Cancel <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            {{-- ============= Characteristics Tab ============= --}}
            <div class="tab-content" id="tab-characteristics" style="font-size: 20px">
                <div class="content">
                    <p>
                        {{ $animal->animal_characteristics }}
                    </p>
                    {{-- //////// Edit Button : Call showEditForm() function when clicked //////// --}}
                    <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                        <span>
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </span>
                    </button>
                </div>
                {{-- //////// Edit Form //////// --}}
                <div class="edit-form" style="display: none;">
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea class="col-12" name="animal_characteristics">{{ $animal->animal_characteristics }}</textarea>
                        {{-- //////// Update Button  //////// --}}
                        <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Update <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                        {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                        <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Cancel <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            {{-- ============= dietary Tab ============= --}}
            <div class="tab-content" id="tab-dietary" style="font-size: 20px">
                <div class="content">
                    <p>
                        {{ $animal->dietary_preference }}
                    </p>
                    {{-- //////// Edit Button : Call showEditForm() function when clicked //////// --}}
                    <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                        <span>
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </span>
                    </button>
                </div>
                {{-- //////// Edit Form //////// --}}
                <div class="edit-form" style="display: none;">
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea class="col-12" name="dietary_preference">{{ $animal->dietary_preference }}</textarea>
                        {{-- //////// Update Button  //////// --}}
                        <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Update <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                        {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                        <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Cancel <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                    </form>
                </div>

            </div>
            {{-- ============= care Tab ============= --}}
            <div class="tab-content" id="tab-care" style="font-size: 20px">
                <div class="content">
                    <p>
                        {{ $animal->care_requirements }}
                    </p>
                    {{-- //////// Edit Button : Call showEditForm() function when clicked //////// --}}
                    <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                        <span>
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </span>
                    </button>
                </div>
                {{-- //////// Edit Form //////// --}}
                <div class="edit-form" style="display: none;">
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea class="col-12" name="care_requirements">{{ $animal->care_requirements }}</textarea>
                        {{-- //////// Update Button  //////// --}}
                        <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Update <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                        {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                        <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Cancel <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            {{-- ============= health Tab ============= --}}
            <div class="tab-content" id="tab-health" style="font-size: 20px">
                <div class="content">
                    <p>{{ $animal->health_recommendations }}</p>
                    {{-- //////// Edit Button : Call showEditForm() function when clicked //////// --}}
                    <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                        <span>
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </span>
                    </button>
                </div>
                {{-- //////// Edit Form //////// --}}
                <div class="edit-form" style="display: none;">
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea class="col-12" name="health_recommendations">{{ $animal->health_recommendations }}</textarea>
                        {{-- //////// Update Button  //////// --}}
                        <button type="submit" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Update <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                        {{-- //////// Cancel Button : Call cancelEdit() function when clicked //////// --}}
                        <button type="button" onclick="cancelEdit(this)" class="btn list-card-btn" style="background-color: #9eb77d; margin-left: 10px;">
                            Cancel <span><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            {{-- ============= pictures Tab ============= --}}
            <div class="tab-content" id="tab-pictures" style="font-size: 20px">
                <div class="row">
                    <div class="content">
                        @foreach($animal_pictures as $index => $animal_picture)
                            <div class="col-md-4" style="margin-bottom: 10px;">
                                <img src="{{ asset('assets/admin/uploads/animals/' . $animal_picture->file_name) }}" class="img-fluid" alt="ynpbg"
                                    style="width: 100%; object-fit: cover;">
                            </div>
                        @endforeach
                        <!-- Update button -->
                        <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                            <span>
                                <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                            </span>
                        </button>
                    </div>
                    <div class="edit-form" style="display: none;">
                        <!-- Edit form for updating the animal_pictures -->
                        <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" name="animal_pictures[]" multiple/>
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
            </div>
            {{-- ============= Geographical Tab ============= --}}
            <div class="tab-content" id="tab-Geographical" style="font-size: 20px">
                <div class="content">
                    <!-- Display the geographical distribution image -->
                    <img src="{{ asset("assets/admin/uploads/animals/".$animal->geographic_distribution_image) }}" class="img-fluid w-100" alt="ynpbg"
                        style="max-height: 500px; height: 100%; width: 100%; object-fit: cover" />
                    <!-- Update button -->
                    <button type="button" class="btn list-card-btn"  onclick="showEditForm(this)" style="background-color: #9eb77d; margin-left: 10px;">Edit
                        <span>
                            <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                        </span>
                    </button>
                </div>
                <div class="edit-form" style="display: none;">
                    <!-- Edit form for updating the geographical distribution image -->
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="geographic_distribution_image" />
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
        </div>
    </div>
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
