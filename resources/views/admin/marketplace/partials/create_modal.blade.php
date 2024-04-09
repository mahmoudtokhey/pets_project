<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog my-modal modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('marketplace.store') }}" method="post" id="" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="container d-flex flex-column gap-4 align-items-center justify-content-center">
                        <h1>{{ trans('messages.create') }}</h1>
                        {{-- +++++++++++++++++ image inputField +++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="file" name="image" class="form-control" id="inputGroupFile01"
                                    onchange="displaySelectedImage(event,'multi-img-container')" />
                            </div>
                            <div
                                class="multi-img-container d-flex flex-wrap align-items-center justify-content-center gap-3 mb-3">
                            </div>
                        </div>
                        {{-- +++++++++++++++++ name inputField +++++++++++++++++ --}}
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control name-input" placeholder="Enter Name"
                                aria-label="name" aria-describedby="basic-addon1" />
                        </div>
                        {{-- +++++++++++++++++ price inputField +++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">SR</span>
                                <input type="number" name="price" class="form-control" placeholder="Enter Price" aria-label="Price"
                                    aria-describedby="basic-addon1" />
                            </div>
                        </div>
                        {{-- +++++++++++++++++ phone inputField +++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone" aria-label="Phone"
                                    aria-describedby="basic-addon1" />
                            </div>
                        </div>
                        {{-- +++++++++++++++++ city selectbox +++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="d-flex gap-3 align-items-center justify-content-center w-75">
                                <select class="form-select" name="city" aria-label="Default select example">
                                    <option disabled selected value="">Select City</option>
                                    <option value="Abha">Abha</option>
                                    <option value="Al Bahah">Al Bahah</option>
                                    <option value="Al Jubail">Al Jubail</option>
                                    <option value="Al Khobar">Al Khobar</option>
                                    <option value="Al-Qassim">Al-Qassim</option>
                                    <option value="Arar">Arar</option>
                                    <option value="Buraydah">Buraydah</option>
                                    <option value="Dammam">Dammam</option>
                                    <option value="Dhahran">Dhahran</option>
                                    <option value="Hail">Hail</option>
                                    <option value="Jeddah">Jeddah</option>
                                    <option value="Jizan">Jizan</option>
                                    <option value="Jubail">Jubail</option>
                                    <option value="Khamis Mushait">Khamis Mushait</option>
                                    <option value="Madinah">Madinah</option>
                                    <option value="Makkah">Makkah </option>
                                    <option value="Najran">Najran</option>
                                    <option value="Riyadh">Riyadh</option>
                                    <option value="Tabuk">Tabuk </option>
                                    <option value="Taif">Taif</option>
                                    <option value="Yanbu">Yanbu</option>
                                </select>
                            </div>
                        </div>
                        {{-- +++++++++++++++++ category ,animal selectbox +++++++++++++++++ --}}
                        <div class="d-flex gap-3 align-items-center justify-content-center w-75">
                            {{-- ======= category selectbox ======= --}}
                            <div class="input-group">
                                <select class="form-select" name="category" aria-label="Default select example">
                                    <option disabled selected value="">Select the category</option>
                                    <option value="Animal">Animal</option>
                                    <option value="Animal Items">Animal Items</option>
                                    <option value="Animal Adoption">Animal Adoption</option>
                                </select>
                            </div>
                            {{-- ======= animal selectbox ======= --}}
                            <div class="input-group">
                                <select class="form-select" name="animal">
                                    <option disabled selected value="">Select Type of Animal</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Dog">Dog</option>
                                    <option value="Bird">Bird</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        {{-- +++++++++++++++++ comment textarea +++++++++++++++++ --}}
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- +++++++++++++++++ checkbox +++++++++++++++++ --}}
                    <p style="color: rgb(140, 0, 0); font-weight: bold; font-style: italic; width: 62%; margin: auto;"
                        class="mt-2">
                        You must read the <a href="./Terms.html" style="color: rgba(1, 83, 215, 0.898)">terms</a> and
                        conditions before publishing your listing on the marketplace. If you have read them, please
                        check the box below:
                        <input class="form-check-input" required type="checkbox" value="" id="flexCheckDefault">
                    </p>
                </div>
                {{-- +++++++++++++++++ submit button +++++++++++++++++ --}}
                <div class="modal-footer justify-content-center">
                    <button id="submitBtn" type="submit" class="btn" style="background-color: #a84e10">
                        Submit Post <i class="fa-solid fa-upload" style="color: #000"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
