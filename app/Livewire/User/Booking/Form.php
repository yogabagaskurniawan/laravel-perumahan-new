<?php

namespace App\Livewire\User\Booking;

use Livewire\Component;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\Rule;
class Form extends Component
{
    use LivewireAlert;
    public $phone;
    public $name;
    public function render()
    {
        return view('livewire.user.booking.form');
    }
    public function saveSession()
    {
        // Mencari pengguna berdasarkan nomor telepon dan nama
        $cekUser = Customer::where('phone', $this->phone)->where('name', $this->name)->first();
        if ($cekUser) {
            $this->validate([
                'name' => 'required',
                'phone' => ['required', 'numeric', 'digits_between:10,15'],
            ]);
            session()->put('phone', $cekUser->phone);
            $this->flash('success', 'Berhasil masuk akun');
        } else {
            // Validasi input jika pengguna baru
            $this->validate([
                'name' => ['required','unique:customers,name'],
                'phone' => ['required', 'numeric', 'digits_between:10,15', 'unique:customers,phone'],
            ]);
            // Simpan data baru
            session()->put('phone', $this->phone); 
            Customer::create([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);
            $this->flash('success', 'Berhasil menyimpan data');
        }        
        // Redirect ke halaman booking
        return $this->redirect('/booking', navigate: true);
    }

}
