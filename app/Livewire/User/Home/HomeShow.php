<?php

namespace App\Livewire\User\Home;

use Livewire\Component;
use App\Models\HomeList;

class HomeShow extends Component
{
    public $slug;
    public function render()
    {
        $homes = HomeList::where('slug', $this->slug)->firstOrFail();
        $kategori = $homes->homeCategory->id;
        // Ambil semua properti lainnya dengan kategori yang sama
        $propertiSamaKategori = HomeList::where('category_id', $kategori)->take(10)->get();

        // fitur add wishlist
        // if (auth()->check()) {
        //     // Periksa apakah user sudah wishlist rumah ini sebelumnya
        //     $wishlistExists = Wishlist::where('home_id', $this->homeId)
        //                             ->where('user_id', auth()->id())
        //                             ->exists();

        //     if ($wishlistExists) {
        //         // Jika user sudah wishlist rumah ini sebelumnya, tampilkan pesan error
        //         session()->flash('error', 'Sudah ada di daftar wishlist Anda');
        //     }else{
        //         Wishlist::create([
        //             'home_id' => $this->homeId,
        //             'user_id' => auth()->id(),
        //         ]);
        //         session()->flash('success', 'Berhasil dimasukan kedalam daftar wishlist Anda');
        //     }
        // }else{
        //     session()->flash('error', 'Silahkan masuk atau daftar akun dulu.');
        // }

        
        return view('livewire.user.home.home-show', compact('homes', 'propertiSamaKategori'));
    }
}
