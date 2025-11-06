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
                <div class="flex items-center justify-center w-8 h-8 bg-indigo-600 text-white rounded-full text-sm font-semibold">✓</div>
                <span class="text-sm font-medium text-indigo-600">Media</span>
            </div>
            <div class="flex-1 h-0.5 bg-indigo-600 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center w-8 h-8 bg-indigo-600 text-white rounded-full text-sm font-semibold">3</div>
                <span class="text-sm font-medium text-indigo-600">Steps</span>
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
                <h2 class="text-2xl font-bold text-gray-900">Step Builder</h2>
                <p class="text-sm text-gray-600 mt-1">Create interactive tutorial steps with highlights</p>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium text-gray-900">Tutorial:</p>
                <p class="text-sm text-gray-600">{{ $tutorial->title }}</p>
            </div>
        </div>

        @if(!$showStepForm)
            <!-- Steps List -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tutorial Steps</h3>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">{{ count($steps) }} step(s)</span>
                        <button
                            wire:click="createStep"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors"
                        >
                            + Add Step
                        </button>
                    </div>
                </div>

                @if(count($steps) > 0)
                    <div
                        x-data="{
                            sortable: null,
                            init() {
                                this.sortable = new Sortable(this.$el, {
                                    animation: 150,
                                    handle: '.drag-handle',
                                    onEnd: (evt) => {
                                        const order = Array.from(this.$el.children).map((el, index) => {
                                            return parseInt(el.dataset.stepId);
                                        });
                                        @this.updateStepOrder(order);
                                    }
                                });
                            }
                        }"
                        class="space-y-4"
                    >
                        @foreach($steps as $index => $step)
                            <div
                                data-step-id="{{ $step['id'] }}"
                                class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4 flex-1">
                                        <div class="drag-handle cursor-move text-gray-400 hover:text-gray-600 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                                            </svg>
                                        </div>
                                        <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center font-semibold text-indigo-600">
                                            {{ $index + 1 }}
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">{{ $step['title'] }}</h4>
                                            @if(isset($step['media']) && $step['media'])
                                                <p class="text-sm text-gray-600 mt-1">📷 {{ $step['media']['name'] }}</p>
                                            @endif
                                            @if(isset($step['highlights']) && count($step['highlights']) > 0)
                                                <p class="text-sm text-gray-600 mt-1">✨ {{ count($step['highlights']) }} highlight(s)</p>
                                            @endif
                                            @if(isset($step['description']) && $step['description'])
                                                <p class="text-sm text-gray-500 mt-1">{{ Str::limit($step['description'], 100) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button
                                            wire:click="editStep({{ $step['id'] }})"
                                            class="p-2 text-indigo-600 hover:bg-indigo-50 rounded transition-colors"
                                            title="Edit Step"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button
                                            wire:click="deleteStep({{ $step['id'] }})"
                                            wire:confirm="Are you sure you want to delete this step?"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded transition-colors"
                                            title="Delete Step"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 border-2 border-dashed border-gray-300 rounded-lg">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="mt-2 text-gray-500">No steps created yet. Click "Add Step" to get started.</p>
                    </div>
                @endif
            </div>

            <!-- Navigation -->
            <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                <a
                    href="{{ route('tutorials.media', ['tutorial' => $tutorial->slug]) }}"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors"
                >
                    ← Back
                </a>
                @if(count($steps) > 0)
                    <button
                        wire:click="continueToPublish"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors"
                    >
                        Continue to Publish →
                    </button>
                @else
                    <div class="text-sm text-gray-500">Add at least one step to continue</div>
                @endif
            </div>
        @else
            <!-- Step Form -->
            <div class="space-y-6">
                <div class="flex justify-between items-center pb-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ $editingStep ? 'Edit Step' : 'Create New Step' }}
                    </h3>
                    <button
                        wire:click="cancelForm"
                        class="text-gray-500 hover:text-gray-700"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Select Image <span class="text-red-500">*</span>
                    </label>
                    <select
                        wire:model="formData.media_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('formData.media_id') border-red-300 @enderror"
                    >
                        <option value="">Select an image...</option>
                        @foreach($mediaItems as $media)
                            <option value="{{ $media->id }}">{{ $media->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.media_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @if($formData['media_id'])
                    @php
                        $selectedMedia = $mediaItems->firstWhere('id', $formData['media_id']);
                    @endphp
                    @if($selectedMedia)
                        <!-- Canvas Highlight Drawing -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Draw Highlights (Click and drag on the image to create highlight areas)
                            </label>
                            <div
                                x-data="highlightCanvas('{{ $selectedMedia->getUrl() }}')"
                                x-init="highlights = @entangle('formData.highlights')"
                                class="border border-gray-300 rounded-lg overflow-hidden bg-gray-50"
                            >
                                <div class="relative p-4">
                                    <img
                                        :src="imageUrl"
                                        id="step-image-{{ $editingStep ?: 'new' }}"
                                        class="max-w-full h-auto mx-auto rounded-lg shadow-md"
                                        @load="initCanvas"
                                    />
                                    <canvas
                                        x-ref="canvas"
                                        x-init="initCanvas()"
                                        class="absolute top-4 left-4 cursor-crosshair rounded-lg"
                                        style="pointer-events: auto;"
                                    ></canvas>
                                </div>
                                <div class="p-4 bg-white border-t">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-sm font-medium text-gray-700">Highlights: <span x-text="highlights.length" class="text-indigo-600"></span></span>
                                        <button
                                            @click="clearHighlights"
                                            class="text-sm text-red-600 hover:text-red-700 font-medium"
                                        >
                                            Clear All
                                        </button>
                                    </div>
                                    <div class="space-y-2 max-h-40 overflow-y-auto">
                                        <template x-for="(highlight, index) in highlights" :key="index">
                                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded border border-gray-200">
                                                <span class="text-sm text-gray-700">Highlight <span x-text="index + 1" class="font-semibold"></span></span>
                                                <button
                                                    @click="removeHighlight(index)"
                                                    class="text-red-600 hover:text-red-700 text-sm font-medium"
                                                >
                                                    Remove
                                                </button>
                                            </div>
                                        </template>
                                        <p x-show="highlights.length === 0" class="text-sm text-gray-500 text-center py-2">No highlights yet. Click and drag on the image above to create one.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Step Title <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        wire:model="formData.title"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('formData.title') border-red-300 @enderror"
                        placeholder="Enter step title..."
                        required
                    />
                    @error('formData.title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea
                        wire:model="formData.description"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter step description (optional)..."
                    ></textarea>
                    @error('formData.description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4 pt-4 border-t">
                    <button
                        wire:click="cancelForm"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors"
                    >
                        Cancel
                    </button>
                    <button
                        wire:click="saveStep"
                        wire:loading.attr="disabled"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                    >
                        <span wire:loading.remove>Save Step</span>
                        <span wire:loading>Saving...</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
function highlightCanvas(imageUrl) {
    return {
        imageUrl: imageUrl,
        highlights: [],
        canvas: null,
        ctx: null,
        img: null,
        isDrawing: false,
        startX: 0,
        startY: 0,
        currentRect: null,

        init() {
            this.$watch('highlights', () => {
                this.$nextTick(() => this.drawHighlights());
            }, { deep: true });
        },

        initCanvas() {
            this.$nextTick(() => {
                const canvas = this.$refs.canvas;
                const img = document.getElementById('step-image-{{ $editingStep ?: 'new' }}');
                
                if (!canvas || !img) return;

                const updateCanvas = () => {
                    const imgRect = img.getBoundingClientRect();
                    const containerRect = img.parentElement.getBoundingClientRect();
                    
                    canvas.width = img.clientWidth;
                    canvas.height = img.clientHeight;
                    canvas.style.left = (imgRect.left - containerRect.left) + 'px';
                    canvas.style.top = (imgRect.top - containerRect.top) + 'px';
                    
                    this.canvas = canvas;
                    this.ctx = canvas.getContext('2d');
                    this.img = img;

                    this.drawHighlights();
                    this.setupEventListeners();
                };

                if (img.complete) {
                    updateCanvas();
                } else {
                    img.addEventListener('load', updateCanvas);
                }
            });
        },

        setupEventListeners() {
            if (!this.canvas) return;

            this.canvas.addEventListener('mousedown', (e) => {
                const rect = this.canvas.getBoundingClientRect();
                this.startX = e.clientX - rect.left;
                this.startY = e.clientY - rect.top;
                this.isDrawing = true;
            });

            this.canvas.addEventListener('mousemove', (e) => {
                if (!this.isDrawing) return;
                
                const rect = this.canvas.getBoundingClientRect();
                const currentX = e.clientX - rect.left;
                const currentY = e.clientY - rect.top;
                
                this.currentRect = {
                    x: Math.min(this.startX, currentX),
                    y: Math.min(this.startY, currentY),
                    width: Math.abs(currentX - this.startX),
                    height: Math.abs(currentY - this.startY)
                };
                
                this.drawHighlights();
                this.drawRect(this.currentRect);
            });

            this.canvas.addEventListener('mouseup', () => {
                if (this.isDrawing && this.currentRect && this.currentRect.width > 5 && this.currentRect.height > 5) {
                    const imgRect = this.img.getBoundingClientRect();
                    const scaleX = this.img.naturalWidth / imgRect.width;
                    const scaleY = this.img.naturalHeight / imgRect.height;
                    
                    const newHighlight = {
                        x: this.currentRect.x * scaleX,
                        y: this.currentRect.y * scaleY,
                        width: this.currentRect.width * scaleX,
                        height: this.currentRect.height * scaleY,
                        data: {}
                    };
                    
                    if (!this.highlights) {
                        this.highlights = [];
                    }
                    this.highlights.push(newHighlight);
                    
                    this.isDrawing = false;
                    this.currentRect = null;
                    this.drawHighlights();
                } else {
                    this.isDrawing = false;
                    this.currentRect = null;
                    this.drawHighlights();
                }
            });
        },

        drawHighlights() {
            if (!this.ctx || !this.canvas || !this.img) return;
            
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            
            if (!this.highlights || this.highlights.length === 0) return;
            
            const imgRect = this.img.getBoundingClientRect();
            const scaleX = this.img.clientWidth / this.img.naturalWidth;
            const scaleY = this.img.clientHeight / this.img.naturalHeight;

            this.highlights.forEach(highlight => {
                if (highlight && highlight.x !== undefined) {
                    this.drawRect({
                        x: highlight.x * scaleX,
                        y: highlight.y * scaleY,
                        width: highlight.width * scaleX,
                        height: highlight.height * scaleY
                    });
                }
            });
        },

        drawRect(rect) {
            if (!this.ctx) return;
            
            this.ctx.strokeStyle = '#3B82F6';
            this.ctx.lineWidth = 3;
            this.ctx.strokeRect(rect.x, rect.y, rect.width, rect.height);
            
            this.ctx.fillStyle = 'rgba(59, 130, 246, 0.2)';
            this.ctx.fillRect(rect.x, rect.y, rect.width, rect.height);
        },

        removeHighlight(index) {
            if (this.highlights && this.highlights[index]) {
                this.highlights.splice(index, 1);
                this.drawHighlights();
            }
        },

        clearHighlights() {
            if (confirm('Are you sure you want to clear all highlights?')) {
                this.highlights = [];
                this.drawHighlights();
            }
        }
    }
}
</script>
@endpush
