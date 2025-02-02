<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-users mr-2"></i>{{ __('Users') }}
        </h2>
    </x-slot>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <style>
        table.dataTable tbody tr {
            background-color: #1f2937;
        }
        table.dataTable tbody td {
            padding: 10px 10px;
        }
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: #4ade80;
        }

        .dataTables_wrapper .dataTables_length select .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
            background-color: #1f2937 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #43de80 !important;
            background: #1f2937;
        }
        .dataTables_wrapper .dataTables_filter input {
            margin-bottom: 10px;
        }
        .dataTables_wrapper .dataTables_length select {
            background-color: #1f2937 !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #3bde77 !important;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('status'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <i class="fas fa-check-circle mr-2"></i><span class="font-medium">{{ session('status') }}</span>
                </div>
            @endif

            <!-- Card Container -->
            <div class="">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-users mr-2"></i>Total Users: <span class="text-yellow-400">{{ $users->count() }}</span>
                        </p>
                    </div>
                    <div class="text-green-400 dark:text-green-400 p-6 border-spacing-0.5">
                        <table id="usersTable" class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-800">
                                    <th class="px-4 py-2 border border-slate-400"><i class="fas fa-user-circle mr-2"></i>Name</th>
                                    <th class="px-4 py-2 border border-slate-400"><i class="fas fa-user-tag mr-2"></i>Username</th>
                                    <th class="px-4 py-2 border border-slate-400"><i class="fas fa-coins mr-2"></i>Points</th>
                                    <th class="px-4 py-2 border border-slate-400"><i class="fas fa-trophy mr-2"></i>Rank</th>
                                    <th class="px-4 py-2 border border-slate-400"><i class="fas fa-flag-checkered mr-2"></i>Total Reports</th>
                                    <th class="px-4 py-2 border border-slate-400"><i class="fas fa-cogs mr-2"></i>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white dark:bg-gray-700">
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->username }}</td>
                                    <td class="border px-4 py-2">{{ $user->points }}</td>
                                    <td class="border px-4 py-2">{{ $user->rank }}</td>
                                    <td class="border px-4 py-2">{{ $user->total_reports }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('admin.users.edit', $user->uid) }}" class="ml-2 text-green-400 dark:text-green-400 hover:underline bg-transparent hover:bg-green-100 text-xs font-semibold py-2 px-4 border border-green-400 dark:border-green-400 rounded">
                                            <i class="fas fa-edit mr-2"></i>Edit
                                        </a>
                                        <form action="{{ route('admin.users.delete', $user->uid) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 dark:text-red-400 hover:underline bg-transparent hover:bg-red-100 text-xs font-semibold py-2 px-4 border border-red-400 dark:border-red-400 rounded" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash-alt mr-2"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                "paging": true,          // Enable pagination
                "ordering": true,        // Enable sorting
                "searching": true,       // Enable search box
                "info": true,            // Show information
                "responsive": true       // Make table responsive
            });
        });
    </script>
</x-app-layout>
