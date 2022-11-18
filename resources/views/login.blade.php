@include('shared.header')
        <h1>Login</h1>
        <div class="formDiv">
            <form method="POST" action="{{ route('authenticate'); }}"  >
                @csrf

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your email..">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Your password..">

                <input type="submit" value="Login"/>
            </form>
        </div>
@include('shared.footer')