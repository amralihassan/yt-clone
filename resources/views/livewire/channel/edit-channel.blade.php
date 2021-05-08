<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form wire:submit.prevent="update">

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" wire:model="channel.name">
            @error('channel.name')
                <div class="alert text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control" wire:model="channel.slug">
            @error('channel.slug')
                <div class="alert text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" cols="30" rows="5"
                wire:model="channel.description"></textarea>
            @error('channel.description')
                <div class="alert text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <input type="file" wire:model="image">
        </div>

        @if ($image)
            Logo preview
            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
        @endif

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
