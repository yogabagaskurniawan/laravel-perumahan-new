<div>
    <livewire:navigation.navigationUser />
    <!-- header Section Start -->
    <header class="header-style-4 py-0">
        <div class="top-header px-15" style="z-index: 99999999999999999999">
            <div class="left-header">
                <ul class="name-date">
                    <li>Semua Properti {{ $nameSlug }}</li>
                </ul>
            </div>
        </div>              
        <div class="bottom-header px-15 mt-1">
            <div class="row ">
                <div class="col-8">
                    <div class="form-style-5" style="margin-top:-10px;">
                        <div class="form-floating">
                            <input wire:model.live="search" type="search" class="form-control w-100" id="floatingInput" placeholder="Search here..">
                            <label for="floatingInput">Cari properti..</label>
                        </div>
                    </div>
                </div>                
                <div class="col-4">
                    <select  wire:model.change="sortingBy" class="form-select border border-light" id="selectGue" name="sortingBy" >
                        <option value="default">Default filter</option>
                        <option value="low-high">Harga : Terendah ke tertinggi</option>
                        <option value="high-low">Harga : Tertinggi ke terendah</option>
                    </select>
                </div>
            </div>
            <ul class="nav nav-pills tab-style-4 pb-0 mb-0 mt-2">
                <li class="nav-item" role="presentation">
                    <a wire:navigate href="{{ route('search') }}" class="nav-link" id="pills-all-tab">Semua</a>
                </li>
                @foreach ($categories as $ctg)
                    <li class="nav-item" role="presentation">
                        <a wire:navigate href="{{ route('search',$ctg->slug) }}" class="nav-link" id="pills-apparel-tab">{{ $ctg->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </header>
    <!-- header Section End -->

    <!-- home latest Start -->
    <section class="section-t-space-2  mb-5 pb-4">
        <div class="custom-container">
            <ul class="hotel-category-list">
                @forelse ($latestHomes as $home)
                <li>
                    <a href="{{ url('search/detail/'.$home->slug) }}" class="category-box" wire:navigate>
                        <div class="category-image">
                            <img src="{{ asset('storage/images/detailHomeImages/' . $home->homeImage[0]->image) }}" class="img-fluid" alt="">
                            <div class="rating-hotel">
                                {{-- <i class="ri-star-fill"></i> --}}
                                <h6 class="text-uppercase">{{ $home->status }}</h6>
                            </div>
                        </div>
                        <div class="category-content">
                            <h5 class="name">{{ $home->name }}</h5>
                            <h6><i class="ri-map-line"></i> Lt {{ $home->land_area }}&nbsp;m<sup>2</sup>, Lb {{ $home->building_area }}&nbsp;m<sup>2</sup></h6>
                            <h5 class="price">{{ $home->getPriceAttribute() }}</h5>
                        </div>
                    </a>
                </li>
                @empty
                    No home found!
                @endforelse
            </ul>
            @if ($latestHomes->count() < $totalHomesCount)
                <div x-intersect="$wire.loadMore()" class="border-4 h-60 my-5 py-3">
                    <span class="fs-6">Mengambil data selanjutnya..</span>
                </div>
            @endif
        </div>
    </section>
</div>
