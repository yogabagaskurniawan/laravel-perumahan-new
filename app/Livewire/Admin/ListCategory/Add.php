<?php

namespace App\Livewire\Admin\ListCategory;

use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Add extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $image, $name;
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.list-category.add');
    }
    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:home_categories',            
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validatedData) {
            
            $image = time() . '_' . $this->image->getClientOriginalName();
            $this->image->storeAs('images/categories', $image, 'public');

            HomeCategory::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'image' => $image,
            ]);
        }
        $this->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/admin/home-category', navigate: true);
    }
}
