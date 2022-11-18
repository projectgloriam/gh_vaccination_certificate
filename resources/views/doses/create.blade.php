@include('shared.header')

@php
    $userActive = false;
    $doseActive = true;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>New Dose</h1>
        <div class="formDiv">
            <form method="POST" action="{{ route('doses.store'); }}">
                @csrf
                
                <label for="=name">Name:</label>
                <input type="text" id="=name" name="name">

                <input type="submit" value="Save" />
            </form>
        </div>
        <br/>
        <a href="{{ route('doses.index'); }}">Back</a>
@include('shared.footer')