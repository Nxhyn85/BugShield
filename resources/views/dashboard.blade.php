<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <i class="fas fa-check-circle mr-2"></i><span class="font-medium">{{ session('success') }}</span>
            </div>
            @endif

            <!-- Card Container -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- User Info Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            <i class="fas fa-user-circle mr-2"></i>Welcome,
                            <span class="text-green-400 dark:text-green-400 font-bold">{{ $current_user->name }}</span>
                        </h3>
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-cogs mr-2"></i>Points: {{ $current_user->points }}
                        </p>
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-trophy mr-2"></i>Rank: #{{ $rank }}
                        </p>
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-clipboard-list mr-2"></i>Total Reports: {{ $current_user->total_reports }}
                        </p>
                    </div>
                </div>

                <!-- Hacktivity Card -->
                <div class="bg-white row-span-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <h2 class="text-2xl font-semibold text-yellow-700 dark:text-yellow-400 mb-4">
                            <i class="fas fa-bug mr-2"></i><strong>Hacktivity</strong>
                        </h2>
                        <hr class="border-t border-gray-300 dark:border-gray-600">

                        @if ($reports->count() > 0)
                        @foreach ($reports as $report)
                        <div class="m-4">
                            <table class="w-full">
                                <tr>
                                    <td class="w-4/5">
                                        <a href="{{ route('report.show', $report->uid) }}" class="text-xl font-semibold text-green-400 dark:text-green-400 hover:underline">
                                            <i class="fas fa-link mr-2"></i>{{ $report->title }}
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-sm text-gray-400">Reported to <strong class="text-purple-400">{{ ucfirst($report->program_name) }}</strong> at <strong>{{ $report->created_at }}</strong></span>
                                    </td>
                                </tr>
                            </table>
                            <p class="text-sm text-gray-400">
                                <strong>
                                    <i class="fa-solid fa-shield-halved mr-2"></i>Severity: <span class="{{ \App\Helpers\ReportHelper::getSeverityColor($report->severity) }}">{{ ucfirst($report->severity) }}</span>
                                </strong><br>
                                <strong>
                                    <i class="fas fa-tasks mr-2"></i>Status: <span class="{{ \App\Helpers\ReportHelper::getStatusColor($report->status) }}">{{ ucfirst($report->status) }}</span>
                                </strong><br>
                                <strong>
                                    <i class="fas fa-user mr-2"></i>Submitted By: <span class="text-green-600">{{ $report->user->username }}</span>
                                </strong><br>
                                <strong>
                                    <i class="fas fa-coins mr-2"></i>Points: <span class="text-green-600">{{ $report->points }}</span>
                                </strong>
                            </p>
                            <hr class="border-t border-gray-300 dark:border-gray-600">
                        </div>
                        @endforeach

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $reports->links() }}
                        </div>

                        @else
                        <p class="text-green-400 dark:text-green-400 mt-2">
                            <i class="fas fa-info-circle mr-2"></i>No reports submitted yet.
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>