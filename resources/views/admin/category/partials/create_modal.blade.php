<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog my-modal modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.store') }}" method="post" id="" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="container d-flex flex-column gap-4 align-items-center justify-content-center">
                        <h1>{{ trans('messages.create') }}</h1>
                        <p>Choose image</p>
                        {{-- +++++++++++++++++ image inputField +++++++++++++++++ --}}
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" id="inputGroupFile01"
                                onchange="displaySelectedImage(event,'multi-img-container')" />
                        </div>
                        <div
                            class="multi-img-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                        </div>
                        {{-- +++++++++++++++++++ name_ar inputField +++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('messages.name_ar')}} : <span class="text-danger">*</span></label>
                                <input  type="text" name="name_ar"  class="form-control" id="nameInput" value="{{ old('name_ar') }}">
                            </div>
                        </div>
                        {{-- +++++++++++++++++++ name_en inputField +++++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('messages.name_en')}} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="name_en" type="text" id="nameInput" value="{{ old('name_en') }}" >
                            </div>
                        </div>

                        <div class="input-group">

                        </div>
                    </div>
                </div>
                {{-- +++++++++++++++++ submit button +++++++++++++++++ --}}
                <div class="modal-footer justify-content-center">
                    <button id="submitBtn" type="submit" class="btn" style="background-color: #a84e10">
                        Submit Post <i class="fa-solid fa-upload" style="color: #000"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
