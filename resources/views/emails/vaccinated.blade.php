@include('shared.header')
        <h1>Congratulations</h1>
        <p>Dear {{ $user->first_name }} {{ $user->last_name }}, </p>
        <p>
            @if ($user->vaccinated)
                Your vaccination was successful.
            @else
                Your vaccination was not successful.
            @endif
        </p>

        <div class="column">
            <div class="card">
                <div class="details-container">
                    <p class="title">Please open the attachment to scan the QR code to see your certificate.</p>
                </div>
            </div>
        </div>
@include('shared.footer')