@include('shared.header')

@php
    $userActive = false;
    $doseActive = false;
    $adminActive = true;
@endphp

@include('shared.navbar')
        <h1>New Admin</h1>
        <div class="formDiv">
            <form method="POST" action="{{ route('admins.store'); }}"  >
                @csrf
                
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">

                <input type="submit" value="Save" />
            </form>
        </div>
        <br/>
        <a href="{{ route('admins.index'); }}">Back</a>
    @include('shared.footer')