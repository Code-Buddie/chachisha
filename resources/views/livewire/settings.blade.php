{{--<div>--}}
{{--    --}}{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
{{--</div>--}}

<div class="p-4 mt-2">
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 gap-4">
        <div class="border border-gray-200 rounded-lg shadow p-6">
            <div>
                Case Types
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($caseTypes as $caseType)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-1 whitespace-nowrap">{!! nl2br(chunk_split($caseType->name, 50)) !!}</td>

                            @if($caseType->status ==1 )
                                <td class="px-1 py-2 text-center">
                                    <a href="#"
                                       class="font-medium bg-red-200 px-2 py-1 border rounded text-red-600 dark:text-blue-500 hover:underline decoration-0">Disable</a>
                                </td>
                            @else
                                <td class="px-1 py-2 text-center">
                                    <a href="#"
                                       class="font-medium bg-blue-200 px-2 py-1 border rounded text-blue-600 dark:text-blue-500 hover:underline decoration-0">Enable</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border border-gray-200 rounded-lg shadow p-6">
            <div>
                <h2>Regions</h2>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($regions as $region)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-1 whitespace-nowrap">{!! nl2br(chunk_split($region->name, 50)) !!}</td>

                            @if($region->status ==1 )
                                <td class="px-1 py-2 text-center">
                                    <a href="#"
                                       class="font-medium bg-red-200 px-2 py-1 border rounded text-red-600 dark:text-blue-500 hover:underline decoration-0">Disable</a>
                                </td>
                            @else
                                <td class="px-1 py-2 text-center">
                                    <a href="#"
                                       class="font-medium bg-blue-200 px-2 py-1 border rounded text-blue-600 dark:text-blue-500 hover:underline decoration-0">Enable</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr class="my-3">
            <div>
                <h2>Countries</h2>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Region
                        </th>
                        <th scope="col" class="py-3 px-2 text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-1 whitespace-nowrap">{!! nl2br(chunk_split($country->name, 50)) !!}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{!! nl2br(chunk_split($country->region, 50)) !!}</td>

                            @if($country->status ==1 )
                                <td class="px-1 py-2 text-center">
                                    <a href="#"
                                       class="font-medium bg-red-200 px-2 py-1 border rounded text-red-600 dark:text-blue-500 hover:underline decoration-0">Disable</a>
                                </td>
                            @else
                                <td class="px-1 py-2 text-center">
                                    <a href="#"
                                       class="font-medium bg-blue-200 px-2 py-1 border rounded text-blue-600 dark:text-blue-500 hover:underline decoration-0">Enable</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
