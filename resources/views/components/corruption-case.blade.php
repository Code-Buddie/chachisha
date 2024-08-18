<div class="border border-gray-200 rounded-lg shadow p-6">
    <p class="font-medium text-gray-900 text-xl">Add Corruption Case to the Database</p>
    <hr class="my-2">

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="case_type">Case Type<span class="text-red-600">*</span> </label>
            <select id="case_type" name="case_type" multiple
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach($caseTypes as $caseType)
                    <option value="{{ $caseType->id }}">{{ $caseType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="specific_case_type">Specific Case Type</label>
            <input type="text" id="specific_case_type" name="specific_case_type"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Enter specific case type">

        </div>
        <div class="col-span-2">
            <label class="mb-2 text-sm font-medium text-gray-900" for="case_number">Case Number<span class="text-red-600">*</span></label>
            <input type="text" id="case_number" name="case_number"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Enter case number">
        </div>
        <div class="col-span-2">
            <label class="mb-2 text-sm font-medium text-gray-900" for="case_title">Case Title <span class="text-red-600">*</span></label>
            <input type="text" id="case_title" name="case_title"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Enter case title">
        </div>
        <div class="col-span-2">
            <label class="mb-2 text-sm font-medium text-gray-900" for="court">Court<span class="text-red-600">*</span></label>
            <input type="text" id="court" name="court"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Enter court name">
        </div>
        <div class="col-span-2">
            <label class="mb-2 text-sm font-medium text-gray-900" for="case_summary">Case Summary<span class="text-red-600">*</span></label>
            <textarea id="case_summary" name="case_summary"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      rows="4" placeholder="Enter case summary"></textarea>
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="case_start_date">Case Start Date<span class="text-red-600">*</span></label>
            <input type="date" id="case_start_date" name="case_start_date"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="date_of_judgement">Date of Judgement<span class="text-red-600">*</span></label>
            <input type="date" id="date_of_judgement" name="date_of_judgement"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="col-span-2">
            <label class="mb-2 text-sm font-medium text-gray-900" for="impact">Impact<span class="text-red-600">*</span></label>
            <input type="text" id="impact" name="impact"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Enter impact of the case">
        </div>

        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="sector">Sector<span class="text-red-600">*</span></label>
            <select id="sector" name="sector"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>
        {{--<div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="ref_url">Reference URL</label>
            <input type="text" id="ref_url" name="ref_url"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Enter reference URL">
        </div>--}}
    </div>

    @for ($i = 0; $i < $accusedPersons; $i++)
        <div wire:transition.origin.top>
            <livewire:accused-person :index="$i" :key="$i"/>
        </div>
    @endfor


    <button wire:click.prevent="addNumberOfAccusedPersons" class="bg-blue-900 text-white px-4 py-1 text-sm font-medium rounded-md mt-2">Add an
        accused Person
    </button>
    @if($accusedPersons > 1)
        <button wire:click.prevent="decrementNumberOfAccusedPersosn" class="bg-red-600 text-white px-4 py-1 mt-2 text-sm font-medium rounded-md">
            Remove this accused person
        </button>
    @endif


</div>
