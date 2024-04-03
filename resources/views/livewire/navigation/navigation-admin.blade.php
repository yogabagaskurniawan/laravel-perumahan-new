<div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <x-nav-link-admin :active="Str::contains(request()->url(), 'list-admin')">
            <a href="{{ route('listAdmin') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>List Admin</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'home-category')">
            <a href="{{ route('homeCategory') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>List Kategori</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'home-list')">
            <a href="{{ route('homeList') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>List Rumah</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'list-booking')">
            <a href="{{ route('listBooking') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>List Booking</span>
                </div>
            </a>
        </x-nav-link-admin>
        <x-nav-link-admin :active="Str::contains(request()->url(), 'setting')">
            <a href="{{ route('setting') }}" aria-expanded="false" class="dropdown-toggle" wire:navigate>
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>Setting</span>
                </div>
            </a>
        </x-nav-link-admin>
    </ul>
    
</div>
