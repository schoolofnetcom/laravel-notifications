<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificações</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<h1>{{ $user->name }}</h1>

<p>{{ $user->unreadNotifications->count() }}</p>

<ul>
    @foreach ($user->notifications as $notification)
        <li>
         @if ($notification->read_at == null)
            <a href="/readed/{{ $notification->id }}">{{ $notification->data['message'] }}</a>
        @else
            {{ $notification->data['message'] }}
        @endif
        </li>
    @endforeach
</ul>

<div id="app">
    <example-component user="{{ Auth::user()->id }}"/>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
