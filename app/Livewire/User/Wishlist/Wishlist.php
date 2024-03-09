<?php

namespace App\Livewire\User\Wishlist;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Wishlist as WishlistModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Wishlist extends Component
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

            $wishlists = WishlistModel::where('customer_id', $customerId)->with('homeList')->latest()->get();
            return view('livewire.user.wishlist.wishlist',[
                'wishlist' => 'wishlist',
            ], compact('wishlists','customerName'));
        } else {
            return view('livewire.user.wishlist.wishlist',[
                'wishlist' => 'wishlist',
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

    // fitur delete list wistlist
    public function delete($id)
    {
        $customer = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();
        $wishlist = WishlistModel::where('customer_id', $customer->id)->whereHas('homeList', function ($query) use ($id) {
            $query->where('id', $id);
        })->first();

        if ($wishlist) {
            $wishlist->delete();
        }
        $this->alert('success', 'Berhasil dihapus dari daftar wishlist Anda');
        return back();
    }
}
