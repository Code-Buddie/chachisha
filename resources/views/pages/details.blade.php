@extends('layouts.app')


@section('content')
    @auth
        @include('layouts.partials.sidebar')
    @endauth

    <div class="p-4 @auth asm:ml-48 @endauth mt-2">
        <div class="border border-gray-200 rounded-lg shadow p-6">
            <h2 class="text-xl font-extrabold">Corruption Case Details</h2>
            <hr>
            <div class="mb-1 text-md text-gray-500">
                <small><span
                        class="fi fi-{{ strtolower($corruptionCase->country->abbr) }} fis"
                        title="{{ $corruptionCase->country->name }}"></span>
                    {{ $corruptionCase->case_number }}
                </small>

            </div>
            <h2 class="text-md font-bold mb-1">{{ $corruptionCase->case_title }}</h2>

            <div class="mb-1 text-sm">
                <strong>Country:</strong>
                <span
                    class="text-grey-600">{{ $corruptionCase->country->name }} ({{ $corruptionCase->country->abbr }})</span>
            </div>

            <div class="mb-1 text-sm">
                <strong>Case Type:</strong>
                @foreach($corruptionCase->caseType as $caseType)
                    <span
                        class="text-red-600">{{ $caseType->name }}</span>
                @endforeach

            </div>

            @if($corruptionCase->specificCaseType !=null)
                <div class="mb-1 text-sm">
                    <strong>Specific Case Type:</strong>
                    <span>{{$corruptionCase->specificCaseType->name }}</span>
                </div>
            @endif

            <div class="mb-1 text-sm">
                <strong>Case started on:</strong>
                <span>{{ $corruptionCase->case_start_date }}</span>
            </div>
            <div class="mb-1 text-sm">
                <strong>Date of Judgment::</strong>
                <span> {{ $corruptionCase->date_of_judgement }}</span>
            </div>

            <hr class="my-2">

            <div class="mb-1 text-sm">
                <strong>Case summary:</strong>
                <p class="text-gray-600 text-sm">{{ $corruptionCase->case_summary }}</p>
            </div>

            <hr class="my-2">

            <div class="mb-1 text-sm">
                <strong>{{ $corruptionCase->countAccusedPersons() }}
                    <i class="fas fa-users"></i> Accused Persons </strong>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                @foreach ($corruptionCase->accusedPersons as $accusedPerson)
                    <div class="mb-1 text-sm">
                        <div class="bg-white p-4 rounded-lg shadow-xl border border-r-2 text-md">

                            <p>
                                <strong>Name:</strong> {{ $accusedPerson->first_name }} {{ $accusedPerson->middle_name }} {{ $accusedPerson->last_name }}
                            </p>
                            <p><strong>Gender:</strong> {{ $accusedPerson->gender }} </p>
                            <p><strong>Level:</strong> {{ $accusedPerson->level }} </p>
                            <p><strong>Employer at time of offence:</strong> {{ $accusedPerson->employer }} </p>

                            <hr class="my-2">

                            @if(count($accusedPerson->charges) > 0)
                                <div class="italic">

                                    <h2 class="font-bold text-xl italic">Charges:</h2>

                                    @foreach ($accusedPerson->charges as $charge)
                                        <p>Count {{$charge->count}}: {{$charge->charge}}</p>

                                        <p><strong>Date of Offence:</strong> {{ $charge->date_of_offence }}</p>
                                        <p><strong>Plea:</strong> {{ $charge->plea }}</p>

                                        @if (!empty($charge->amount))
                                            <p><strong>Amount:</strong> {{ $charge->amount }}</p>
                                        @endif

                                        @if (!empty($charge->type_of_asset))
                                            <p><strong>Type of Asset:</strong> {{ $charge->type_of_asset }}</p>
                                        @endif

                                        @if (!empty($charge->resolution))
                                            <p><strong>Resolution:</strong> {{ $charge->resolution->name }}</p>
                                        @endif

                                        @if (!empty($charge->typeOfJudgement))
                                            <p><strong>Type of Judgement:</strong> {{ $charge->typeOfJudgement->name }}
                                            </p>
                                        @endif

                                        @if (!empty($charge->sentence))
                                            <p><strong>Sentence:</strong> {{ $charge->sentence }}</p>
                                        @endif

                                        @if (!empty($charge->fine_issued))
                                            <p><strong>Fine Issued:</strong> {{ $charge->fine_issued }}</p>
                                        @endif

                                        @if (!empty($charge->assets_recovered))
                                            <p><strong>Assets Recovered:</strong> {{ $charge->assets_recovered }}</p>
                                        @endif

                                        @if (!empty($charge->value))
                                            <p><strong>Value:</strong> {{ $charge->value }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="my-2">

        </div>
    </div>

    {{--    // side bar--}}
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        @if (session('status'))--}}
    {{--                            <div class="alert alert-success" role="alert">--}}
    {{--                                {{ session('status') }}--}}
    {{--                            </div>--}}
    {{--                        @endif--}}

    {{--                        {{ __('You are logged in!') }}--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

