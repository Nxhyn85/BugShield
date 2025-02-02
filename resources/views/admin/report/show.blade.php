<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-flag mr-2"></i>{{ __('Report') }}
        </h2>
    </x-slot>

    <!-- Include Styles and Scripts -->
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.4.1/dist/typography.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/514720fb81.js" crossorigin="anonymous"></script>

    <style>
        .prose {
            color: #1F2937;
            max-width: 100ch;
        }

        .prose pre {
            color: #E5E7EB;
            background-color: #1F2937;
            padding: 10px;
            border-radius: 5px;
        }

        .prose code {
            color: #60A5FA;
            background-color: #1F2937;
            padding: 5px;
            border-radius: 3px;
        }

        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            color: #F59E0B;
        }

        .prose strong {
            color: #10B981;
        }

        .prose p {
            color: #F87171;
        }

        .prose ul, .prose ol {
            color: #FCA5A5;
        }

        .prose a {
            color: #3B82F6;
            text-decoration: underline;
        }

        .icon-label {
            display: flex;
            align-items: center;
        }

        .icon-label i {
            margin-right: 5px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Main Content Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                    <div class="p-6 text-green-500 dark:text-green-300">
                        <p class="text-xl font-semibold text-green-600 dark:text-green-400 mb-2">
                            <i class="fas fa-file-alt mr-2"></i>{{ $report->title }}
                        </p>
                        <hr>
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-user mr-2"></i><strong>{{ $report->user->username }}</strong> submitted a report.
                        </span>
                        <article class="text-white prose dynamic-prose mt-4" id="htmlOutput">{!! $htmlOutput !!}</article>
                    </div>
                </div>

                <!-- Details Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-green-500 dark:text-green-300">
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-2"></i>Reported at {{ $report->created_at }}
                        </span>
                        <hr class="my-4">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-user-tie mr-2"></i>Reporter: {{ $report->user->username }}
                        </h2>
                        <p class="mt-2">
                            <i class="fas fa-clipboard-list mr-2"></i>Program: <span class="text-purple-500">{{ ucfirst($report->program_name) }}</span>
                        </p>
                        <p class="mt-2">
                            <i class="fas fa-exclamation-circle mr-2"></i>Severity: 
                            <span class="{{ $report->severityColor }}"><strong>{{ ucfirst($report->severity) }}</strong></span>
                        </p>
                        <p class="mt-2">
                            <i class="fas fa-info-circle mr-2"></i>Status: 
                            <span class="{{ $report->statusColor }}"><strong>{{ ucfirst($report->status) }}</strong></span>
                        </p>
                        <p class="mt-2">
                            <i class="fas fa-trophy mr-2"></i>Points: <span class="text-green-500"><strong>{{ $report->points }}</strong></span>
                        </p>
                        
                        <!-- Update Report Form -->
                        <form action="{{ route('admin.report.update', $report->uid) }}" method="post" class="mt-6">
                            @csrf
                            @method('POST')

                            <div class="mb-4">
                                <label for="severity" class="block text-m font-medium icon-label">
                                    <i class="fas fa-exclamation-triangle"></i>Update Severity
                                </label>
                                <select name="severity" id="severity" class="@error('severity') is-invalid @enderror mt-1 block border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
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

                            <div class="mb-4">
                                <label for="status" class="block text-m font-medium icon-label">
                                    <i class="fas fa-toggle-on"></i>Update Status
                                </label>
                                <select name="status" id="status" class="@error('status') is-invalid @enderror mt-1 block border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                    <option value="null">----- Select Status -----</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="not applicable">Not Applicable</option>
                                    <option value="informative">Informative</option>
                                </select>
                                @error('status')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="points" class="block text-m font-medium icon-label">
                                    <i class="fas fa-plus-circle"></i>Add Points
                                </label>
                                <input type="text" id="points" name="points" value="{{ old('points') }}" class="@error('points') is-invalid @enderror mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring focus:ring-blue-200 dark:focus:ring-blue-200 rounded-md shadow-sm">
                                @error('points')
                                    <div class="p-2 mt-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <x-primary-button class="mt-4">
                                <i class="fas fa-paper-plane mr-2"></i>{{ __('Submit') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>

            </div><br>

            <!-- Suggest Fix Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-green-500 dark:text-green-300">
                    <x-primary-button class="mt-1 icon-label" onclick="fetchSuggestedFix()">
                        <i class="fas fa-lightbulb mr-2"></i>{{ __('Suggest Fix') }}
                    </x-primary-button>
                    <br><br>
                    <hr><br>

                    <!-- Loading Animation -->
                    <div id="loading" style="display: none;" class="icon-label">
                        <span>Analyzing the report...</span>
                        <i class="fas fa-spinner fa-spin ml-2"></i>
                    </div>

                    <!-- Suggested Fix Content -->
                    <article class="text-white prose dynamic-prose w-full mt-4" id="suggestedFix"></article>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Axios library -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function fetchSuggestedFix() {
            var htmlOutput = document.getElementById('htmlOutput');

            // Show loading animation
            document.getElementById('loading').style.display = 'block';

            // Prepare data to send to Laravel backend
            var data = { prompt: htmlOutput.innerHTML };

            // Send POST request using axios
            axios.post("{{ route('ai') }}", data)
                .then(function (response) {
                    // Hide loading animation on success
                    document.getElementById('loading').style.display = 'none';

                    // Handle success
                    document.getElementById('suggestedFix').innerHTML = response.data;
                })
                .catch(function (error) {
                    // Hide loading animation on error
                    document.getElementById('loading').style.display = 'none';
                    console.error('Ajax request error:', error);
                });
        }
    </script>
</x-app-layout>
