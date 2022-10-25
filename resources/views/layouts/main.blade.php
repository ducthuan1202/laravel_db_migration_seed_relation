<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>

    <x-label :value="__('DUc THuan')" :for-id="__('for for for')">Hello</x-label>

    <span class="text-red-500 d-block" style="width: 30px; height: 30px;" >
        <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </span>

    <div class="container">
        @if(count($errors))
            <div class="alert alert-danger my-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success my-3">
                <p> {{ $message }} </p>
            </div>
        @endif
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>