@include('shared.header')
@php
    $userActive = true;
    $doseActive = false;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>User's details</h1>
        <div class="column">
            <div class="card">
                {{ $user->getFirstMedia() }}
                <div class="details-container">
                    <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                    <p class="title">{{ $user->address }}</p>
                    <p>
                        @if ($user->vaccinated)
                            {{ $user->first_name }} {{ $user->last_name }} is vaccinated &nbsp;
                            <img src="{{ Vite::asset('resources/images/Check_green_circle.svg.png') }}" width="60" height="60">
                        @else
                            {{ $user->first_name }} {{ $user->last_name }} is not yet vaccinated &nbsp;
                            <img src="{{ Vite::asset('resources/images/Red_X.svg.png') }}" width="60" height="60">
                        @endif
                    </p>
                    <p>Location is at {{ $user->location }}</p>
                    <p>{{ $user->phone }}</p>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <p>Here is the QR code: </p>

        {!! $user->qr_code !!}

        <br/>
        <br/>
        <a class="txtlink" href="{{ route('users.index'); }}">Back</a>
@include('shared.footer')