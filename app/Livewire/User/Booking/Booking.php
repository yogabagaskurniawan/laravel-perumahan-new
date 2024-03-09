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
    public $name;
    public function render()
    {
        $customer = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();

        if ($customer) {
            $customerId = $customer->id;
            $customerName = $customer->name;

            $bookings = bookingModel::where('customer_id', $customerId)->with('homeList')->latest()->get();
            return view('livewire.user.booking.booking',[
                'booking' => 'booking',
            ], compact('bookings', 'customerName'));
        } else {
            return view('livewire.user.booking.booking',[
                'booking' => 'booking',
            ]);
        }
    }
    public function forgetSession()
    {
        session()->forget('phone',$this->phone);
        session()->forget('name',$this->name);
        $this->alert('success', 'Berhasil keluar akun');
        return back();
    }
}
