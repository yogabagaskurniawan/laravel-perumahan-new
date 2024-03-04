<div class="mobile-style-4">
    <ul>
        <x-nav-link-user :active="request()->routeIs('homepage')">
            <a href="{{ route('homepage') }}" class="mobile-box" wire:navigate>
                <i class="ri-home-5-line"></i>
                <h6 class="title-color">Home</h6>
            </a>
        </x-nav-link-user>
        
        <x-nav-link-user :active="Str::contains(request()->url(), 'search')" >
            <a href="{{ route('search') }}" class="mobile-box" wire:navigate>
                <i class="ri-search-line"></i>
                <h6 class="title-color">Search</h6>
            </a>
        </x-nav-link-user>

        <x-nav-link-user :active="request()->routeIs('booking')">
            <a href="{{ route('booking') }}" class="mobile-box" wire:navigate>
                <i class="ri-article-line"></i>
                <h6 class="title-color">Bookings</h6>
            </a>
        </x-nav-link-user>

        <x-nav-link-user :active="request()->routeIs('wishlist')">
            <a href="wishlist" class="mobile-box" wire:navigate>
                <i class="ri-heart-3-line"></i>
                <h6 class="title-color">Wishlist</h6>
            </a>
        </x-nav-link-user>
        {{-- <x-nav-link-user :active="request()->routeIs('profileUser')">
            <a href="{{ route('profileUser') }}" class="mobile-box" wire:navigate>
                <i class="ri-user-3-line"></i>
                <h6 class="title-color">profile</h6>
            </a>
        </x-nav-link-user> --}}
    </ul>
</div>
