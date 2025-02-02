<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-trophy text-yellow-500"></i> {{ __('Leaderboard') }}
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
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #43de80 !important;
            background: #1f2937;
        }
        .dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select {
            background-color: #1f2937 !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #3bde77 !important;
        }
        .icon {
            margin-right: 5px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-users icon text-yellow-400"></i> Total Users: <span class="text-yellow-400">{{ $users->count() }}</span>
                        </p>
                    </div>
                    <div class="text-green-400 dark:text-green-400 p-6 border-spacing-0.5">
                        <table id="adminsTable" class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-800">
                                    <th class="px-4 py-2 border border-slate-400">
                                        <i class="fas fa-sort-numeric-down icon"></i> Rank
                                    </th>
                                    <th class="px-4 py-2 border border-slate-400">
                                        <i class="fas fa-user icon"></i> Name
                                    </th>
                                    <th class="px-4 py-2 border border-slate-400">
                                        <i class="fas fa-user-tag icon"></i> Username
                                    </th>
                                    <th class="px-4 py-2 border border-slate-400">
                                        <i class="fas fa-star icon"></i> Points
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white dark:bg-gray-700 text-center">
                                        <td class="border px-4 py-2">#{{ $user->rank }}</td>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->username }}</td>
                                        <td class="border px-4 py-2">{{ $user->points }}</td>
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
            $('#adminsTable').DataTable({
                "paging": true,
                "ordering": true,
                "searching": true,
                "info": true,
                "responsive": true
            });
        });
    </script>
</x-app-layout>
