<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg p-6">
        <!-- Tutorial Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $tutorial->title }}</h1>
            <p class="text-gray-600">By {{ $tutorial->user->name }}</p>
        </div>

        @if($currentStep)
            <!-- Step Navigation -->
            <div class="mb-6 flex items-center justify-between">
                <button
                    wire:click="previousStep"
                    @if($currentStepIndex === 0) disabled @endif
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Previous
                </button>
                <span class="text-sm text-gray-600">
                    Step {{ $currentStepIndex + 1 }} of {{ count($tutorial->steps) }}
                </span>
                <button
                    wire:click="nextStep"
                    @if($currentStepIndex >= count($tutorial->steps) - 1) disabled @endif
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Next
                </button>
            </div>

            <!-- Step Content -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">{{ $currentStep->title }}</h2>
                
                @if($currentStep->description)
                    <div class="prose max-w-none mb-6">
                        {!! nl2br(e($currentStep->description)) !!}
                    </div>
                @endif

                @if($currentStep->media)
                    <div class="relative mb-6">
                        <img
                            src="{{ $currentStep->media->getUrl() }}"
                            alt="{{ $currentStep->media->name }}"
                            class="w-full rounded-lg shadow-md"
                            id="tutorial-image-{{ $currentStepIndex }}"
                        />
                        @if($currentStep->highlights->count() > 0)
                            <canvas
                                x-data="viewerCanvas({{ $currentStep->media->getUrl() }}, @js($currentStep->highlights->map(function($h) { return ['x' => $h->x, 'y' => $h->y, 'width' => $h->width, 'height' => $h->height]; })->toArray()))"
                                class="absolute top-0 left-0"
                                style="pointer-events: none;"
                            ></canvas>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Step Indicators -->
            <div class="flex flex-wrap gap-2 justify-center">
                @foreach($tutorial->steps as $index => $step)
                    <button
                        wire:click="goToStep({{ $index }})"
                        class="px-3 py-1 rounded-md text-sm font-medium transition-colors {{ $index === $currentStepIndex ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}"
                    >
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-8">No steps available.</p>
        @endif
    </div>
</div>

@push('scripts')
<script>
function viewerCanvas(imageUrl, highlights) {
    return {
        imageUrl: imageUrl,
        highlights: highlights,
        canvas: null,
        ctx: null,
        img: null,

        init() {
            this.$nextTick(() => {
                const canvas = this.$el;
                const img = document.getElementById('tutorial-image-{{ $currentStepIndex }}');
                
                if (!canvas || !img) return;

                const updateCanvas = () => {
                    canvas.width = img.clientWidth;
                    canvas.height = img.clientHeight;
                    this.canvas = canvas;
                    this.ctx = canvas.getContext('2d');
                    this.img = img;
                    this.drawHighlights();
                };

                if (img.complete) {
                    updateCanvas();
                } else {
                    img.addEventListener('load', updateCanvas);
                }
            });
        },

        drawHighlights() {
            if (!this.ctx || !this.canvas || !this.img) return;
            
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            
            const imgRect = this.img.getBoundingClientRect();
            const scaleX = this.img.clientWidth / this.img.naturalWidth;
            const scaleY = this.img.clientHeight / this.img.naturalHeight;

            this.highlights.forEach(highlight => {
                this.drawRect({
                    x: highlight.x * scaleX,
                    y: highlight.y * scaleY,
                    width: highlight.width * scaleX,
                    height: highlight.height * scaleY
                });
            });
        },

        drawRect(rect) {
            if (!this.ctx) return;
            
            this.ctx.strokeStyle = '#EF4444';
            this.ctx.lineWidth = 3;
            this.ctx.strokeRect(rect.x, rect.y, rect.width, rect.height);
            
            this.ctx.fillStyle = 'rgba(239, 68, 68, 0.3)';
            this.ctx.fillRect(rect.x, rect.y, rect.width, rect.height);
        }
    }
}
</script>
@endpush
