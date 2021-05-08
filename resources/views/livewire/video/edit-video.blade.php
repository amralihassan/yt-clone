<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form wire:submit.prevent="update">

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" wire:model="video.title">
                    @error('video.title')
                        <div class="alert text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="5"
                        wire:model="video.description"></textarea>
                    @error('video.description')
                        <div class="alert text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="">Visibility</label>
                  <select class="form-control" wire:model='video.visibility'>
                    <option value="private">Private</option>
                    <option value="public">Public</option>
                    <option value="unlisted">Un;listed</option>
                  </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

</div>
