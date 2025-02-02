<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">
            <!-- Card Container -->
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Card 2 -->
                <div class="bg-white row-span-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                    <!-- Session Message -->
                    @if (session('status'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                            <span class="font-medium">{{ session('status') }}</span>
                        </div>
                    @endif

                    <!-- Card Content -->
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <h2 class="text-2xl font-semibold text-yellow-700 dark:text-yellow-400 mb-2"><strong>Edit Admin Details</strong></h2>
                        <hr>

                        <form action="{{ route('admin.update', $admin->uid) }}" method="post">
                            @csrf
                            @method('PUT')
                        
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium">Name</label>
                                <input type="text" id="name" name="name" value="{{ $admin->name }}" class="@error('name') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('name')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium">Username</label>
                                <input type="text" id="username" name="username" value="{{ $admin->username }}" class="@error('username') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('username')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium">Email</label>
                                <input type="email" id="email" name="email" value="{{ $admin->email }}" class="@error('email') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('email')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium">Password</label>
                                <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('password')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <x-primary-button class="mt-2">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </form>                        
                        
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</x-app-layout>
