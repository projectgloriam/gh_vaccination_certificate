@include('shared.header')
@php
    $userActive = true;
    $doseActive = false;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>New User</h1>
        <div class="formDiv">
            <form id="newUser" method="POST" action="{{ route('users.store'); }}"  enctype="multipart/form-data" >
                @csrf
                
                <label for="first_name">First name:</label>
                <input type="text" id="first_name" name="first_name">

                <label for="last_name">Last name:</label>
                <input type="text" id="last_name" name="last_name">

                <label for="location">Location:</label>
                <input type="text" id="location" name="location">

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address">

                </br>
                </br>
                <label class="file" for="certificate">
                    <input type="file" id="certificate" name="certificate" aria-label="File browser" accept="image/png, image/jpeg">
                    <span class="file-custom"></span>
                </label>
                
                </br> </br>
                <h2>Doses</h2>
                @foreach ($doses as $dose) 
                    <label class="checkbox-container" for="dose{{ $dose->id }}">{{ $dose->name }}
                        <input type="checkbox" id="dose{{ $dose->id }}" name="dose[]" value="{{ $dose->id }}" >
                        <span class="checkmark"></span>
                    </label>
                @endforeach

                <!-- The Modal -->
                <div id="emailAuthModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>
                            <label for="smtpEmail">Gmail Email:</label>
                            <input type="email" id="smtpEmail" name="smtpEmail" placeholder="Your Gmail email..">

                            <label for="smtpPassword">Gmail Password:</label>
                            <input type="password" id="smtpPassword" name="smtpPassword" placeholder="Your Gmail password..">

                            <a id="smtpButton" href="#" class="txtlink">Send</a>
                        </p>
                    </div>
                </div>

                <input type="submit" value="Save" />
            </form>
        </div>
        <br/>
        <a href="{{ route('users.index'); }}" class="txtlink">Back</a>
        
@include('shared.footer')