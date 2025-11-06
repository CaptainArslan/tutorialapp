<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
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
                <div class="flex items-center justify-center w-8 h-8 bg-indigo-600 text-white rounded-full text-sm font-semibold">✓</div>
                <span class="text-sm font-medium text-indigo-600">Steps</span>
            </div>
            <div class="flex-1 h-0.5 bg-indigo-600 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div class="flex items-center justify-center w-8 h-8 bg-green-600 text-white rounded-full text-sm font-semibold">4</div>
                <span class="text-sm font-medium text-green-600">Publish</span>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Publish Tutorial</h2>
            <p class="text-sm text-gray-600">Review your tutorial before publishing</p>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $tutorial->title }}</h3>
            <p class="text-sm text-gray-600 mb-6">
                <span class="font-medium">URL:</span> 
                <code class="bg-gray-100 px-2 py-1 rounded">{{ route('tutorials.show', ['tutorial' => $tutorial->slug]) }}</code>
            </p>

            <!-- Cover Image -->
            @if($tutorial->cover_image)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Cover Image</h4>
                    <img
                        src="{{ $tutorial->cover_image->getUrl() }}"
                        alt="Cover"
                        class="w-full max-w-md rounded-lg shadow-md border border-gray-200"
                    />
                </div>
            @endif

            <!-- Steps Preview -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h4 class="text-lg font-semibold text-gray-900">Steps Preview</h4>
                    <span class="text-sm text-gray-600">{{ $tutorial->steps->count() }} step(s)</span>
                </div>
                
                @if($tutorial->steps->count() > 0)
                    @foreach($tutorial->steps as $index => $step)
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-300 transition-colors">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center font-semibold text-indigo-600">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1">
                                    <h5 class="font-semibold text-gray-900 mb-2">{{ $step->title }}</h5>
                                    @if($step->description)
                                        <p class="text-gray-600 mb-3 whitespace-pre-wrap">{{ $step->description }}</p>
                                    @endif
                                    @if($step->media)
                                        <div class="mb-3">
                                            <img
                                                src="{{ $step->media->getUrl() }}"
                                                alt="{{ $step->media->name }}"
                                                class="max-w-xs rounded-lg shadow-sm border border-gray-200"
                                            />
                                        </div>
                                    @endif
                                    @if($step->highlights->count() > 0)
                                        <div class="flex items-center space-x-2 text-sm text-gray-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                            </svg>
                                            <span>{{ $step->highlights->count() }} highlight(s)</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-8 border-2 border-dashed border-gray-300 rounded-lg">
                        <p class="text-gray-500">No steps added yet</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-between items-center pt-6 border-t border-gray-200">
            <a
                href="{{ route('tutorials.steps', ['tutorial' => $tutorial->slug]) }}"
                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors"
            >
                ← Back to Steps
            </a>
            <div class="flex space-x-4">
                <a
                    href="{{ route('tutorials.show', ['tutorial' => $tutorial->slug]) }}"
                    target="_blank"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors"
                >
                    Preview
                </a>
                <button
                    wire:click="publish"
                    wire:loading.attr="disabled"
                    class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                >
                    <span wire:loading.remove>🚀 Publish Tutorial</span>
                    <span wire:loading>Publishing...</span>
                </button>
            </div>
        </div>
    </div>
</div>
