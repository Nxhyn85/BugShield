<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-user-plus mr-2"></i>{{ __('Add Admin') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 w-full">
            <!-- Card Container -->
            <div class="flex justify-center">
                <!-- Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full max-w-2xl">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <h2 class="text-2xl font-semibold text-yellow-700 dark:text-yellow-400 mb-4">
                            <i class="fas fa-user-shield mr-2"></i><strong>Add a New Admin</strong>
                        </h2>
                        <hr class="mb-4">

                        <form action="{{ route('admin.store') }}" method="post">
                            @csrf
                            @method('POST')
                        
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium">
                                    <i class="fas fa-user mr-2"></i>Name
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('name')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium">
                                    <i class="fas fa-user-tag mr-2"></i>Username
                                </label>
                                <input type="text" id="username" name="username" value="{{ old('username') }}" class="@error('username') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('username')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium">
                                    <i class="fas fa-envelope mr-2"></i>Email
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('email')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium">
                                    <i class="fas fa-lock mr-2"></i>Password
                                </label>
                                <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('password')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <x-primary-button class="mt-2">
                                <i class="fas fa-paper-plane mr-2"></i>{{ __('Submit') }}
                            </x-primary-button>
                        </form>                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
