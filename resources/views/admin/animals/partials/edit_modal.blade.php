<div class="modal fade"  id="edit{{ $animal->id }}">
    <div class="modal-dialog my-modal modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- ============= Edit Form ============= --}}
            <div class="modal-body">
                <form
                    action="{{ route('animals.update') }}"
                    method="POST" enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="container d-flex flex-column gap-4 align-items-center justify-content-center">
                        <h1>{{ trans('messages.edit').' : ' }}{{ $animal->name }}</h1>
                        <p>Choose image</p>
                        {{-- +++++++++++++++++ image inputField +++++++++++++++++ --}}
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" id="inputGroupFile02"
                                onchange="displaySelectedImage(event,'multi-img-container-edit{{ $animal->id }}')" />
                        </div>
                        <div
                            class="multi-img-container-edit{{ $animal->id }} d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                        </div>
                        {{-- ///////// "name_ar" inputField ///////// --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('messages.name_ar')}} : <span class="text-danger">*</span></label>
                                <input type="text"
                                    name="name_ar"
                                    class="form-control"
                                    value="{{ $animal->getTranslation('name', 'ar') }}">
                            </div>
                        </div>
                        {{-- ///////// "name_en" inputField ///////// --}}
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>{{trans('messages.name_en')}} : <span class="text-danger">*</span></label>
                            <input type="text"
                                name="name_en"
                                class="form-control"
                                value="{{ $animal->getTranslation('name', 'en') }}">
                            {{-- "animal_id" Hidden inputField --}}
                            <input id="id"
                                type="hidden"
                                name="id"
                                class="form-control"
                                value="{{ $animal->id }}">
                            </div>
                        </div>
                        {{-- +++++++++++++ Categories Selectbox +++++++++++++ --}}
                        <div class="input-group mb-3">
                            <label>{{trans('messages.categories')}} : <span class="text-danger">*</span></label>
                            <select class="form-select" name="category_id" aria-label="Default select example"
                                style="width: 300px; margin: 0 auto; display: block;" id="categorySelect">
                                <option disabled selected value="">Select the category</option>
                                @foreach($categories as $categoryId => $categoryName)
                                    <option value="{{ $categoryId }}" {{ $categoryId == $animal->category_id ? 'selected' : '' }}>
                                        {{ $categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- /////////////////////// Modal Footer : "Save" , "Cancel" Button ///////////////////////--}}
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ trans('messages.close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('messages.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
