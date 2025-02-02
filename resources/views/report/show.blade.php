<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>
<link rel="stylesheet" href="https://unpkg.com/@tailwindcss/typography@0.4.1/dist/typography.min.css">
<!-- Include Prism.js CSS for syntax highlighting -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" rel="stylesheet">

<style>
    .prose pre {
        color: green;
        background-color: #0a0a06;

    }
    .prose code {
        color: aquamarine;
        background-color: #0a0a06;
        padding: 5px;
    }
    .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
        color: orange;
        font-size: 20px;
    }
    .prose strong {
        color: aquamarine;
    }
    .prose p {
        color: coral;
    }
    .prose ul, .prose ol {
        color: indianred;
    }
</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Main Content Card -->
                <div class="bg-white row-span-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <p class="text-xl font-semibold text-green-400 dark:text-green-300 mb-2">{{ $report->title }}</p>
                        <hr>
                        <span class="text-sm text-gray-400">
                            <strong>{{ $report->user->username }}</strong> submitted a report.
                        </span>
                        <article class="text-white text-white prose dynamic-prose">{!! $htmlOutput !!}</article>
                    </div>
                </div>

                <!-- Details Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <span class="text-sm text-gray-400">Reported at {{ $report->created_at }}</span>
                        <hr>
                        <h2 class="text-lg font-semibold text-green-900 dark:text-green-100">Reporter: {{ $report->user->username }}</h2>
                        <p class="mt-1">Program : <span class="text-purple-400">{{ ucfirst($report->program_name) }}</span></p>
                        <p class="mt-1">Severity : <span class="{{ $report->severityColor }}">{{ ucfirst($report->severity) }}</span></p>
                        <p class="mt-1">Status : <span class="{{ $report->statusColor }}">{{ ucfirst($report->status) }}</span></p>
                        <p class="mt-1">Points : <span class="text-green-500">{{ ucfirst($report->points) }}</span></p>
                        <!-- <p>{{ $report->statusColor }}</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
