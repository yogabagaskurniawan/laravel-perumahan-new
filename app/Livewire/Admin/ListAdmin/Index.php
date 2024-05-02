<?php

namespace App\Livewire\Admin\ListAdmin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('components.layouts.admin')]
    public $search = '';
    public function render()
    {
        $adminList = User::latest()->search($this->search)->paginate(10);
        return view('livewire.admin.list-admin.index', compact('adminList'));
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        // Hapus entri dari tabel admin
        $admin->delete();
        $this->alert('success', 'Berhasil menghapus properti ini');
        return back();
    }
}
