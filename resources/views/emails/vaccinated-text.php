Congratulations.
Dear {{ $user->first_name }} {{ $user->last_name }}, 
    @if ($user->vaccinated)
        Your vaccination was successful.
    @else
        Your vaccination was not successful.
    @endif

    {{ $user->first_name }} {{ $user->last_name }}
    {{ $user->address }}
    Your location is at {{ $user->location }}
    {{ $user->phone }}
    {{ $user->email }}