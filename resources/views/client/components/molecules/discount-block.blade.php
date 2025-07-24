<div class="col-md-6 col-12">
    <div class="p-4 discount-block bg-{{$background}} d-flex justify-content-between" style="border-radius:1.2rem;">
        <div class="d-flex flex-column justify-content-between">
            <div>
                <h3 class="text-white m-0 fw-normal">{{ $discount }}</h3>
                <h2 class="text-white m-0">{{ $item }}</h2>
            </div>
            <div>
                <x-molecules.button text="Beli Sekarang" type="light" align="start" size="sm"/>
            </div>
        </div>
        <div class="bg-white rounded-3" style="width: 180px; height: 180px; object-fit: cover;">
            <img src="{{ asset('storage/'.$image) }}" alt="{{$item}}" class="img-fluid">
        </div>
    </div>
</div>