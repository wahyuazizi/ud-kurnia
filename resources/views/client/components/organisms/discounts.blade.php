@props(['shop'])

<div class="container py-5">
    <div class="row g-3">
        @if($shop->discount_text || $shop->discount_item || $shop->discount_image)
        <x-molecules.discount-block 
            background="primary" 
            :discount="$shop->discount_text" 
            :item="$shop->discount_item" 
            :image="$shop->discount_image" 
        />
        @endif

        @if($shop->discount2_text || $shop->discount2_item || $shop->discount2_image)
        <x-molecules.discount-block 
            background="info" 
            :discount="$shop->discount2_text" 
            :item="$shop->discount2_item" 
            :image="$shop->discount2_image" 
        />
        @endif
    </div>
</div>
