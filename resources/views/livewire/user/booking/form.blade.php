<div class="custom-container">
    <div class="mb-4">
        <label for="name" class="form-label title-color">Nama</label>
        <input wire:model="name" type="text" class="form-control" placeholder="Nama anda" id="name">
        <div>
            @error('name') <span class="error text-danger ">{{ $message }}</span> @enderror 
        </div>
    </div>
    <div class="mb-4">
        <label for="phone" class="form-label title-color">Nomer HP</label>
        <input wire:model="phone" type="number" class="form-control" id="phone" placeholder="Nomer HP anda">
        <div>
            @error('phone') <span class="error text-danger ">{{ $message }}</span> @enderror 
        </div>
    </div>
    <button wire:click="saveSession" type="submit" class="btn theme-bg-color btn-sm text-white" style="width: 110px">Simpan</button>
    <div wire:loading> 
        Menyimpan...
    </div>
</div>
