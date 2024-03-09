<div>
    <livewire:navigation.navigationUser />
    <!-- header Section Start -->
    <header class="header-style-4 py-0">
        <div class="top-header px-15 position-relative">
            <div class="left-header">
                <ul class="name-date">
                    <li>Wishlist</li>
                </ul>
            </div>
            @if(session()->has('phone') && session()->has('name'))
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
        @if (session()->has('phone') && session()->has('name'))
            <ul class="wishlist-list">
                @forelse ($wishlists as $wishlist)
                    <li>
                        <div class="wishlist-box">
                            <a wire:navigate href="{{ route('detailProperti', $wishlist->homeList->slug) }}" class="wishlist-image">
                                <img src="{{ asset('storage/images/detailHomeImages/' . $wishlist->homeList->homeImage[0]->image) }}" class="img-fluid" alt="">
                            </a>
                            <div class="wishlist-content">
                                <div>
                                    <label>{{ $wishlist->homeList->homeCategory->name }}</label>
                                    <a wire:navigate href="{{ route('detailProperti', $wishlist->homeList->slug) }}">
                                        <h5>{{ $wishlist->homeList->name }}</h5>
                                    </a>
                                    <h6 class="location text-uppercase">{{ $wishlist->homeList->status }}</h6>
                                    <h4 class="price">{{ $wishlist->homeList->price }}</h4>
                                    <button
                                        class="border-0 bg-transparent"
                                        style="top: 0%"
                                        type="button"
                                        wire:click="delete({{ $wishlist->homeList->id }})"
                                        wire:confirm="Apakah anda yakin ingin menghapus?"
                                        >
                                        <i class="ri-delete-bin-7-fill delete-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="text-center">Anda belum pernah tambah fovorite</div >
                @endforelse
            </ul>
        @else
            <div class="landing-title landing-title-2 ms-3">
                <h4>Silahkan isi data terlebih dahulu sebelum kemenu favorite</h4>
            </div>
            <livewire:user.booking.form :wishlist="$wishlist"/>
        @endif
    </section>

</div>
