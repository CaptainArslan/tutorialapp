<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a
                href="{{ route('tutorials.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
            >
                Create Tutorial
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">My Tutorials</h3>
                    
                    @php
                        $myTutorials = \App\Models\Tutorial::where('user_id', auth()->id())
                            ->latest()
                            ->get();
                    @endphp

                    @if($myTutorials->count() > 0)
                        <div class="space-y-4">
                            @foreach($myTutorials as $tutorial)
                                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">{{ $tutorial->title }}</h4>
                                            <p class="text-sm text-gray-600">
                                                Status: 
                                                <span class="px-2 py-1 rounded text-xs {{ $tutorial->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ ucfirst($tutorial->status) }}
                                                </span>
                                            </p>
                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $tutorial->steps->count() }} step(s) • 
                                                Created {{ $tutorial->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="flex space-x-2">
                                            @if($tutorial->status === 'published')
                                                <a
                                                    href="{{ route('tutorials.show', ['tutorial' => $tutorial->slug]) }}"
                                                    class="px-3 py-1 text-sm bg-indigo-100 text-indigo-700 rounded hover:bg-indigo-200"
                                                >
                                                    View
                                                </a>
                                            @endif
                                            <a
                                                href="{{ route('tutorials.edit', ['tutorial' => $tutorial->slug]) }}"
                                                class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200"
                                            >
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No tutorials</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new tutorial.</p>
                            <div class="mt-6">
                                <a
                                    href="{{ route('tutorials.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                                >
                                    Create Tutorial
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
