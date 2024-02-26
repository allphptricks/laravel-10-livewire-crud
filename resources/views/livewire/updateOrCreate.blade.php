<div class="row justify-content-center mt-3 mb-3">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    {{ $title }}
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="save">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Product Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Product Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <button type="submit" class="col-md-3 offset-md-5 btn btn-success">
                             Save
                        </button>
                    </div>

                    @if($isEdit)
                        <div class="mb-3 row">
                            <button wire:click="cancel" 
                                class="col-md-3 offset-md-5 btn btn-danger">
                                Cancel
                            </button>
                        </div>
                    @endif

                    <div class="mb-3 row"> 
                        <span wire:loading class="col-md-3 offset-md-5 text-primary">Processing...</span>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>