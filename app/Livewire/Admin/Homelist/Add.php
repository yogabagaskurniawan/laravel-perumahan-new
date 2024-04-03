<?php

namespace App\Livewire\Admin\Homelist;

use Livewire\Component;
use App\Models\HomeList;
use App\Models\HomeImage;
use App\Models\HomeCategory;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $name, $category, $price, $building_area, $land_area, $electrical_power, $number_of_bedrooms, $number_of_bathrooms, $status, $desc; 
    public $homeImage, $sketch_image, $floorplan;
    #[Layout('components.layouts.admin')]
    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:home_lists',
            'category' => 'required|exists:home_images,id',
            'price' => 'required|numeric',
            'building_area' => 'required|numeric',
            'land_area' => 'required|numeric',
            'electrical_power' => 'required|numeric',
            'number_of_bedrooms' => 'required|numeric',
            'number_of_bathrooms' => 'required|numeric',
            'status' => 'required|in:dijual,sewa',
            'desc' => 'required',
            'homeImage' => 'required|array|min:1|max:5',
            'homeImage.*' => 'image|mimes:jpeg,png,jpg|max:2048',            
            'sketch_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'floorplan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validatedData) {
            // Create the home
            // $sketchPath = $this->sketch_image->store('images/homeLists', 'public');
            // $floorplanPath = $this->floorplan->store('images/homeLists', 'public');
            // Generate unique filename untuk sketch image
            $sketchPath = time() . '_' . $this->sketch_image->getClientOriginalName();
            $this->sketch_image->storeAs('images/homeLists', $sketchPath, 'public');
            // Generate unique filename untuk floorplan
            $floorplanPath = time() . '_' . $this->floorplan->getClientOriginalName();
            $this->floorplan->storeAs('images/homeLists', $floorplanPath, 'public');

            $home = HomeList::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'category_id' => $this->category,
                'price' => $this->price,
                'building_area' => $this->building_area,
                'land_area' => $this->land_area,
                'electrical_power' => $this->electrical_power,
                'number_of_bedrooms' => $this->number_of_bedrooms,
                'number_of_bathrooms' => $this->number_of_bathrooms,
                'status' => $this->status,
                'desc' => $this->desc,
                'sketch_image' => $sketchPath,
                'floorplan' => $floorplanPath,
            ]);

            foreach ($this->homeImage as $image) {
                // $path = $image->store('images/detailHomeImages', 'public');
                $path = time() . '_' . $image->getClientOriginalName(); // Gunakan getOriginalClientName() untuk setiap gambar
                $image->storeAs('images/detailHomeImages', $path, 'public');
                HomeImage::create([
                    'home_id' => $home->id,
                    'image' => $path,
                ]);
            }
        }
        $this->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/admin/home-list', navigate: true);
    }
    public function render()
    {
        $homeCategories = HomeCategory::latest()->get();
        return view('livewire.admin.homelist.add', compact('homeCategories'));
    }
}
