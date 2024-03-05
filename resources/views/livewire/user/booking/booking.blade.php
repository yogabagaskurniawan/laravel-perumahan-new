<div>
    <livewire:navigation.navigationUser />
    <!-- header Section Start -->
    {{-- <header class="header-style-4 py-0">
        <div class="top-header px-15 position-relative">
            <div class="left-header">
                <ul class="name-date">
                    <li>Booking</li>
                </ul>
            </div>
        </div>
    </header> --}}
    <header class="header-style-4 py-0">
        <div class="top-header px-15 position-relative">
            <div class="left-header">
                <ul class="name-date">
                    <li>Booking</li>
                </ul>
            </div>

            @if(isset($customerName))
                <div class="right-header text-uppercase" data-bs-toggle="offcanvas">
                    {{ $customerName }} 
                    <div wire:click="forgetSession" class="d-flex align-items-center">
                        <span class="fst-italic me-1">| keluar akun </span> 
                        <i class="ri-logout-circle-r-line"></i>
                    </div>
                </div>
            @endif            
        </div>
    </header>
    <section class="section-t-space mb-5 pb-4">
        @if (isset($bookings))
            @if ($bookings->isNotEmpty())
                <div class="custom-container">
                    <div class="title-2 title-2-sm">
                        <h4 class="title-color h3">Pihak properti akan segera menghubungi anda</h4>
                    </div>
                </div>
            @endif
            <ul class="wishlist-list">
                @forelse ($bookings as $booking)
                    <li>
                        <div class="wishlist-box">
                            <a wire:navigate href="{{ route('detailProperti', $booking->homeList->slug) }}" class="wishlist-image">
                                <img src="{{ asset('storage/images/detailHomeImages/' . $booking->homeList->homeImage[0]->image) }}" class="img-fluid" alt="">
                            </a>
                            <div class="wishlist-content">
                                <div>
                                    <label>{{ $booking->homeList->homeCategory->name }}</label>
                                    <a wire:navigate href="{{ route('detailProperti', $booking->homeList->slug) }}">
                                        <h5>{{ $booking->homeList->name }}</h5>
                                    </a>
                                    <h6 class="location text-uppercase">{{ $booking->homeList->price }}</h6>
                                    @if ($booking->status == 'pending')
                                        <h4 class="price text-uppercase text-danger">{{ $booking->status }}</h4>
                                    @elseif ($booking->status == 'process')
                                        <h4 class="price text-uppercase text-primary">{{ $booking->status }}</h4>
                                    @else
                                        <h4 class="price text-uppercase text-success">{{ $booking->status }}</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="text-center">Anda belum pernah booking</div >
                @endforelse
            </ul>
        @else
            <div class="landing-title landing-title-2 ms-3">
                <h4>Silahkan isi data terlebih dahulu sebelum booking</h4>
            </div>
            <livewire:user.booking.form />
        @endif
    </section>
</div>
