@php
if (!isset($message)) {
    $message = '--message--';
}

if (!isset($buttons)) {
    $buttons = '--buttons--';
}

if (!isset($class)) {
    $class = '--class--';
}
@endphp
<div role="button" tabindex="0" data-e2e="EventContainer-user-1657235215.777" id=""
    class="mt-4 px-6 py-2 border-transparent border-2">
    <div class="m-0 flex flex-row items-center">

        <div class="flex flex-shrink-0 m-0">
            <div class="w-8 h-8 text-center rounded-full flex justify-center items-center text-white bg-blue-400">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="meh-blank"
                    class="svg-inline--fa fa-meh-blank fa-w-16 css-1y53wuf" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" style="width: 1em;">
                    <path fill="currentColor"
                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm-80 232c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm160 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
                    </path>
                </svg>
            </div>
        </div>

        <div>
            <div class="css-463jce"></div>
            <div class="mx-2 flex justify-end">
                <div style="max-width: 240px;" class="m-0 flex flex-col" aria-describedby="tooltip-2">
                    <div data-qa="conversation-message-bubbles_div"
                        class="m-0 bg-slate-100 text-gray-800 px-4 py-2 align-self-end text-sm rounded-tl-md rounded-bl-2xl rounded-br-2xl rounded-tr-2xl relative"
                        style="min-height: 2rem; min-width: 3rem;">
                        <div class="{{ $class }} text-xs" style="font-family: Noto Sans; top: 50%">{{ $message }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $buttons }}
</div>
