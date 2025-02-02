<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-plus-circle mr-2"></i>Add a Program
        </div>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('custom_css/easymde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom_css/custom-easymde.css') }}">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="mt-16">
            <div class="block p-6 bg-white dark:bg-gray-800/50 rounded-lg shadow-2xl">
                <h2 class="text-2xl font-semibold text-yellow-700 dark:text-yellow-400 mb-4">
                    <i class="fas fa-book-open mr-2"></i><strong>Add a New Program</strong>
                </h2>
                <hr class="mb-4">
                
                <form action="{{ route('admin.program.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="programName" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i class="fas fa-clipboard-list mr-2"></i>Program Name
                        </label>
                        <input type="text" id="programName" name="programName" value="{{ old('programName') }}" class="@error('programName') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:text-gray-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                        @error('programName')
                            <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 @error('description') is-invalid @enderror">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i class="fas fa-align-left mr-2"></i>Program Description
                        </label>
                        <textarea id="writeup-editor" name="description"></textarea>
                        @error('description')
                            <div class="w-64 p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-primary-button class="ms-3">
                        <i class="fas fa-paper-plane mr-2"></i>{{ __('Submit') }}
                    </x-primary-button>
                </form>                
            </div>
        </div>
    </div>
    <script src="{{ asset('js/easymde.min.js') }}"></script>
    <script>
        var easyMDE = new EasyMDE({
            element: document.getElementById('writeup-editor')
        });
    </script>
</x-app-layout>
