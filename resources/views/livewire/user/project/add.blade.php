


<section class="user-area-style ptb-100">
    <div class="container">
        <div class="log-in-area">
            <div class="section-title">
                <h2>Add New Project</h2>
            </div>
            <div class="contact-form-action">
                <form wire:submit.prevent='add'>
                    <div class="row">
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="col-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input placeholder="Title" class="form-control" type="text" name="title" wire:model.lazy='title' id="title" />
                                @error('title')
                                <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Phase</label>
                                <select name="phase" id="phase" class="form-control" wire:model.lazy='phase'>
                                    <option value="design" @if($phase == 'design') selected @endif>Design</option>
                                    <option value="development" @if($phase == 'development') selected @endif>Development</option>
                                    <option value="testing" @if($phase == 'testing') selected @endif>testing</option>
                                    <option value="deployment"  @if($phase == 'deployment') selected @endif>Deployment</option>
                                    <option value="complete" @if($phase == 'complete') selected @endif>Complete</option>
                                </select>
                                @error('phase')
                                <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input placeholder="start_date" class="form-control" type="date" name="start_date" wire:model='start_date' id="start_date" />
                                @error('start_date')
                                <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>End Date</label>
                                <input placeholder="end_date" class="form-control" type="date" name="end_date" wire:model='end_date' id="end_date" />
                                @error('end_date')
                                <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control"  wire:model.lazy='short_description' id="short_description" rows="6" placeholder="Short Description"></textarea>
                                @error('short_description') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>



                        <div class="col-12">
                            <button class="default-btn" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
