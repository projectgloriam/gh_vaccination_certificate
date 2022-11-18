@include('shared.header')

@php
    $userActive = false;
    $doseActive = false;
    $adminActive = true;
@endphp

@include('shared.navbar')
        <h1>Update Admin</h1>
        <div class="formDiv">
            <form method="POST" action="{{ route('admins.update', ['admin' => $admin]); }}" >
                @method('PATCH')
                @csrf
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" value="{{$admin->fullname}}">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{$admin->email}}">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">

                <input type="submit" value="Update" />
                
            </form>
        </div>
        <br/>
        <a href="{{ route('admins.index'); }}">Back</a>
    @include('shared.footer')