<div>
    <livewire:navigation.navigationUser />
    <header class="header-style-4">
        <div class="custom-container">
            <div class="row">
                <div class="col-6">
                    <div class="header-left">
                        <a href="index.html">
                            <img src="{{ asset('storage/images/settings/' . $settings[0]->image_logo) }}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <a href="notification.html" class="header-right">
                        <i class="ri-notification-2-line"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- category --}}
    <section class="hotel-name-section section-t-space-2">
        <div class=" cloth-category-section">
            <div class="custom-container">
                <ul class="category-list justify-content-center">
                    @forelse ($categories as $category)
                        <li class="mx-3">
                            <a href="{{ url('search/'.$category->slug) }}" class="category-box" wire:navigate>
                                <img src="{{ asset('storage/images/categories/' . $category->image) }}" style="width: 36px; height: 36px;" class="img-fluid rounded" alt="">
                                <h5>{{ $category->name }}</h5>
                            </a>
                        </li>
                    @empty
                        No category found!
                    @endforelse
                </ul>
            </div>
        </div>
    </section>

    {{-- slider --}}
    <section class="section-t-space-2 destinations-hotel-section">
        <div class="swiper onboarding-content-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
            <div class=" swiper-wrapper" id="swiper-wrapper-4792ab2ab05e796b" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-382px, 0px, 0px);">
                @forelse ($sliders as $slider)
                <div class="swiper-slide swiper-slide-prev" role="group" aria-label="1 / 3" style="width: 382px;">
                    <div class="onboarding-content-box">
                        <img src="{{ asset('storage/images/sliders/' . $slider->image) }}" class="img-fluid w-100" alt="">
                    </div>
                </div>
                @empty
                    No slider found!
                @endforelse
            </div>
            <div class="text-center mt-3 swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-clickable">
                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2" aria-current="true"></span>
                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </section>

    {{-- desckripsi perumahan --}}
    <section>
        <div class="custom-container">
            <div class="single-blog-details">
                <h4>{{ $settings[0]->company_name }}</h4>
            </div>

            <div class="single-blog-container">
                <div class="quotes-details">
                    {!! $settings[0]->desc !!}
                </div>
            </div>
        </div>
    </section>

    <section class="ecommerce-banner section-t-space-2">
        <div class="custom-container">
            <div class="banner-box d-block">
                <img src="{{ asset('storage/images/settings/' . $settings[0]->image_promotion) }}" class="img-fluid" alt="">
            </div>
        </div>
    </section>

    {{-- Start list properti --}}
    <section class="section-t-space-2 destinations-hotel-section">
        <div class="title-2 px-15">
            <h4>Rekomendasi untuk kamu </h4>
        </div>
        <div class="slideraku px-3 py-0">
            <div class="hs__wrapper">
                <ul class="hs">
                    @foreach ($CategorySelainSewa as $homeList)
                        <li class="hs__item">
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="{{ asset('storage/images/detailHomeImages/' . $homeList->homeImage[0]->image) }}" alt=""/>
                            </div>
                            <div class="hs__item__description">
                                <a href="{{ route('detailProperti',$homeList->slug) }}" wire:navigate>
                                    <h5 class="hlimaaku text-truncate">{{ $homeList->name }}</h5>
                                    <h5 class="hs__item__subtitle mb-1">
                                        <i class="ri-map-line"></i> Lt {{ $homeList->land_area }}&nbsp;m<sup>2</sup>, Lb {{ $homeList->building_area }}&nbsp;m<sup>2</sup>
                                    </h5>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="hlimaaku mt-1">{{ $homeList->getPriceAttribute() }}</h5>
                                        <h5 class="hlimaaku mt-1 text-uppercase fst-italic fw-normal pe-3">{{ $homeList->status }}</h5>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
        
    <!-- Hotel Place Section Start  mb-5 pb-4-->
    <section class="section-t-space-2 ">
        <div class="custom-container">
            <div class="title-2 title-2-sm">
                <h4 class="title-color h3">Miliki tanpa uang, sewa sekarang!</h4>
            </div>
        
            <ul class="hotel-category-list">
                @forelse ($latestHomeListSewa as $homeSewa)
                <li>
                    <a href="{{ url('search/detail/'.$homeSewa->slug) }}" class="category-box" wire:navigate>
                        <div class="category-image">
                            <img src="{{ asset('storage/images/detailHomeImages/' . $homeSewa->homeImage[0]->image) }}" class="img-fluid" alt="">
                            <div class="rating-hotel">
                                {{-- <i class="ri-star-fill"></i> --}}
                                <h6 class="text-uppercase">{{ $homeSewa->status }}</h6>
                            </div>
                        </div>
                        <div class="category-content">
                            <h5 class="name">{{ $homeSewa->name }}</h5>
                            <h6><i class="ri-map-line"></i> Lt {{ $homeSewa->land_area }}&nbsp;m<sup>2</sup>, Lb {{ $homeSewa->building_area }}&nbsp;m<sup>2</sup></h6>
                            <h5 class="price">{{ $homeSewa->getPriceAttribute() }}</h5>
                        </div>
                    </a>
                </li>
                @empty
                    No home found!
                @endforelse
            </ul>
        </div>
    </section>

    <!-- Offer Banner Start -->
    <section class="banner-section-2 ">
        <div class="custom-container">
            <div class="banner-box">
                <img src="../frontend/assets/images/hotel-booking/offer/1.png" class="banner-image" alt="">
                <div class="banner-content p-top-left">
                    <div>
                        <h5 class="text-white">BUTUH INFORMASI LENGKAP MENGENAI RUMAH, RUKO, TANAH.</h5>
                        <p class="text-white">HUBUNGI KAMI SEGERA...!!</p>
                        {{-- <h6 class="text-white">Use Code: <b>MMTAMEX</b></h6> --}}
                        <a href="https://wa.me/{{ $settings[0]->phone }}?text=Saya mau tanya tentang properti" class="btn bg-white btn-light">HUBUNGI KAMI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Banner End -->

    <!-- ruko latest start -->
    <section class="section-t-space-2 destinations-hotel-section">
        <div class="title-2 px-15">
            <h4>Spesial buat KAMU yang mau buka usaha! </h4>
        </div>
        <div class="slideraku px-3 py-0">
            <div class="hs__wrapper">
                <ul class="hs">
                    @foreach ($rukoHomes as $ruko)
                        <li class="hs__item">
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="{{ asset('storage/images/detailHomeImages/' . $ruko->homeImage[0]->image) }}" alt=""/>
                            </div>
                            <div class="hs__item__description">
                                <a href="{{ url('search/detail/'.$ruko->slug) }}" wire:navigate>
                                    <h5 class="hlimaaku text-truncate">{{ $ruko->name }}</h5>
                                    <h5 class="hs__item__subtitle mb-1">
                                        <i class="ri-map-line"></i> Lt {{ $ruko->land_area }}&nbsp;m<sup>2</sup>, Lb {{ $ruko->building_area }}&nbsp;m<sup>2</sup>
                                    </h5>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="hlimaaku mt-1">{{ $ruko->getPriceAttribute() }}</h5>
                                        <h5 class="hlimaaku mt-1 text-uppercase fst-italic fw-normal pe-3">{{ $ruko->status }}</h5>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- ruko latest End -->

    <!-- Hotel Place Section Start  -->
    <section class="section-t-space-2 mb-5 pb-4">
        <div class="custom-container">
            <div class="title-2 title-2-sm">
                <h4 class="title-color h3">Rekomendasi buat KAMU di bawah 200 juta!</h4>
            </div>
        
            <ul class="hotel-category-list">
                @forelse ($homeHarga as $homeHar)
                <li>
                    <a href="{{ url('search/detail/'.$homeHar->slug) }}" class="category-box" wire:navigate>
                        <div class="category-image">
                            <img src="{{ asset('storage/images/detailHomeImages/' . $homeHar->homeImage[0]->image) }}" class="img-fluid" alt="">
                            <div class="rating-hotel">
                                {{-- <i class="ri-star-fill"></i> --}}
                                <h6 class="text-uppercase">{{ $homeHar->status }}</h6>
                            </div>
                        </div>
                        <div class="category-content">
                            <h5 class="name">{{ $homeHar->name }}</h5>
                            <h6><i class="ri-map-line"></i> Lt {{ $homeHar->land_area }}&nbsp;m<sup>2</sup>, Lb {{ $homeHar->building_area }}&nbsp;m<sup>2</sup></h6>
                            <h5 class="price">{{ $homeHar->getPriceAttribute() }}</h5>
                        </div>
                    </a>
                </li>
                @empty
                    No home found!
                @endforelse
            </ul>
        </div>
    </section>
    {{-- End properti --}}
</div>
