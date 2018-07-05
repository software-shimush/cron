@component('mail::message')
<h2>Email works {{$text}}</h2>

@component('mail::button', ['url' => '']) Button Text @endcomponent Thanks,

<br> {{ config('app.name') }} @endcomponent