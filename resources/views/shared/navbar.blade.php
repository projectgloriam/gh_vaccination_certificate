<ul class="horizontal">
    <li><a @class([
        'active' => $userActive
    ]) href="{{ route('users.index'); }}">Home</a></li>
    <li><a @class([
        'active' => $doseActive
    ]) href="{{ route('doses.index'); }}">Doses</a></li>
    <li><a @class([
        'active' => $adminActive
    ]) href="{{ route('admins.index'); }}">Admin</a></li>
    <li class="rightli" style="float:right">
        <form id="logout" method="POST" action="{{ route('logout'); }}">
            @csrf
            <a href="#" onclick="logout()">Logout</a>
        </form>
    </li>
</ul>