@php
if (!isset($title)) {
    $title = '--title--';
}

if (!isset($url)) {
    $url = '--url--';
}
@endphp
<div class="mt-2 ml-6 px-3">
    <div class="m-0">
        <a href="{{ $url }}">
            <button
                class="mx-1 inline-block text-center text-decoration-none rounded-md text-xs font-bold py-2 px-6 bg-white border-blue-600 border text-blue-600 cursor-pointer relative hover:bg-blue-600 hover:text-white">{{ $title }}</button>
        </a>
    </div>
</div>
