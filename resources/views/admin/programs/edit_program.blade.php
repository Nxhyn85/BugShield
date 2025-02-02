<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Program
        </div>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('custom_css/easymde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom_css/custom-easymde.css') }}">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="mt-16">
            <div class="block p-6 bg-white dark:bg-gray-800/50 rounded-lg shadow-2xl">
                <h2 class="text-2xl font-semibold text-yellow-700 dark:text-yellow-400 mb-2"><strong>Edit Program Details</strong></h2>
                <hr><br>
                <form action="{{ route('admin.program.update', ['uid' => $program['uid']]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="uid" value="{{ $program->uid }}">
                    <div class="mb-4">
                        <label for="programName" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Program name</label>
                        <input type="text" id="programName" name="programName" value="{{ $program->programName }}" class="@error('programName') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:text-gray-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                        @error('programName')
                            <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 @error('description') is-invalid @enderror">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Program Description</label>
                        <textarea id="writeup-editor" name="description">{{ $program->description }}</textarea>
                        @error('description')
                            <div class="w-64 p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-primary-button class="ms-3">
                        {{ __('Submit') }}
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
