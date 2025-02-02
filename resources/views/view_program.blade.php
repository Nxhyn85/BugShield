<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Program') }}
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
            <div class="">
                <!-- Main Content Card -->
                <div class="bg-white row-span-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-2">
                    <div class="p-6 text-green-500 dark:text-green-500">
                        <div class="flex justify-between items-center">
                            <p class="text-xl font-semibold text-green-400 dark:text-green-300 mb-2">{{ $program->programName }}</p>
                            @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type == 'admin')
                                <a href="{{ route('admin.program.edit', ['uid' => $program['uid']]) }}" class="text-right bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                            @elseif (Auth::check() && Auth::user()->user_type == 'user')
                                <a href="{{ route('submit.report', ['programUid' => $program['uid']]) }}" class="text-right bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit Report</a>
                            @endif
                        </div>
                        <br><hr><br>
                        <article class="text-white text-white prose dynamic-prose">{!! $htmlOutput !!}</article>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
