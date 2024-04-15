<!DOCTYPE html>
<html>
<head>
    <title>Email Content</title>
</head>
<body>
    <p>
        @component('mail::message')
        <h1>
            @if(isset($title))
                {{ $title }}
            @endif
        </h1>
        @if(isset($content))
            {{ $content }}
        @endif
            @component('mail::button',['url' => 'link'])
                More details 
            @endcomponent
            Thanks , 
        @endcomponent

        @php
            return to_route('dashboard.show');
        @endphp
    </p>
</body>
</html>
