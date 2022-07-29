<div class="flex flex-col mt-4 w-9/12 ml-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            @foreach ($headers as $key => $head)
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider {{ $head['class'] ?? '' }}">
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
                                                {{-- <form method="post" action="{{ $value['form']['url'] }}"> --}}
                                                {{-- @method($value['form']['method'] ?? 'POST') --}}
                                                {{-- @if (isset($value['form']['inputs']))
                                                        @foreach ($value['form']['inputs'] as $key => $input)
                                                            <input type="hidden" name="{{ $input['name'] }}"
                                                                value="{{ $input['value'] }}" />
                                                        @endforeach
                                                    @endif --}}
                                                <button type="submit" data-payload='{{ $value['json_payload'] ?? "" }}'
                                                    class="text-green-600 text-sm hover:text-green-700 chatbox-payload {{ $value['class'] }}">
                                                    {{ $value['data'] }}
                                                </button>
                                                {{-- </form> --}}
                                            @else
                                                <span class="{{ $value['class'] }}">
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
