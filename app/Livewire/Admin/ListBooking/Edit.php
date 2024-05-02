<?php

namespace App\Livewire\Admin\ListBooking;

use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Edit extends Component
{
    use LivewireAlert;
    #[Layout('components.layouts.admin')]
    public $status; 
    public $id;
    public $booking;
    public function mount($id)
    {
        // Ambil data rumah dari database berdasarkan ID
        $this->booking = Booking::find($id);

        // Set nilai properti berdasarkan data rumah yang ditemukan
        if ($this->booking) {
            $this->status = $this->booking->status;
        }
    }
    public function save($bookingId)
    {
        $validatedData = $this->validate([
            'status' => 'required|in:pending,process,accept',
        ]);

        if ($validatedData) {
            $booking = Booking::find($bookingId);
            if (!$booking) {
                // Handle jika rumah tidak ditemukan
                return;
            }

            // Update data booking
            $booking->status = $this->status;

            $booking->save();
        }

        $this->flash('success', 'Data berhasil diperbarui');
        return $this->redirect('/admin/list-booking', navigate: true);
    }
    public function render()
    {
        if ($this->booking) {
            $booking = Booking::find($this->id);
            return view('livewire.admin.list-booking.edit', compact('booking'));
        }else{
            abort(404);
        }
    }
}
