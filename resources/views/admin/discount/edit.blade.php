@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/upload.css')}}" />
<style>
    .uploader { margin-bottom: 1rem; }
    .hidden { display: none; }
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Discount Information</h4>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('discountUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            {{-- Discount Block 1 --}}
            <div class="p-3 border rounded mb-4">
                <h5>Discount Block 1</h5>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div id="file-upload-form-1" class="uploader">
                            <input id="file-upload-1" type="file" name="discount_image" accept="image/*" onchange="previewImage(this, 'file-image-1');" />
                            <label for="file-upload-1" id="file-drag-1">
                                <img id="file-image-1" src="{{ $shop->discount_image ? asset('storage/'.$shop->discount_image) : '' }}" alt="Preview 1" class="{{ $shop->discount_image ? '' : 'hidden' }}" style="max-width: 100%;">
                                <div id="start-1">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Upload Image 1 (180x180)</div>
                                    <span id="file-upload-btn-1" class="btn btn-primary btn-sm">Select a file</span>
                                </div>
                            </label>
                        </div>
                        <small class="form-text text-muted">Required dimensions: 180x180 pixels.</small>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="form-group">
                            <label for="discount_text">Discount Text 1</label>
                            <input type="text" name="discount_text" id="discount_text" class="form-control" placeholder="e.g., Sale Up to 50% OFF" value="{{ old('discount_text', $shop->discount_text) }}">
                        </div>
                        <div class="form-group">
                            <label for="discount_item">Discount Item 1</label>
                            <input type="text" name="discount_item" id="discount_item" class="form-control" placeholder="e.g., For All Items" value="{{ old('discount_item', $shop->discount_item) }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Discount Block 2 --}}
            <div class="p-3 border rounded mb-4">
                <h5>Discount Block 2</h5>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div id="file-upload-form-2" class="uploader">
                            <input id="file-upload-2" type="file" name="discount2_image" accept="image/*" onchange="previewImage(this, 'file-image-2');" />
                            <label for="file-upload-2" id="file-drag-2">
                                <img id="file-image-2" src="{{ $shop->discount2_image ? asset('storage/'.$shop->discount2_image) : '' }}" alt="Preview 2" class="{{ $shop->discount2_image ? '' : 'hidden' }}" style="max-width: 100%;">
                                <div id="start-2">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Upload Image 2 (180x180)</div>
                                    <span id="file-upload-btn-2" class="btn btn-primary btn-sm">Select a file</span>
                                </div>
                            </label>
                        </div>
                        <small class="form-text text-muted">Required dimensions: 180x180 pixels.</small>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="form-group">
                            <label for="discount2_text">Discount Text 2</label>
                            <input type="text" name="discount2_text" id="discount2_text" class="form-control" placeholder="e.g., Special Offer" value="{{ old('discount2_text', $shop->discount2_text) }}">
                        </div>
                        <div class="form-group">
                            <label for="discount2_item">Discount Item 2</label>
                            <input type="text" name="discount2_item" id="discount2_item" class="form-control" placeholder="e.g., For Selected Items" value="{{ old('discount2_item', $shop->discount2_item) }}">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-end">Update All Discounts</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
function previewImage(input, imgId) {
    const img = document.getElementById(imgId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            img.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection