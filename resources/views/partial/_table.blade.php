<div class="flex flex-col mt-4 w-9/12 ml-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            @foreach ($headers as $key => $head)
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider {{ $head['class'] ?? '' }}">
                                    {{ $head['data'] }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $key => $row)
                            <tr>
                                @foreach ($row as $key => $values)
                                    <td class="text-sm font-medium text-gray-600 px-6 py-3">
                                        @foreach ($values as $key => $value)
                                            @if (isset($value['link']))
                                                <a href="{{ $value['link'] }}"
                                                    class="text-indigo-600 hover:text-indigo-700 text-sm {{ $value['class'] }}">
                                                    {{ $value['data'] }}
                                                </a>
                                            @elseif (isset($value['json_payload']))
                                                <button type="submit" data-payload='{{ $value['json_payload'] ?? "" }}'
                                                    class="text-green-600 text-sm hover:text-green-700 chatbox-payload mr-2">
                                                    <span class="block {{ $value['class'] }}">
                                                        {{ $value['data'] }}
                                                    </span>
                                                </button>
                                            @else
                                                <span class="block {{ $value['class'] }}">
                                                    {{ $value['data'] }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
