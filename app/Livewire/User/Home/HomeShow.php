<?php

namespace App\Livewire\User\Home;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Customer;
use App\Models\HomeList;
use App\Models\Wishlist;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HomeShow extends Component
{
    use LivewireAlert;
    public $slug;
    public $phone;
    public $name;
    // fitur tambah pesan
    public function pesan()
    {
        if (session()->has(['phone','name'])) {
            $cekUser = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();
            $customerId = $cekUser->id;
            $home = HomeList::where('slug', $this->slug)->firstOrFail();
            if ($home->status === 'terjual' || $home->status === 'tersewa') {
                $this->alert('warning', 'Rumah ini sudah terjual atau sudah tersewa. Anda tidak dapat memesannya.');
                return back();
            }
            $homeId = $home->id;
            // Periksa apakah user sudah memesan rumah ini sebelumnya
            $bookingExists = Booking::where('home_id', $homeId)
                                    ->where('customer_id', $customerId)
                                    ->exists();
    
            // Periksa apakah rumah ini belum pernah dibooking sama sekali
            $emptyBooking = Booking::where('home_id', $homeId)->doesntExist();
            
            // Periksa apakah ada booking dengan status 'pending' untuk rumah ini oleh pengguna lain
            $homePending = Booking::where('home_id', $homeId)
                                ->where('customer_id', '!=', $customerId)
                                ->where('status', 'pending')
                                ->exists();
    
            if ($bookingExists) {
                // Jika user sudah memesan rumah ini sebelumnya, tampilkan pesan error
                $this->alert('error', 'Anda sudah memesan rumah ini sebelumnya.');
                return back();
            } elseif ($emptyBooking || $homePending) {
                // Jika rumah belum pernah dibooking sama sekali atau ada booking dengan status 'pending' oleh pengguna lain,
                // simpan data booking ke dalam tabel booking
                Booking::create([
                    'home_id' => $homeId,
                    'customer_id' => $customerId,
                ]);
                $this->flash('success', 'Pesan properti ini berhasil ditambahkan');
                // Redirect pengguna ke halaman booking dengan pesan sukses
                return $this->redirect('/booking', navigate: true);
            } else {
                // Periksa apakah status booking masih pending
                $latestBookingStatus = Booking::where('home_id', $homeId)
                                            ->orderBy('created_at', 'desc')
                                            ->value('status');
                if ($latestBookingStatus !== 'pending') {
                    // Jika status bukan pending, tampilkan pesan error
                    $this->alert('error', 'Status rumah ini sedang dalam proses atau telah selesai. Anda tidak dapat memesan saat ini.');
                    return back();
                }
            }
        } else {
            // Penanganan jika $cekUser null (tidak ada data yang ditemukan)
            $this->alert('error', 'Pengguna tidak ditemukan.');
            return back();
        }
    }

    // fitur tambah wishlist
    public function wishlist()
    {
        if (session()->has(['phone','name'])) {
            $home = HomeList::where('slug', $this->slug)->firstOrFail();
            $cekUser = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();
            // Periksa apakah user sudah wishlist rumah ini sebelumnya
            $wishlistExists = Wishlist::where('home_id', $home->id)
                                    ->where('customer_id', $cekUser->id)
                                    ->exists();

            if ($wishlistExists) {
                // Jika user sudah wishlist rumah ini sebelumnya, tampilkan pesan error
                $this->alert('error', 'Sudah ada di daftar wishlist Anda');
                return back();
            }else{
                Wishlist::create([
                    'home_id' => $home->id,
                    'customer_id' => $cekUser->id,
                ]);
                $this->alert('success', 'Berhasil dimasukan kedalam daftar wishlist Anda');
                return back();
            }
        }else {
            // Penanganan jika $cekUser null (tidak ada data yang ditemukan)
            $this->alert('error', 'Pengguna tidak ditemukan.');
            return back();
        }
    }
    public function render()
    {
        $slug = $this->slug;
        $homes = HomeList::where('slug', $this->slug)->firstOrFail();
        $kategori = $homes->homeCategory->id;
        // Ambil semua properti lainnya dengan kategori yang sama
        $propertiSamaKategori = HomeList::where('category_id', $kategori)->take(10)->get();
        return view('livewire.user.home.home-show', compact('homes', 'propertiSamaKategori','slug'));
    }
}