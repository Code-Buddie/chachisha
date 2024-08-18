<div class="container mx-auto mt-2 mb-8">
    <div class="overflow-x-auto">
        <table class="table-auto min-w-full border">
            <thead>
            <tr>
                @foreach($headers as $header)
                    <th class="px-4 py-2 border">{{ $header }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody class="text-gray-700">
            @if(isset($data))
                @foreach($data as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td class="border px-4 py-2">{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            @else
                @for ($i = 1; $i <= 4; $i++)
                <tr>
                    @foreach($headers as $header)
                        <td class="px-4 py-2 border"></td>
                    @endforeach
                </tr>
                @endfor
            @endif
            </tbody>
        </table>
    </div>
</div>
