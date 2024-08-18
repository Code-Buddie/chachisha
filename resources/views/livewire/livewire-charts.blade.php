<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- First Column (1/4) -->
        <div class="col-span-1">
            <!-- Content for the first column -->
            <form class="bg-gray-100 p-4 rounded rounded-lg">
                <div class="mb-4">
                    <label for="analysis"
                           class="block text-sm font-medium text-gray-700">Analysis</label>
                    <select  wire:model.live="analysisTypeFilter" id="analysis" name="analysis"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($analyses as $analysis)
                            <option value="{{ $analysis->id }}">{{ $analysis->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="start_date" class="mb-2 text-sm font-medium text-gray-900">Start Date</label>
                    <input  wire:model.live="startDateFilter" type="date" id="start_date" name="start_date"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                </div>

                <div class="mb-4">
                    <label for="end_date" class="mb-2 text-sm font-medium text-gray-900">End Date</label>
                    <input  wire:model.live="endDateFilter" type="date" id="end_date" name="end_date"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                </div>

                <div class="mb-2">
                    <label for="country"
                           class="block text-sm font-medium text-gray-700">Country</label>
                    <select  wire:model.live="countryFilter" id="country" name="country"
                            class="mt-1 p-1 border border-gray-300 focus:outline-none focus:ring focus:border-blue-300 rounded-md w-full">
                        <option value="">All</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

            </form>
        </div>


        <!-- Second Column (3/4) -->
        <div class="col-span-3">
            <div class="chart-zone">
                <livewire:livewire-column-chart :column-chart-model="$model" key="{{ $model->reactiveKey() }}" data-aos="fade-up"/>
            </div>
        </div>
    </div>

</div>
