<section class="user-area-style ptb-100">
    <div class="container">
        <div class="log-in-area">
            <div class="section-title">
                <h2>Register</h2>
            </div>
            <div class="contact-form-action">
                <form wire:submit.prevent='register'>
                    <div class="row">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="username" name="username" wire:model.lazy='username'
                                    id="username" />
                                @error('username')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" wire:model.lazy='email'
                                    id="email" />
                                @error('email')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" wire:model.lazy='password'
                                    id="password" />
                                @error('password')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="confirm_password" name="confirm_password" wire:model.lazy='confirm_password'
                                    id="confirm_password" />
                                @error('confirm_password')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="default-btn" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
