<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center w-8 h-8 bg-indigo-600 text-white rounded-full text-sm font-semibold">✓</div>
                <span class="text-sm font-medium text-indigo-600">Basic Info</span>
            </div>
            <div class="flex-1 h-0.5 bg-indigo-600 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center w-8 h-8 bg-indigo-600 text-white rounded-full text-sm font-semibold">2</div>
                <span class="text-sm font-medium text-indigo-600">Media</span>
            </div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">3</div>
                <span class="text-sm font-medium text-gray-500">Steps</span>
            </div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">4</div>
                <span class="text-sm font-medium text-gray-500">Publish</span>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Media Manager</h2>
                <p class="text-sm text-gray-600 mt-1">Upload images for your tutorial</p>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-900">Tutorial:</p>
                <p class="text-sm text-gray-600">{{ $tutorial->title }}</p>
            </div>
        </div>

        <!-- Upload Section -->
        <div class="mb-8 p-6 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Upload Images
            </label>
            <p class="text-xs text-gray-500 mb-4">Select one or more images to upload (Max 10MB per image)</p>
            
            @if (session()->has('error'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif
            
            @if (session()->has('message'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif
            
            <input
                type="file"
                wire:model="uploads"
                multiple
                accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
            />
            @error('uploads.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @if(!empty($uploads) && count($uploads) > 0)
                <p class="mt-2 text-sm text-gray-600">{{ count($uploads) }} file(s) selected</p>
            @endif
            <button
                type="button"
                wire:click="upload"
                wire:loading.attr="disabled"
                @disabled(empty($uploads) || count($uploads) == 0)
                class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
            >
                <span wire:loading.remove>Upload Files</span>
                <span wire:loading>Uploading...</span>
            </button>
        </div>

        <!-- Media Grid -->
        <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Uploaded Media</h3>
                @if(count($mediaItems) > 0)
                    <span class="text-sm text-gray-600">{{ count($mediaItems) }} image(s)</span>
                @endif
            </div>
            @if(count($mediaItems) > 0)
                <div
                    x-data="{
                        sortable: null,
                        init() {
                            this.$nextTick(() => {
                                this.initSortable();
                            });
                        },
                        initSortable() {
                            if (typeof Sortable !== 'undefined' && this.$el) {
                                if (this.sortable) {
                                    this.sortable.destroy();
                                }
                                this.sortable = new Sortable(this.$el, {
                                    animation: 150,
                                    handle: '.drag-handle',
                                    onEnd: (evt) => {
                                        if (typeof $wire !== 'undefined' && $wire.updateMediaOrder) {
                                            const order = Array.from(this.$el.children).map((el) => {
                                                return parseInt(el.dataset.mediaId);
                                            }).filter(id => !isNaN(id));
                                            $wire.updateMediaOrder(order);
                                        }
                                    }
                                });
                            }
                        }
                    }"
                    x-on:media-uploaded.window="$nextTick(() => initSortable())"
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"
                >
                    @foreach($mediaItems as $media)
                        <div
                            data-media-id="{{ $media['id'] }}"
                            class="relative group bg-gray-100 rounded-lg overflow-hidden aspect-square border-2 border-transparent hover:border-indigo-300 transition-colors"
                        >
                            <img
                                src="{{ $media['url'] }}"
                                alt="{{ $media['name'] }}"
                                class="w-full h-full object-cover"
                            />
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity flex items-center justify-center">
                                <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button
                                        wire:click="deleteMedia({{ $media['id'] }})"
                                        wire:confirm="Are you sure you want to delete this image?"
                                        class="p-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors"
                                        title="Delete"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    <div class="drag-handle p-2 bg-gray-600 text-white rounded cursor-move" title="Drag to reorder">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-75 text-white text-xs p-2 truncate">
                                {{ $media['name'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 border-2 border-dashed border-gray-300 rounded-lg">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="mt-2 text-gray-500">No media uploaded yet. Upload images to get started.</p>
                </div>
            @endif
        </div>

        <!-- Navigation -->
        <div class="flex justify-between items-center pt-6 border-t border-gray-200">
            <a
                href="{{ $tutorial ? route('tutorials.edit', ['tutorial' => $tutorial->slug]) : route('tutorials.create') }}"
                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors"
            >
                ← Back
            </a>
            <button
                wire:click="continueToSteps"
                @disabled(empty($mediaItems) || count($mediaItems) == 0)
                class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
            >
                Continue to Step Builder →
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
@endpush
