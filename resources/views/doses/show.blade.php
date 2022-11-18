@include('shared.header')

@php
    $userActive = false;
    $doseActive = true;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>{{ $dose->name }}</h1>
        <p>{{ $dose->name }}</p>
        <br/>
        <a href="{{ route('doses.index'); }}">Back</a>
    @include('shared.footer')