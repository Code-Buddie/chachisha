@extends('layouts.app')

@section('content')
    <section class="bg-red-600 dark:bg-red-600 banner z-50">
        <div class="container sm:px-16 lg:px-24">
            
        </div>
    </section>
    <div class="flex">
        <!-- 1/4 Width Column -->
        <div class="w-2/5 bg-gray-200 p-4">
            @include('components.case-summary')
        </div>

        <div class="w-3/5 p-4">
            <form method="POST" action="/report-incident">
                @csrf
                <livewire:corruption-case
                    :case-types="$caseTypes"
                    {{--                    :specific-case-types="$specificCaseTypes"--}}
                    :sectors="$sectors"/>
            </form>
        </div>
    </div>

@endsection

