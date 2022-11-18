@include('shared.header')

@php
    $userActive = true;
    $doseActive = false;
    $adminActive = false;
@endphp

@include('shared.navbar')

        <h1>List of Patients</h1>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>
                            First name
                        </th>
                        <th>
                            Last name
                        </th>
                        <th>
                            Vaccinated
                        </th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user) 
                        <tr>
                            <td>
                                {{ $user->first_name }}
                            </td>
                            <td>
                                {{ $user->last_name }}
                            </td>
                            <td>
                                @if ($user->vaccinated)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td colspan="3">
                                <div class="flex-container">
                                    <a href="{{ route('users.show', [ 'user' => $user ]); }}" class="buttonLink">Show</a>
                                    <a href="{{ route('users.edit', [ 'user' => $user ]); }}" class="buttonLink">Edit</a>
                                    <form method="POST" action="{{ route('users.destroy', [ 'user' => $user ]); }}" style="height: inherit;">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" style="background-color: #f44336;" value="Delete"/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br/>
        <a href="{{ route('users.create'); }}" class="txtlink">New User</a>
@include('shared.footer')