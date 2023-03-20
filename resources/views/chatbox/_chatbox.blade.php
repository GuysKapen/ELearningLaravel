@php
use Illuminate\Support\Facades\View;
@endphp
<div class="fixed bottom-4 right-4 flex flex-col justify-end items-end" style="z-index: 999">


    <div id="chatbox-container" class="collapse w-96 h-112"
        style="background-color: rgb(255, 255, 255); border-radius: 8px; border-width: 1px; border-color: rgb(221, 226, 239); overflow: hidden; margin-bottom: 14px; border-style: solid;">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto Sans');
        </style>
        <div class="h-full overflow-auto flex flex-col m-0">
            <div class="m-0 overflow-auto flex basis-4/5 flex-shrink flex-grow">
                <div class="h-full m-0 flex flex-col w-full">
                    <div id="chatbox-conversation-container" data-e2e="Conversation__Container"
                        class="overflow-auto flex-grow flex-shrink basis-auto w-full">




                    </div>
                </div>
            </div>
            <div class="initial w-full flex-shink-1">
                <div class="pl-2 pr-0 h-20 items-center flex border-t">
                    <div class="flex-grow m-0">
                        <textarea id="chatbox-input"
                            class="border-none text-base overflow-y-auto py-4 flex overflow-hidden text-ellipsis h-16 items-center justify-between  px-8 w-full font-base rounded-lg resize-none focus:shadow-none"
                            data-qa="chat-input_textarea" placeholder="Start typing a message..." rows="1" spellcheck="false"></textarea>
                    </div>
                    <div class="m-0"><button
                            class="shadow-none m-0 p-6 leading-0 inline-block text-center border-none font-md cursor-not-allowed relative"
                            disabled="" aria-describedby="tooltip-1" data-dashlane-label="true"
                            data-dashlane-rid="e8b306a88f1850cb" data-form-type=""><svg aria-hidden="true"
                                focusable="false" data-prefix="fal" data-icon="paper-plane"
                                class="svg-inline--fa fa-paper-plane text-base" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 1em;">
                                <path fill="currentColor"
                                    d="M464 4.3L16 262.7C-7 276-4.7 309.9 19.8 320L160 378v102c0 30.2 37.8 43.3 56.7 20.3l60.7-73.8 126.4 52.2c19.1 7.9 40.7-4.2 43.8-24.7l64-417.1C515.7 10.2 487-9 464 4.3zM192 480v-88.8l54.5 22.5L192 480zm224-30.9l-206.2-85.2 199.5-235.8c4.8-5.6-2.9-13.2-8.5-8.4L145.5 337.3 32 290.5 480 32l-64 417.1z">
                                </path>
                            </svg></button></div>
                </div>
            </div>
        </div>
    </div>


    <button
        class="bg-indigo-600 font-base text-center w-16 h-16 rounded-full text-white cursor-pointer flex justify-center items-center"
        data-toggle="collapse" data-target="#chatbox-container"><svg aria-hidden="true" focusable="false"
            data-prefix="fas" data-icon="comment-dots" class="svg-inline--fa fa-comment-dots fa-w-16 css-1fcbxrh"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 1em;">
            <path fill="currentColor"
                d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32zM128 272c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
            </path>
        </svg>
    </button>


</div>

<script>
    const chatbotUrl = '{{ config('app.chatbot_url') }}'
    // Click outside to hide
    $('html').on("click", function() {
        $("#chatbox-container").removeClass("show")
    });

    // Prevent click inside element from hide
    $('#chatbox-container').click(function(event) {
        event.stopPropagation();
    });

    jQuery(document).ready(function() {

        $.ajax({
            type: "GET",
            url: `${chatbotUrl}/conversations/12/tracker`,
            success: function(response) {
                for (const event of response["events"]) {
                    if (event["event"] === "user") {
                        @php
                            $html = json_encode(View::make('chatbox._chatbox_user_message')->render());
                        @endphp
                        let processed = {!! $html !!};
                        const section = $("#chatbox-conversation-container")
                        processed = processed.replaceAll("--message--", event["text"]);
                        section.append(processed)
                    }

                    if (event["event"] === "bot") {
                        @php
                            $html = json_encode(View::make('chatbox._chatbox_bot_response')->render());
                        @endphp
                        let processed = {!! $html !!};
                        const section = $("#chatbox-conversation-container")
                        let btnsHtml = [];

                        // Custom json response
                        if ("custom" in event["data"] && event["data"]["custom"] != null) {
                            let custom = event["data"]["custom"]
                            processed = processed.replaceAll("--message--", custom["text"]);

                            if ("link" in event["data"]["custom"]) {
                                @php
                                    $html = json_encode(View::make('chatbox._chatbox_response_btn')->render());
                                @endphp
                                let btnHtml = {!! $html !!};
                                btnHtml = btnHtml.replaceAll("--title--", custom["link"]
                                    ["title"])
                                btnHtml = btnHtml.replaceAll("--url--", custom["link"][
                                    "url"
                                ])

                                btnsHtml.push(btnHtml)
                            }

                            if ("table" in custom) {
                                let tableData = custom["table"];
                                if ("data" in tableData && tableData["data"].length > 0) {
                                    // Post to chatbox and get result
                                    $.ajax({
                                        type: "GET",
                                        dataType: 'json',
                                        contentType: 'application/json',
                                        url: "http://localhost:8000/api/render-table",
                                        data: {
                                            "table": tableData
                                        },
                                        success: function(response) {
                                            section.append(response)
                                        },
                                        error: function(error) {
                                            console.log(error);
                                        }
                                    })
                                }
                            }

                        } else {
                            processed = processed.replaceAll("--message--", event[
                                "text"]);
                        }

                        processed = processed.replaceAll("--buttons--", btnsHtml
                            .join());
                        section.append(processed)
                    }
                }

            },
            error: function(error) {
                console.log(error);
            }
        })


        $("#chatbox-input").on("keydown", function(e) {
            if (e.keyCode == 13) {
                e.preventDefault()

                const message = $(this).val()
                // Clear input
                $(this).val("");

                // Insert user message
                @php
                    $html = json_encode(View::make('chatbox._chatbox_user_message')->render());
                @endphp
                let processed = {!! $html !!};
                const section = $("#chatbox-conversation-container")
                processed = processed.replaceAll("--message--", message);
                section.append(processed)


                const data = JSON.stringify({
                    "sender": "12",
                    "message": message
                })

                // Post to chatbox and get result
                sendChatboxMessage(data)
            }

        })

        $("#chatbox-container").on("click", ".chatbox-payload", function(e) {
            let data = $(this).attr("data-payload");
            sendChatboxMessage(data)
        })
    })

    function sendChatboxMessage(data) {
        $.ajax({
            type: "POST",
            url: `${chatbotUrl}/webhooks/rest/webhook`,
            data: data,
            success: function(response) {
                for (const utter of response) {
                    @php
                        $html = json_encode(View::make('chatbox._chatbox_bot_response')->render());
                    @endphp
                    let processed = {!! $html !!};
                    const section = $("#chatbox-conversation-container")
                    let btnsHtml = [];

                    if ("custom" in utter) {
                        const custom = utter["custom"]
                        processed = processed.replaceAll("--message--", custom[
                            "text"])

                        if ("link" in custom) {
                            @php
                                $html = json_encode(View::make('chatbox._chatbox_response_btn')->render());
                            @endphp
                            let btnHtml = {!! $html !!};
                            btnHtml = btnHtml.replaceAll("--title--", custom["link"]
                                ["title"])
                            btnHtml = btnHtml.replaceAll("--url--", custom["link"][
                                "url"
                            ])

                            btnsHtml.push(btnHtml)
                        }

                        if ("table" in custom) {
                            let tableData = custom["table"];

                            if ("data" in tableData && tableData["data"].length > 0) {
                                // Post to chatbox and get result
                                $.ajax({
                                    type: "GET",
                                    dataType: 'json',
                                    contentType: 'application/json',
                                    url: "http://localhost:8000/api/render-table",
                                    data: {
                                        "table": tableData
                                    },
                                    success: function(response) {
                                        section.append(response)

                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                })
                            }
                        }

                    } else {
                        processed = processed.replaceAll("--message--", utter[
                            "text"]);
                    }

                    // Buttons response
                    if ("buttons" in utter) {
                        for (const btn of utter["buttons"]) {
                            @php
                                $html = json_encode(View::make('chatbox._chatbox_response_btn')->render());
                            @endphp
                            let btnHtml = {!! $html !!};
                            btnHtml = btnHtml.replaceAll("--title--", btn["title"])

                            btnsHtml.push(btnHtml)
                        }

                    }
                    processed = processed.replaceAll("--buttons--", btnsHtml
                        .join());
                    section.append(processed)

                    if ("custom" in utter) {
                        let custom = utter["custom"]
                        // Link
                        if ("redirect" in custom) {
                            @php
                                $loading = json_encode(View::make('chatbox._chatbox_bot_response')->render());
                            @endphp
                            let loading = {!! $loading !!};
                            loading = loading.replaceAll("--message--", "")
                            loading = loading.replaceAll("--buttons--", "")
                            loading = loading.replaceAll("--class--",
                                "dot-flashing")

                            section.append(loading)

                            setTimeout(() => {
                                window.location.replace(custom["redirect"][
                                    "url"
                                ]);
                            }, 1000);

                        }
                    }
                }

            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>
