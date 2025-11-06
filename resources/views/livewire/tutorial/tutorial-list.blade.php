<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Published Tutorials</h1>
        <p class="mt-2 text-gray-600">Browse our collection of tutorials</p>
    </div>

    @if($tutorials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($tutorials as $tutorial)
                <a
                    href="{{ route('tutorials.show', ['tutorial' => $tutorial->slug]) }}"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow"
                >
                    @if($tutorial->cover_image)
                        <img
                            src="{{ $tutorial->cover_image->getUrl() }}"
                            alt="{{ $tutorial->title }}"
                            class="w-full h-48 object-cover"
                        />
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $tutorial->title }}</h3>
                        <p class="text-sm text-gray-600">By {{ $tutorial->user->name }}</p>
                        <p class="text-sm text-gray-500 mt-2">{{ $tutorial->steps->count() }} step(s)</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $tutorials->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No tutorials</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new tutorial.</p>
        </div>
    @endif
</div>
