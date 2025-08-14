<div class="py-md-5 py-2">
    <div class="container about-text">
        <h1 class="font-primary text-center mt-5">About Us</h1>
        <h4 class="font-secondary text-center">{{$shop->desc}}</h4>
    </div>

    <div class="img-about-us mt-4"></div>
</div>

<style>
    .about-text h4 {
        font-weight: 300;
        width: 80%;
        margin: 0 auto;
    }

    .img-about-us {
        width: 100%;
        height: 400px; /* tinggi yang diinginkan */
        background-image: url('{{ asset('assets/images/about-us-lg.jpg') }}');
        background-size: cover; /* crop otomatis */
        background-position: center; /* posisi crop */
        background-repeat: no-repeat;
    }

    @media screen and (max-width: 576px) {
        .about-text h4 {
            font-weight: 300;
            width: 100%;
            margin: 0 auto;
            font-size: 16px;
        }

        .img-about-us {
            height: 250px; /* tinggi untuk HP */
        }
    }
</style>
