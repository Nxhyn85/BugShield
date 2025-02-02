<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Submit Report
        </div>
    </x-slot>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <link rel="stylesheet" href="{{ asset('custom_css/custom-easymde.css') }}">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="mt-16">
            <div class="block p-6 bg-white dark:bg-gray-800/50 rounded-lg shadow-2xl">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="@error('title') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:text-gray-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                        @error('title')
                            <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="programName" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Program Name</label>
                        <input type="text" id="programName" name="programName" value="{{ $program->programName }}" class="@error('programName') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:text-gray-200 dark:focus:ring-blue-200 rounded-md shadow-sm" readonly>
                        @error('programName')
                            <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="severity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Severity</label>
                        <select name="severity" id="severity" name="severity" class="@error('severity') is-invalid @enderror mt-1 block border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:text-gray-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                            <option value="null">----- Select Severity -----</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="critical">Critical</option>
                        </select>
                        @error('severity')
                            <div class="w-64 p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 @error('description') is-invalid @enderror">
                        <textarea id="writeup-editor" name="description"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script>
        var easyMDE = new EasyMDE({
            element: document.getElementById('writeup-editor')
        });
    </script>
    
</x-app-layout>
