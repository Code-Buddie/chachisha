<div class="border border-gray-200 rounded-lg shadow p-6">
    <p class="font-medium text-gray-900 text-xl">Accused Person</p>
    <hr class="my-2">

    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="first_name">First
                Name<span class="text-red-600">*</span></label>
            <input type="text" id="first_name" name="first_name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="First name">
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="last_name">Last
                Name<span class="text-red-600">*</span></label>
            <input type="text" id="last_name" name="last_name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Last name">
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="middle_name">Middle
                Name</label>
            <input type="text" id="middle_name" name="middle_name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Middle name">
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="gender">Gender<span class="text-red-600">*</span></label>
            <select id="gender" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
{{--        <div class="col-span-1">--}}
{{--            <label class="mb-2 text-sm font-medium text-gray-900" for="job">Designated Job</label>--}}
{{--            <input type="text" id="job" name="job"--}}
{{--                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"--}}
{{--                   placeholder="Job">--}}
{{--        </div>--}}
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="employer">Employer at the time of offence<span class="text-red-600">*</span></label>
            <input type="text" id="employer" name="employer"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Employer">
        </div>
        <div class="col-span-1">
            <label class="mb-2 text-sm font-medium text-gray-900" for="Level">Level<span class="text-red-600">*</span></label>

            <select id="level" name="level"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="male">High Level</option>
                <option value="female">Mid Level</option>
                <option value="other">Low Level</option>
            </select>
        </div>
    </div>

    @for ($i = 0; $i < $numberOfCharges; $i++)
        <div wire:transition.origin.top>
            <livewire:charges :index="$i" :key="$i"/>
        </div>
    @endfor


    <button wire:click.prevent="addNumberOfCharges" class="bg-blue-900 text-white px-4 py-1 text-sm font-medium rounded-md mt-2">Add Charge
    </button>
    @if($numberOfCharges > 1)
        <button wire:click.prevent="removeCharge" class="bg-red-600 text-white px-4 py-1 text-sm font-medium rounded-md">Remove Charge
        </button>
    @endif


</div>
