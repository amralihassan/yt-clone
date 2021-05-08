<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false, $wire.file_completed()"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <div class="card-body">
                        <div class="form-group" x-show="isUploading">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" :style="`width:${progress}%`"></div>
                            </div>
                        </div>

                        <form x-show="usUploading">
                            <div class="form-group">
                                <input type="file" wire:model="video_file">
                            </div>
                            @error('video_file')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </form>

                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading"></h4>
                                {{ $message }}
                                <p class="mb-0"></p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
