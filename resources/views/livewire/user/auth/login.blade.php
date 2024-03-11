<div>
    <div class="hotel-auth hotel-auth-bg">
        <div class="auth-box">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="auth-title">
                            <h2>Masuk</h2>
                        </div>
    
                        <form class="form-style-5" wire:submit="proccesslogin">
                            <div class="form-floating mb-3">
                                <input wire:model="name" type="text" class="form-control" name="email" id="email" placeholder="Name">
                                <label for="email">Name</label>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input wire:model="password" type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-gradient btn-gradient-3 mb-3">Masuk</button>     
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
