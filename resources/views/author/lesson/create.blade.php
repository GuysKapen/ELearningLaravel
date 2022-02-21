<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Learn Academy</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

<div class="card my-4 mx-auto shadow-lg rounded-md px-8">
    <div class="header">
        <h2 class="text-2xl font-black leading-7 text-gray-900 sm:text-3xl sm:truncate text-left">
            Add new lesson for course {{$courseSection->course->name}}
        </h2>
        <h2 class="text-xl font-bold mt-4 leading-7 text-gray-900 sm:text-3xl sm:truncate text-left">
            Chapter {{$courseSection->index}} : {{$courseSection->name}}
        </h2>
    </div>

    <div class="mt-8">
        @include('author.lesson._form')
    </div>

</div>
</body>
