@extends('layouts.app')

@push('css')
    <style>
        .chart-zone {
            min-height: 60vh !important;
            height: 60vh !important;
        }
    </style>
@endpush


@section('content')

    {{--    @include('layouts.partials.sidebar')--}}

    <div class="p-4 mt-2">
        <div class="border border-gray-200 rounded-lg shadow p-6">

            <div
                class="text-sm border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <!-- Blade Template -->
                <div class="container mx-auto p-4">
                    <div x-data="{ openTab: 1 }" class="container mx-auto">
                        <ul class="flex flex-wrap -mb-px">
                            <li @click="openTab = 1" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 1 }"
                                   class="inline-block p-4 border-b-2 border-blue-600 active">Case
                                    by Case listing</a>
                            </li>
                            <li @click="openTab = 2" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 2 }"
                                   class="inline-block p-4 border-b-2 border-blue-600 active">Analysis</a>
                            </li>
                            <li @click="openTab = 3" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 3 }"
                                   class="inline-block p-4 border-b-2 border-blue-600 active">Custom Analysis</a>
                            </li>
                            <li @click="openTab = 4" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 4 }"
                                   class="inline-block p-4 border-b-2 border-blue-600 active">Upload Cases</a>
                            </li>
                            <li @click="openTab = 5" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 5 }"
                                   class="inline-block p-4 border-b-2 border-blue-600 active">Settings</a>
                            </li>
                        </ul>

                        <div x-show="openTab === 1" class="py-4">
                            <div class="">
                                <livewire:search-and-filter/>
                            </div>
                        </div>
                        <div x-show="openTab === 2" class="py-4 ">
                            <div
                                class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 chart-zone h-full">
                                <livewire:livewire-charts/>

                            </div>
                        </div>
                        <div x-show="openTab === 3" class="py-4">
                            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                                <div class="flex">
                                    <!-- Left Panel: Form for Filtering Cases -->
                                    <div class="w-1/4 pr-8">
                                        <form action="" method="GET" class="mb-2">
                                            <h3 class="text-xl font-bold">Custom Analysis</h3>
                                            <hr class="mb-2">
                                            <div class="">
                                                <div class="mb-2">
                                                    <label for="country"
                                                           class="block text-sm font-medium text-gray-700">Chart
                                                        Type</label>
                                                    <select id="chart" name="chart"
                                                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                                                        <option value="">Line Chart</option>
                                                        <option value="">Column Chart</option>
                                                        <option value="">Pie Chart</option>
                                                        <option value="">Area Chart</option>
                                                        <option value="">Radar Chart</option>
                                                    </select>
                                                </div>


                                                <!-- Select input for Sector -->
                                                <div class="mb-2">
                                                    <label for="sector" class="block text-sm font-medium text-gray-700">Variable
                                                        1</label>
                                                    <select id="sector" name="sector"
                                                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                                                        @foreach($sectors as $sector)
                                                            <option
                                                                value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="sector"
                                                           class="block text-sm font-medium text-gray-700">Variable
                                                        2</label>
                                                    <select id="sector" name="sector"
                                                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                                                        @foreach($caseTypes as $caseType)
                                                            <option
                                                                value="{{ $caseType->id }}">{{ $caseType->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="country"
                                                           class="block text-sm font-medium text-gray-700">Country</label>
                                                    <select id="country" name="country"
                                                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                                                        <option value="">All</option>
                                                        @foreach($countries as $country)
                                                            <option
                                                                value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <button type="submit"
                                                        class="bg-red-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                                                    Plot Analysis
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="w-3/4">
                                        <div
                                            class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                                            <h2 class="text-xl font-extrabold">Analysis of X against Y</h2>
                                            // Chart goes here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show="openTab === 4" class="py-4">

                            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Alert Icon -->
                                            <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M12 19c0 1.104-.896 2-2 2s-2-.896-2-2h4zM2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0zM10 2a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1zm1 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <!-- Alert Heading -->
                                            <h3 class="text-sm font-medium text-yellow-800">
                                                Excel File Format Warning
                                            </h3>
                                            <!-- Alert Message -->
                                            <div class="mt-2 text-sm text-yellow-700">
                                                <p>Your Excel file should follow the format below and structure. No data
                                                    will be processed if the file does not adhere to the required
                                                    format.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <x-charges-scrollable-table
                                    :headers="['id', 'count-number', 'count', 'case number', 'case title', 'case summary', 'case type', 'specific case type', 'case start date', 'date of judgement', 'sector', 'court', 'country', 'accused person\'s name', 'accused person gender', 'accused person employer', 'accused person level', 'date of offence', 'amount involved', 'assets involved', 'plea', 'case resolution', 'type of judgement', 'sentence', 'fine issued', 'assets recovered', 'value of assets']"
                                />
                                <form action="{{ route('process.excel') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="excelFile" class="block text-gray-700 text-sm font-bold mb-2">Upload
                                            Excel File</label>
                                        <input type="file" name="excelFile" id="excelFile" accept=".xlsx, .xls"
                                               required>
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Upload and
                                        Process
                                    </button>
                                </form>
                            </div>
                        </div>


                        <div x-show="openTab === 5" class="py-4">
                            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                                <livewire:settings/>
                            </div>
                        </div>


                        <ul class="flex flex-wrap -mb-px">
                            <li @click="openTab = 1" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 1 }"
                                   class="inline-block p-4 border-t-2 border-blue-600 active">Case
                                    by Case listing</a>
                            </li>
                            <li @click="openTab = 2" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 2 }"
                                   class="inline-block p-4 border-t-2 border-blue-600  active">Analysis</a>
                            </li>
                            <li @click="openTab = 3" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 3 }"
                                   class="inline-block p-4 border-t-2 border-blue-600 active">Custom Analysis</a>
                            </li>
                            <li @click="openTab = 4" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 4 }"
                                   class="inline-block p-4 border-t-2 border-blue-600 active">Upload Cases</a>
                            </li>
                            <li @click="openTab = 5" class="me-2">
                                <a :class="{ 'border-blue-600 text-blue-600 font-bold': openTab === 5 }"
                                   class="inline-block p-4 border-t-2 border-blue-600 active">Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

