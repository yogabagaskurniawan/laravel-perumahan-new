<?php

namespace App\Livewire\User\Booking;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Booking as bookingModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Booking extends Component
{
    use LivewireAlert;
    public $phone;
    public function render()
    {
        $phoneNumber = session()->get('phone');
        $customer = Customer::where('phone', $phoneNumber)->first();

        if ($customer) {
            $customerId = $customer->id;
            $customerName = $customer->name;

            $bookings = bookingModel::where('user_id', $customerId)->with('homeList')->latest()->get();
            return view('livewire.user.booking.booking', compact('bookings', 'customerName'));
        } else {
            return view('livewire.user.booking.booking');
        }
    }
    public function forgetSession()
    {
        session()->forget('phone',$this->phone);
        $this->alert('success', 'Berhasil keluar akun');
        return back();
    }
}
