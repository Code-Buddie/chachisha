<div class="my-3">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <div class="bg-white rounded-lg shadow p-3 w-full">
        <h2 class="text-2xl font-semibold mb-2">Add charges: Count {{$index +1}}</h2>

        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="charge">Charge<span class="text-red-600">*</span></label>
                <input type="text" id="charge" name="charge" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter charge">
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="date_of_offence">Date of Offence<span class="text-red-600">*</span></label>
                <input type="date" id="date_of_offence" name="date_of_offence" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="plea">Plea<span class="text-red-600">*</span></label>
                <select id="plea" name="plea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="guilty">Guilty</option>
                    <option value="not_guilty">Not Guilty</option>
                </select>
            </div>

            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="amount">Amount involved<span class="text-red-600">*</span></label>
                <input type="text" id="amount" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount">
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="type_of_asset">Type of Asset involved<span class="text-red-600">*</span></label>
                <input type="text" id="type_of_asset" name="type_of_asset" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Enter type of asset">
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="resolution">Resolution<span class="text-red-600">*</span></label>
                <select id="resolution" name="resolution" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="guilty">Guilty</option>
                    <option value="not_guilty">Not Guilty</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="judgement">Judgement<span class="text-red-600">*</span></label>
                <select id="judgement" name="judgement" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="acquittal">Acquittal</option>
                    <option value="conviction">Conviction</option>
                    <option value="consent">Consent</option>
                    <option value="dismissal">Dismissal</option>
                </select>
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="sentence">Sentence (if any)</label>
                <input type="text" id="sentence" name="sentence" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter sentence">
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="fine_issued">Fine Issued (if any)</label>
                <input type="text" id="fine_issued" name="fine_issued" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Enter fine issued">
            </div>

            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="assets_recovered">Assets Recovered (if any)</label>
                <input type="text" id="assets_recovered" name="assets_recovered" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Enter assets recovered">
            </div>
            <div class="col-span-1">
                <label class="mb-2 text-sm font-medium text-gray-900" for="value_of_assets">Value of Assets (if any)</label>
                <input type="text" id="value_of_assets" name="value_of_assets" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder="Enter value of assets">
            </div>
        </div>

        <!-- Add a submit button or any additional elements as needed -->

    </div>

</div>
