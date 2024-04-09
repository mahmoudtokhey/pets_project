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

        {{-- ++++++++++++++++++++++++++ Tabs Header ++++++++++++++++++++++++++ --}}
        <div class="tabs" style="margin-top: 20px">
            <div class="wrapper">
                <div class="icon">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                </div>
                <ul class="tabs-box align-items-center justify-content-center">
                    <li class="tab active" data-tab="cat">Cat</li>
                    <li class="tab" data-tab="dog">Dog</li>
                    <li class="tab" data-tab="bird">Bird</li>
                    <li class="tab" data-tab="other">Other</li>
                </ul>
                <div class="icon">
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </div>
        {{-- ++++++++++++++++++++++++++ Tabs Content ++++++++++++++++++++++++++ --}}
        <div class="tabs">
            {{-- ///////////// Cat tab ///////////// --}}
            <div class="tab-content tab-content-custom active" id="cat" style="font-size: 20px">
                <div class="row">
                    @foreach ($product_cat as $product)
                        {{-- <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> --}}
                            <div class="col-md-4 card list-card">
                                <img src="{{ asset('assets/admin/uploads/marketplace/'.$product->image) }}" class="card-img-top list-card-img fix-img" alt="..." />
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title list-card-title w-100 text-center">
                                        {{ $product->name }}
                                    </h5>
                                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                                        <div class="d-flex justify-content-around gap-3">
                                            <p>Price: {{ $product->price }} SR</p>
                                            <p>City: {{ $product->city }}</p>
                                        </div>
                                        <p>Phone: {{ $product->phone }}</p>
                                    </div>
                                    {{-- ++++++++++ Delete Button ++++++++++ --}}
                                    @php
                                        $user_type = App\Models\User::select('user_type')->where('id',$product->added_by)->first();
                                    @endphp
                                    @if ( $user_type->user_type == "admin" )
                                        <a  href="#modalDelete" title="حذف" class="modal-effect btn list-card-btn"
                                            data-product_id="{{ $product->id }}"
                                            data-product_name="{{ $product->name }}"
                                            data-bs-toggle="modal" data-bs-effect="effect-scale">حذف <i class="fa-solid fa-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
            {{-- ///////////// Dog tab ///////////// --}}
            <div class="tab-content tab-content-custom" id="dog" style="font-size: 20px">
                <div class="row">
                    @foreach ($product_dog as $product)
                        {{-- <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> --}}
                            <div class="col-md-4 card list-card m-2">
                                <img src="{{ asset('assets/admin/uploads/marketplace/'.$product->image) }}" class="card-img-top list-card-img fix-img" alt="..." />
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title list-card-title w-100 text-center">
                                        {{ $product->name }}
                                    </h5>
                                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                                        <div class="d-flex justify-content-around gap-3">
                                            <p>Price: {{ $product->price }} SR</p>
                                            <p>City: {{ $product->city }}</p>
                                        </div>
                                        <p>Phone: {{ $product->phone }}</p>
                                    </div>
                                    {{-- ++++++++++ Delete Button ++++++++++ --}}
                                    @php
                                        $user_type = App\Models\User::select('user_type')->where('id',$product->added_by)->first();
                                    @endphp
                                    @if ( $user_type->user_type == "admin" )
                                        <a  href="#modalDelete" title="حذف" class="modal-effect btn list-card-btn"
                                            data-product_id="{{ $product->id }}"
                                            data-product_name="{{ $product->name }}"
                                            data-bs-toggle="modal" data-bs-effect="effect-scale">حذف <i class="fa-solid fa-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
            {{-- ///////////// Bird tab ///////////// --}}
            <div class="tab-content tab-content-custom" id="bird" style="font-size: 20px">
                <div class="row">
                    @foreach ($product_bird as $product)
                        {{-- <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> --}}
                            <div class="col-md-4 card list-card m-2">
                                <img src="{{ asset('assets/admin/uploads/marketplace/'.$product->image) }}" class="card-img-top list-card-img fix-img" alt="..." />
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title list-card-title w-100 text-center">
                                        {{ $product->name }}
                                    </h5>
                                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                                        <div class="d-flex justify-content-around gap-3">
                                            <p>Price: {{ $product->price }} SR</p>
                                            <p>City: {{ $product->city }}</p>
                                        </div>
                                        <p>Phone: {{ $product->phone }}</p>
                                    </div>
                                    {{-- ++++++++++ Delete Button ++++++++++ --}}
                                    @php
                                        $user_type = App\Models\User::select('user_type')->where('id',$product->added_by)->first();
                                    @endphp
                                    @if ( $user_type->user_type == "admin" )
                                        <a  href="#modalDelete" title="حذف" class="modal-effect btn list-card-btn"
                                            data-product_id="{{ $product->id }}"
                                            data-product_name="{{ $product->name }}"
                                            data-bs-toggle="modal" data-bs-effect="effect-scale">حذف <i class="fa-solid fa-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
            {{-- ///////////// other tab ///////////// --}}
            <div class="tab-content tab-content-custom" id="other" style="font-size: 20px">
                <div class="row">
                    @foreach ($product_other as $product)
                        {{-- <div class="lists-continer d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> --}}
                            <div class="col-md-4 card list-card m-2">
                                <img src="{{ asset('assets/admin/uploads/marketplace/'.$product->image) }}" class="card-img-top list-card-img fix-img" alt="..." />
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title list-card-title w-100 text-center">
                                        {{ $product->name }}
                                    </h5>
                                    <div class="card-text d-flex flex-column align-items-center fw-bold fst-italic">
                                        <div class="d-flex justify-content-around gap-3">
                                            <p>Price: {{ $product->price }} SR</p>
                                            <p>City: {{ $product->city }}</p>
                                        </div>
                                        <p>Phone: {{ $product->phone }}</p>
                                    </div>
                                    {{-- ++++++++++ Delete Button ++++++++++ --}}
                                    @php
                                        $user_type = App\Models\User::select('user_type')->where('id',$product->added_by)->first();
                                    @endphp
                                    @if ( $user_type->user_type == "admin" )
                                        <a  href="#modalDelete" title="حذف" class="modal-effect btn list-card-btn"
                                            data-product_id="{{ $product->id }}"
                                            data-product_name="{{ $product->name }}"
                                            data-bs-toggle="modal" data-bs-effect="effect-scale">حذف <i class="fa-solid fa-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        {{-- </div> --}}
                    @endforeach
                </div>

            </div>
            <!-- +++++++++++++++++++++++++++++ Delete Modal  +++++++++++++++++++++++++++++ -->
            @include('admin.marketplace.partials.delete_modal')
        </div>
    </div>
        @include('inc._footer')
    @endsection

    @push('js')
        <script src="{{ asset('js/showMore.js') }}"></script>
        <script src="{{ asset('js/Create1.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- +++++++++++++++++ "Delete Category" js +++++++++++++++++ -->
        <script>
            // Appear "Delete Category Data" in the "Delete Modal InputFields"
            $("#modalDelete").on('show.bs.modal', function(event){
                var button      = $(event.relatedTarget);
                // Get "productId" from "data-id" "custom attribute"
                var sectionId   = button.data('product_id');
                // Get "productName" from "data-product_name" "custom attribute"
                var sectionName = button.data('product_name');
                // Put "product data" in "Delete Modal InputFields"
                var modal       = $(this);
                // Put "product id" in "Edit Modal "id InputField"
                modal.find('.modal-body #product_id').val(sectionId);
                // Put "product name" in "Edit Modal" "product_name InputField"
                modal.find('.modal-body #product_name').val(sectionName);
            });
        </script>
    @endpush
