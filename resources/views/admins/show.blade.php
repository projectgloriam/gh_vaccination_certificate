@include('shared.header')

@php
    $userActive = false;
    $doseActive = false;
    $adminActive = true;
@endphp

@include('shared.navbar')
        <h1>Admin's details</h1>
        <p>Fullname: {{ $admin->fullname }}</p>
        <p>Email: {{ $admin->email }}</p>
        <br/>
        <a href="{{ route('admins.index'); }}">Back</a>
@include('shared.footer')