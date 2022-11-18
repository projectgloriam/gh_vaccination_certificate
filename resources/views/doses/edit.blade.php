@include('shared.header')

@php
    $userActive = false;
    $doseActive = true;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>Edit Dose</h1>
        <div class="formDiv">
            <form method="POST" action="{{ route('doses.update', ['dose' => $dose]); }}">
                @method('PATCH')
                @csrf
            
                <label for="=name">Name:</label>
                <input type="text" id="=name" name="name" value="{{$dose->name}}">

                <input type="submit" value="Update" />
            </form>
        </div>
        <br/>
        <a href="{{ route('doses.index'); }}">Back</a>
@include('shared.footer')