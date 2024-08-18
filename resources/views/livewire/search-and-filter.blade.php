{{--<div>--}}
{{--    --}}{{-- Nothing in the world is as soft and yielding as water. --}}
{{--</div>--}}
<div class="flex w-full">
    <!-- Left Panel: Form for Filtering Cases -->
    <div class="w-1/4 pr-8">
        <form action="" method="GET" class="mb-2">
            <h3 class="text-xl font-bold">Filter</h3>
            <hr class="mb-2">
            <div class="mb-2">
                <label for="query" class="mr-2">Search Phrase:</label>
                <input wire:model.live="searchTerm" type="text" id="query"
                       class="border rounded px-2 py-1 w-full">
            </div>
            <div class="">
                <div class="mb-2">
                    <label for="caseType"
                           class="mr-2 block text-sm font-medium text-gray-700">Case
                        Type:</label>
                    <select wire:model.live="caseTypeFilter" id="caseType" name="caseType"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($caseTypes as $caseType)
                            <option
                                value="{{ $caseType->id }}">{{ $caseType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="country"
                           class="block text-sm font-medium text-gray-700">Country</label>
                    <select wire:model.live="countryFilter" id="country" name="country"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="country"
                           class="block text-sm font-medium text-gray-700">Country</label>
                    <select wire:model.live="countryFilter" id="country" name="country"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="country"
                           class="block text-sm font-medium text-gray-700">County</label>
                    <select wire:model.live="countryFilter" id="country" name="country"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Select input for Sector -->
                <div class="mb-2">
                    <label for="sector"
                           class="block text-sm font-medium text-gray-700">Constituency</label>
                    <select wire:model.live="sectorFilter" id="sector" name="sector"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($sectors as $sector)
                            <option
                                value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="caseResolution"
                           class="mr-2 block text-sm font-medium text-gray-700">Case
                        Resolution:</label>
                    <select wire:model.live="resolutionFilter" id="caseResolution" name="caseResolution"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($resolutions as $resolution)
                            <option
                                value="{{ $resolution->id }}">{{ $resolution->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="gender"
                           class="mr-2 block text-sm font-medium text-gray-700">Gender:</label>
                    <select wire:model.live="genderFilter" id="gender" name="gender"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>

                {{-- <div class="mb-2">
                    <label for="judgement"
                           class="mr-2 block text-sm font-medium text-gray-700">Type of
                        Judgement:</label>
                    <select wire:model.live="judgmentFilter" id="judgement" name="judgement"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($typeOfJudgements as $typeOfJudgement)
                            <option value="{{$typeOfJudgement->id}}">{{$typeOfJudgement->name}}</option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- <div class="mb-2">
                    <label for="levelOfOfficer"
                           class="mr-2 block text-sm font-medium text-gray-700">Level of
                        Officer
                        Involved:</label>
                    <select wire:model.live="levelFilter" id="level" name="level"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($levels as $level)
                            <option value="{{$level->id}}">{{$level->name}}</option>
                        @endforeach
                    </select>
                </div> --}}


                <div class="mb-2">
                    <label for="amountInvolved"
                           class="mr-2 block text-sm font-medium text-gray-700">Amount
                        Involved
                        (USD):</label>
                    <input wire:model.live="amountFilter" type="number" name="amountInvolved" id="amountInvolved"
                           class="border rounded px-2 py-1 w-full">
                </div>

            </div>
        </form>
    </div>
    <div class="w-3/4">
        {{-- <h2 class="text-xl font-extrabold">Corruption Cases</h2> --}}

        @if(count($corruptionCases) > 0)
        @foreach ($corruptionCases as $corruptionCase)
        @foreach ($corruptionCase->accusedpersons as $accusedPerson)
        <div data-aos="fade-up" class="bg-white p-4 rounded-lg shadow-xl border border-r-2 text-md mb-2">
            <div class="flex flex-col lg:flex-row">
            <!-- Left Column -->
            <div class="lg:w-1/2 flex flex-col lg:flex-row items-start mb-6 lg:mb-0">
              <!-- Image Container -->
              <div class="w-1/4 h-32 flex-shrink-0 overflow-hidden mr-4">
                <img src="{{$accusedPerson->image_url}}" alt="Profile Image" class="w-full h-full object-cover">               
              </div>
              
              <!-- Info Container -->
              <div class="flex flex-col justify-center flex-grow">
                <!-- Name -->
                <h1 class="text-xl font-bold mb-2">{{$accusedPerson->first_name}} {{$accusedPerson-> last_name}}</h1>
            
                <!-- Title -->
                <small>Rank at time of case</small>
                <h2 class="font-normal">{{$accusedPerson->rank->name}}</h2>
                <small class="font-normal mb-4">{{$accusedPerson->employer}}</small>
                <!-- Amount -->
                <small>Amount</small>
                <p class="text-2xl font-bold text-red-600">
                    @php
                    $totalAmount = 0;

                foreach($corruptionCase->charges as $charge) {
                // Remove "Ksh" and any non-numeric characters, then convert to a float
                $amount = preg_replace('/[^0-9.]/', '', $charge->amount);
                $totalAmount += (float)$amount;
                }
                @endphp

                <p class="text-2xl font-bold text-red-600">
                Total Amount: Ksh {{ number_format($totalAmount, 2) }}
            </p>

                    @php foreach ($projects as $project) {
                        $projectCost = $project->budget_cost;
            
                        // Calculate how many can be done with the available budget
                        $quantity = (int)($totalAmount / $projectCost);

            
                        // Prepare the result
                        $result[] = [
                            'service_name' => $project->service_name,
                            'budget_cost' => $projectCost,
                            'quantity' => $quantity,
                        ];
                    } 
                    @endphp
                  
                </p>
              </div>              
            </div>
          
            <!-- Brief Description -->
            
          
            <!-- Right Column -->
            <div class="lg:w-1/2">
                <h3 class="text-2xl font-bold text-red-600">What this money could do</h3>
              <ul class="list-disc pl-6 space-y-2 text-gray-800">
                @foreach ($result as $service)
                @if($service['quantity'] > 0)
                        <p class="font-bold">                            
                            {{ $service['quantity'] }} {{ $service['service_name'] }} @ Ksh {{ number_format($service['budget_cost'], 2) }} each
                        </p>
                        @endif
                    @endforeach
              </ul>
            </div>
          </div>
          <hr>
          <div class="lg:w-full mt-4 lg:mt-0">
            <div class="mb-1 text-sm">
                <strong>Case summary:</strong>
                    <p class="text-gray-600 text-sm"><h2 class="text-md font-bold mb-1">{{ $corruptionCase->case_title }}</h2>{{ $corruptionCase->case_summary }}</p>
            </div>
            <p class="text-base text-gray-700">
                Case Resolution
                @foreach($corruptionCase->charges as $charge)
                <p>Plea: {{$charge->plea}}</p>
                <p>Sentence: {{$charge->sentence}}</p>
                <p>Assets Recovered: {{$charge->assets_recovered}}</p>
                <p>Fine Issued: {{$charge->fine_issued}}</p>
            @endforeach
              </p>
          </div>
        </div>
        @endforeach
        @endforeach
        @else
            <div class="rounded-md p-4 bg-red-100 border border-red-400">
                <div class="flex">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">
                            Sorry, there are no cases in the database yet
                        </p>
                    </div>
                </div>
            </div>
        @endif
          
    </div>
</div>
