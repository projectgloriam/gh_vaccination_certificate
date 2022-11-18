@include('shared.header')
@php
    $userActive = true;
    $doseActive = false;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>Update user</h1>
        <div class="formDiv">
            <form method="POST" action="{{ route('users.update', ['user' => $user]); }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <label for="first_name">First name:</label>
                <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}">

                <label for="last_name">Last name:</label>
                <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}">

                <label for="location">Location:</label>
                <input type="text" id="location" name="location"  value="{{$user->location}}">

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{$user->phone}}">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{$user->email}}">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{$user->address}}">

                </br></br>
                <label class="checkbox-container" for="vaccinated">
                    Vaccinated
                    <input type="checkbox" id="vaccinated" name="vaccinated" value="{{ $user->vaccinated }}" 
                    @if($user->vaccinated == true) checked @endif 
                    >
                    <span class="checkmark"></span>
                </label>

                </br></br>
                <label class="file" for="certificate">
                    <input type="file" id="certificate" name="certificate" aria-label="File browser" accept="image/png, image/jpeg">
                    <span class="file-custom"></span>
                </label>

                </br> </br>
                <h2>Doses</h2>
                @foreach ($doses as $dose) 
                    <label class="checkbox-container" for="dose{{ $dose->id }}">
                        {{ $dose->name }}
                        <input type="checkbox" id="dose{{ $dose->id }}" name="dose[]" value="{{ $dose->id }}" 
                        @if($user->doses()->where('dose_id', $dose->id)->count() > 0) checked @endif 
                        >
                        <span class="checkmark"></span>
                    </label>
                @endforeach

                <input type="submit" value="Update" />
                
            </form>
        </div>
        <br/>
        <a href="{{ route('users.index'); }}" class="txtlink">Back</a>
@include('shared.footer')