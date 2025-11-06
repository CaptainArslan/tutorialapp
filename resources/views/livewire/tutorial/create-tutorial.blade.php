<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div
                    class="flex items-center justify-center w-8 h-8 bg-indigo-600 text-white rounded-full text-sm font-semibold">
                    1</div>
                <span class="text-sm font-medium text-indigo-600">Basic Info</span>
            </div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div
                    class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">
                    2</div>
                <span class="text-sm font-medium text-gray-500">Media</span>
            </div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div
                    class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">
                    3</div>
                <span class="text-sm font-medium text-gray-500">Steps</span>
            </div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-4"></div>
            <div class="flex items-center space-x-2">
                <div
                    class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">
                    4</div>
                <span class="text-sm font-medium text-gray-500">Publish</span>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">
                @if ($tutorial)
                    Edit Tutorial
                @else
                    Create New Tutorial
                @endif
            </h2>
            <p class="text-sm text-gray-600 mt-1">Start by giving your tutorial a title</p>
        </div>

        <form wire:submit.prevent="save">
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Tutorial Title <span class="text-red-500">*</span>
                </label>
                <input type="text" id="title" wire:model.live.debounce.300ms="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                    focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-300 @enderror"
                    placeholder="Enter tutorial title..." required />
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                    URL Slug (auto-generated)
                </label>
                <input type="text" id="slug" wire:model="slug"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-600 font-mono"
                    readonly placeholder="Slug will appear here..." />
                <p class="mt-1 text-xs text-gray-500">
                    This will be used in the URL:
                    <span class="font-mono text-indigo-600">/tutorials/{{ $slug ?: 'your-slug' }}</span>
                </p>
            </div>

            <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" wire:loading.attr="disabled"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                    <span wire:loading.remove>{{ $tutorial ? 'Update & Continue' : 'Create & Continue' }}</span>
                    <span wire:loading>Saving...</span>
                </button>
            </div>
        </form>
    </div>
</div>
