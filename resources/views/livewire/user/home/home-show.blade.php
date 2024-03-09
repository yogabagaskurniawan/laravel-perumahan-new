<div>
    <header class="header-style-absolute">
        <div class="custom-container">
            <div class="left-header">
                <a wire:navigate href="{{ route('search') }}">
                    <i class="ri-arrow-left-line"></i>
                </a>
            </div>

            <ul class="right-right">
                <li>
                    @if (session()->has('phone') && session()->has('name'))
                    <button wire:click="wishlist" type="submit" class="rounded-circle border-0">
                        <a id="heart-box">
                            <i class="ri-heart-3-line"></i>
                        </a>
                    </button>
                    @else
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" class="rounded-circle border-0">
                            <a id="heart-box">
                                <i class="ri-heart-3-line"></i>
                            </a>
                        </button>
                    @endif
                </li>
            </ul>
        </div>
    </header>
    <section class="room-view-section">
        <div class="swiper room-view-slider room-view-image rounded-0">
            <div class="swiper-wrapper">
                @forelse ($homes->homeImage as $home)
                    <div class="swiper-slide">
                        <div class="room-image">
                            <img src="{{ asset('storage/images/detailHomeImages/' . $home->image) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                @empty
                    No image found!
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="hotel-name-review-section mb-3">
        <div class="hotel-name-rate mt-2">
            <div class="hotel-name-box">
                <div class="hotel-name justify-content-between">
                    <h4>{{ $homes->name }}</h4>
                </div>

                <div class="hotel-location">
                    <h5 class="text-uppercase">{{ $homes->status }}</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="section-t-space-3 pt-5">
        <div class="custom-container">
            <div class="accordion accordion-style" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h4 class="accordion-header" id="description1">
                        Description
                    </h4>
                    <div class="accordion-collapse collapse show pt-0">
                        <div class="accordion-body product-body">
                            <p>{!! $homes->desc  !!}</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header mt-0 pt-2" id="description1">
                        Informasi Properti
                    </h4>
                    <div id="specifications" class="accordion-collapse collapse show" style="">
                        <div class="table-responsive">
                            <table class="table table-part">
                                <tbody>
                                <tr>
                                    <th>Luas tanah</th>
                                    <td>{{ $homes->land_area }} &nbsp;m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <th>Luas bangunan</th>
                                    <td>{{ $homes->building_area }} &nbsp;m<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <th>Kamar tidur</th>
                                    <td>{{ $homes->number_of_bedrooms }}</td>
                                </tr>
                                <tr>
                                    <th>Kamar mandi</th>
                                    <td>{{ $homes->number_of_bathrooms }}</td>
                                </tr>
                                <tr>
                                    <th>Tipe properti</th>
                                    <td>{{ $homes->homeCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Daya listrik</th>
                                    <td>{{ $homes->electrical_power }} Watt</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td class="text-capitalize">{{ $homes->status }}</td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header mt-0 pt-2" id="description1">
                        Gambar Denah dan sketsa
                    </h4>
                    <div class="accordion-collapse collapse show" style="">
                        <section class="ecommerce-banner section-t-space-2 pt-2">
                            <div class="custom-container px-0">
                                <div class="banner-box d-block">
                                    <img src="{{ asset('storage/images/homeLists/' . $homes->sketch_image) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </section>
                        <section class="ecommerce-banner section-t-space-2 pt-2">
                            <div class="custom-container px-0">
                                <div class="banner-box d-block">
                                    <img src="{{ asset('storage/images/homeLists/' . $homes->floorplan) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </section>
                        <section class="mt-0 banner-section-2 section-t-space-2 pt-2">
                            <div class="custom-container px-0 ">
                                <div class="banner-box">
                                    <img src="/frontend/assets/images/hotel-booking/offer/1.png" class="banner-image" alt="">
                                    <div class="banner-content p-top-left">
                                        <div>
                                            <h5 class="text-white">BUTUH INFORMASI LENGKAP MENGENAI RUMAH, RUKO, TANAH.</h5>
                                            <p class="text-white">HUBUNGI KAMI SEGERA...!!</p>
                                            
                                            <a href="https://wa.me/6285176720024?text=Saya mau tanya tentang properti" class="btn bg-white btn-light">HUBUNGI KAMI</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header mt-0 pt-4 pb-2" id="description1">
                        Tunggu apalagi.. Yuk pesan sekarang!
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="destinations-hotel-section mb-5 pb-4">
        <div class="title-2 px-15">
            <h4>Rekomendasi untuk kamu properti {{ $homes->homeCategory->name }} lainnya</h4>
        </div>
        <div class="slideraku px-3 py-0">
            <div class="hs__wrapper">
                <ul class="hs">
                    @foreach ($propertiSamaKategori as $homeList)
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
    <div class="review-bottom-box" style="z-index: 1">
        <div class="review-price">
            <div class="btn continue-button">{{ $homes->getPriceAttribute() }}</div>
        </div>
        @if ($homes->status == 'terjual' || $homes->status == 'tersewa')
            <div class="alert bg-opacity-75 fs-6 bg-warning btn continue-button fst-italic" role="alert">
                <span class="text-uppercase" style="font-size: 14px !important">{{ $homes->status }}</span>
            </div>
        @elseif (!$homes->bookings || $homes->bookings->status == 'pending')
            @if (session()->has('phone') && session()->has('name'))
                <button wire:click="pesan" type="submit" class="btn btn-gradient btn-gradient-3 continue-button">Pesan</button>
            @else
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" class="btn btn-gradient btn-gradient-3 continue-button">Pesan</button>
            @endif
        @else
            <div class="alert bg-opacity-75 fs-6 bg-warning btn continue-button fst-italic" role="alert">
                <span class="text-uppercase" style="font-size: 14px !important">Sudah dipesan</span>
            </div>
        @endif
    </div>

    <!-- Modal Start -->
    <div wire:ignore.self class="modal fade cancel-modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Silahkan isi data terlebih dahulu, kemudian lanjut pilih properti</h4>
                    <livewire:user.booking.form :slug="$slug"/>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
</div>
