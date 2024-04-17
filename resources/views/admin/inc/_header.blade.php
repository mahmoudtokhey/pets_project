<div class="container categories">
    <div class="cards-container d-flex flex-wrap justify-content-center gap-5">
        {{-- ++++++++++++++++++++ categories ++++++++++++++++++++ --}}
        <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
            <a href="{{ route('category.mange') }}" style="all: unset; cursor: pointer">
                <img src="{{ asset('/imgs/bird.png') }}" class="card-img-top mt-2" alt="bird"
                    style="width: 100px; margin: auto" />
            </a>
            <div class="card-body">
                <a href="{{ route('category.mange') }}" style="all: unset; cursor: pointer">
                    <p class="card-text text-light">{{ trans('messages.birds') }}</p>
                </a>
            </div>
        </div>
        {{-- ++++++++++++++++++++ animals ++++++++++++++++++++ --}}
        <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
            <a href="{{ route('animals.index') }}" style="all: unset; cursor: pointer">
                <img src="{{ asset('/imgs/cats.png') }}" class="card-img-top mt-2" alt="bird"
                    style="width: 100px; margin: auto" />
            </a>
            <div class="card-body">
                <a href="{{ route('animals.index') }}" style="all: unset; cursor: pointer">
                    <p class="card-text text-light">Cats</p>
                </a>
            </div>
        </div>
        {{-- ++++++++++++++++++++ other animals ++++++++++++++++++++ --}}
        <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
            <a href="{{ route('animals.index') }}" style="all: unset; cursor: pointer">
                <img src="./imgs/animals.png" class="card-img-top mt-2" alt="bird"
                    style="width: 100px; margin: auto" />
            </a>
            <div class="card-body">
                <a href="{{ route('animals.index') }}" style="all: unset; cursor: pointer">
                    <p class="card-text text-light">Other animals</p>
                </a>
            </div>
        </div>
        {{-- ++++++++++++++++++++ marketplace ++++++++++++++++++++ --}}
        <div class="card" style="width: 10rem; text-align: center; background-color: #9b6641">
            <a href="{{ route('marketplace.index') }}" style="all: unset; cursor: pointer">
                <img src="./imgs/marketplace.png" class="card-img-top mt-2" alt="Market"
                    style="width: 100px; margin: auto" />
            </a>
            <div class="card-body">
                <a href="{{ route('marketplace.index') }}" style="all: unset; cursor: pointer">
                    <p class="card-text text-light">Marketplace & Adopt</p>
                </a>
            </div>
        </div>
    </div>
</div>
