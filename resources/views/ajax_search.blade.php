{{-- ===================================== Show Search Result ===================================== --}}
@if (@isset($animals) && !@empty($animals) && count($animals) > 0)
    @foreach ($animals as $animal)
        <div class="card">
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
@else
    <div class="alert alert-danger">
        عفوا لا توجد بيانات لعرضها !!
    </div>
@endif
