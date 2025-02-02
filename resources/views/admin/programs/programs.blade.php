<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-cogs mr-2"></i>{{ __('Programs') }}
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
            padding: 10px;
            color: #f3f4f6;
        }
        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter, 
        .dataTables_wrapper .dataTables_info, 
        .dataTables_wrapper .dataTables_processing, 
        .dataTables_wrapper .dataTables_paginate {
            color: #4ade80;
        }
        .dataTables_wrapper .dataTables_length select, 
        .dataTables_wrapper .dataTables_filter input {
            background-color: #1f2937 !important;
            color: #ffffff;
            padding: 8px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #3bde77 !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #1f2937;
            color: #43de80 !important;
            border-radius: 4px;
        }
        .table-container {
            background-color: #1f2937;
            border-radius: 8px;
            overflow: hidden;
        }
        .table-header {
            background-color: #2d3748;
        }
        .table-header th {
            color: #ffffff;
        }
        .action-btn {
            background-color: transparent;
            border: 1px solid #4ade80;
            color: #4ade80;
            padding: 5px 12px;
            font-weight: 600;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .action-btn:hover {
            background-color: #4ade80;
            color: #ffffff;
        }
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
        .badge-yellow {
            background-color: #facc15;
            color: #1f2937;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <i class="fas fa-check-circle mr-2"></i><span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Card Container -->
            <div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    @if(session('status'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                            <span class="font-medium">{{ session('status') }}</span>
                        </div>
                    @endif
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-list mr-2"></i>Total Programs: 
                            <span class="badge badge-yellow">{{ $programs->count() }}</span>
                        </p>
                    </div>
                    <div class="table-container p-6 border-spacing-0.5">
                        <table id="programsTable" class="table-auto w-full border-collapse">
                            <thead class="table-header">
                                <tr>
                                    <th class="px-4 py-2 border border-slate-400">
                                        <i class="fas fa-project-diagram mr-2"></i>Program Name
                                    </th>
                                    <th class="px-4 py-2 border border-slate-400">
                                        <i class="fas fa-tools mr-2"></i>Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $programs)
                                    <tr class="bg-white dark:bg-gray-700">
                                        <td class="border px-4 py-2">{{ $programs->programName }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('admin.program.view', $programs->uid) }}" class="action-btn mr-2">
                                                <i class="fas fa-eye mr-2"></i>View
                                            </a>
                                            <a href="{{ route('admin.program.edit', $programs->uid) }}" class="action-btn mr-2">
                                                <i class="fas fa-edit mr-2"></i>Edit
                                            </a>
                                            <form action="{{ route('admin.program.delete', $programs->uid) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn text-red-400 border-red-400 hover:bg-red-400 hover:text-white" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash-alt mr-1"></i>Delete
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
            $('#programsTable').DataTable({
                "paging": true,          // Enable pagination
                "ordering": true,        // Enable sorting
                "searching": true,       // Enable search box
                "info": true,            // Show information
                "responsive": true       // Make table responsive
            });
        });
    </script>
</x-app-layout>
