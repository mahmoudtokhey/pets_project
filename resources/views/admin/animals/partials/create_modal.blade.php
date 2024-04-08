<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog my-modal" style="max-width: 50%; width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('animals.store') }}" method="post" id="" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <h1>Create Animal Profile</h1>
                    <div class="tabs col-md-12" style="margin-top: 20px">
                        <div class="wrapper">
                          <ul class="tabs-box">
                            <li class="tab active" data-tab="tab-ar">ar</li>
                            <li class="tab" data-tab="tab-en">en</li>
                            <li class="tab" data-tab="tab-images">images</li>
                            <li class="tab" data-tab="tab-category">category</li>
                          </ul>
                        </div>
                      </div>
                      <div class="tabs">
                        {{-- ======================== Ar tab ======================== --}}
                        <div class="tab-content active col-md-12" id="tab-ar" style="font-size: 20px">
                            {{-- +++++++++++++++++++ name_ar inputField +++++++++++++++++++ --}}
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input  type="text" name="name_ar" placeholder="اسم الحيوان" class="form-control" id="nameInput" value="{{ old('name_ar') }}">
                                </div>
                            </div>
                            {{-- +++++++++++++++++++ introduce_animal textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="introduce_animal_ar" placeholder="Write about the animal you want to introduce" id="introduce_animal"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ animal_characteristics textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="animal_characteristics_ar" placeholder="Write the characteristics of the animal " id="animal_characteristics"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ dietary_preference textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="dietary_preference_ar" placeholder="Write the animal's Dietary Preference" id="dietary_preference"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ care_requirements textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="care_requirements_ar" placeholder="Write the care requirements for the animal" id="care_requirements"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ health_recommendations textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="health_recommendations_ar" placeholder="Write Animal health recommendations" id="health_recommendations"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>

                        </div>
                        {{-- ======================== En tab ======================== --}}
                        <div class="tab-content" id="tab-en" style="font-size: 20px">
                            {{-- +++++++++++++++++++ name_en inputField +++++++++++++++++++ --}}
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input  class="form-control" placeholder="animal name" name="name_en" type="text" id="nameInput" value="{{ old('name_en') }}" >
                                </div>
                            </div>
                            {{-- +++++++++++++++++++ introduce_animal_en textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="introduce_animal_en" placeholder="Write about the animal you want to introduce" id="introduce_animal"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ animal_characteristics_en textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="animal_characteristics_en" placeholder="Write the characteristics of the animal " id="animal_characteristics"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ dietary_preference_en textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="dietary_preference_en" placeholder="Write the animal's Dietary Preference" id="dietary_preference"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ care_requirements_en textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="care_requirements_en" placeholder="Write the animal's Dietary Preference" id="dietary_preference"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                            {{-- +++++++++++++++++++ health_recommendations_en textarea +++++++++++++++++++ --}}
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="health_recommendations_en" placeholder="Write Animal health recommendations" id="health_recommendations"
                                    style="width: 300px; height: 150px;"></textarea>
                            </div>
                        </div>
                        {{-- ======================== images tab ======================== --}}
                        <div class="tab-content" id="tab-images" style="font-size: 20px">
                            {{-- +++++++++++++++++ image inputField +++++++++++++++++ --}}
                            <p>Choose image Profile </p>
                            <div class="input-group mb-3">
                                <input type="file" name="image" class="form-control" id="inputGroupFile01"
                                    onchange="displaySelectedImage(event,'multi-img-container')" />
                            </div>
                            <div
                                class="multi-img-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                            </div>
                            {{-- +++++++++++++++++++ animal_pictures images +++++++++++++++++++ --}}
                            <p>Choose pictures of the animal </p>
                            <div class="input-group mb-3">
                                <input type="file" name="animal_pictures[]" class="form-control" id="inputGroupFile02" accept="image/*" multiple onchange="displaySelectedImage(event,'multi-img-container2')" />
                            </div>
                            <div
                                class="multi-img2-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                            </div>
                            {{-- +++++++++++++++++++ geographic_distribution image +++++++++++++++++++ --}}
                            <p>Choose geographic distribution images </p>
                            <div class="input-group mb-3">
                                <input type="file" name="geographic_distribution_image" class="form-control" id="inputGroupFile03"
                                onchange="displaySelectedImage(event,'multi-img-container3')" />
                            </div>
                            <div
                                class="multi-img3-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                                <div class="input-group"></div>
                            </div>
                        </div>
                        {{-- ======================== categories tab ======================== --}}
                        <div class="tab-content" id="tab-category" style="font-size: 20px">
                            {{-- +++++++++++++ Categories Selectbox +++++++++++++ --}}
                            <div class="input-group mb-3">
                                <select class="form-select" name="category_id" aria-label="Default select example"
                                    style="width: 300px; margin: 0 auto; display: block;" id="categorySelect">
                                    <option disabled selected value="">Select the category</option>
                                    @foreach($categories as $categoryId => $categoryName)
                                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- +++++++++++++ submit button +++++++++++++ --}}
                <div class="modal-footer justify-content-center">
                    <button id="submitBtns" type="submit" class="btn" style="background-color: #a84e10">
                        Submit Post <i class="fa-solid fa-upload" style="color: #000"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


