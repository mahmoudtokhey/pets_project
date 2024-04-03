<div class="modal fade"  id="edit{{ $category->id }}">
    <div class="modal-dialog my-modal modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- ============= Edit Form ============= --}}
            <div class="modal-body">
                <form
                    action="{{ route('category.update') }}"
                    method="POST" enctype="multipart/form-data">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="container d-flex flex-column gap-4 align-items-center justify-content-center">
                        <h1>{{ trans('messages.edit').' قسم ' }}{{ $category->name }}</h1>
                        <p>Choose image</p>
                        {{-- +++++++++++++++++ image inputField +++++++++++++++++ --}}
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" id="inputGroupFile02"
                                onchange="displaySelectedImage(event,'multi-img-container-edit{{ $category->id }}')" />
                        </div>
                        <div
                            class="multi-img-container-edit{{ $category->id }} d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                        </div>
                        {{-- ///////// "name_ar" inputField ///////// --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('messages.name_ar')}} : <span class="text-danger">*</span></label>
                                <input type="text"
                                    name="name_ar"
                                    class="form-control"
                                    value="{{ $category->getTranslation('name', 'ar') }}">
                            </div>
                        </div>
                        {{-- ///////// "name_en" inputField ///////// --}}
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>{{trans('messages.name_en')}} : <span class="text-danger">*</span></label>
                            <input type="text"
                                name="name_en"
                                class="form-control"
                                value="{{ $category->getTranslation('name', 'en') }}">
                            {{-- "category_id" Hidden inputField --}}
                            <input id="id"
                                type="hidden"
                                name="id"
                                class="form-control"
                                value="{{ $category->id }}">
                            </div>
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
