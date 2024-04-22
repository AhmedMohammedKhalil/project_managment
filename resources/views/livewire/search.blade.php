<section>
    <section class="main-contact-area ptb-100" style="padding-bottom: 150px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-wrap contact-pages mb-0">
                        <div class="contact-form">
                            <form id="contactForm" form wire:submit.prevent='makeSearch'>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>type</label>
                                            <div class="select-box">
                                                <select class="form-control" name="type_id" wire:model='type_id'>
                                                    <option value="1" @if($type_id==1)
                                                        selected @endif>Title</option>
                                                        <option value="2" @if($type_id==2)
                                                        selected @endif>Start Date</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Search By @if($type_id == 1) Title @else Start Date @endif</label>
                                            <input style="line-height: 4" class="form-control" @if($type_id == 1)type="text"@else type="date" @endif name="search"
                                                wire:model.lazy='search' id="search"/>
                                            @error('search')
                                                <span class="text-danger error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <button type="submit" class="default-btn">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
