@include('shared.header')

@php
    $userActive = false;
    $doseActive = false;
    $adminActive = true;
@endphp

@include('shared.navbar')
        <h1>List of Admins</h1>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>
                            Fullname
                        </th>
                        <th>
                            Email
                        </th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin) 
                        <tr>
                            <td>
                                {{ $admin->fullname }}
                            </td>
                            <td>
                                {{ $admin->email }}
                            </td>
                            <td colspan="3">
                                <div class="flex-container">
                                    <a href="{{ route('admins.show', [ 'admin' => $admin ]); }}" class="buttonLink">Show</a>
                                    <a href="{{ route('admins.edit', [ 'admin' => $admin ]); }}" class="buttonLink">Edit</a>
                                    <form method="POST" action="{{ route('admins.destroy', [ 'admin' => $admin ]); }}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" style="background-color: #f44336;"  value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br/>
        <a href="{{ route('admins.create'); }}" class="txtlink">New Admin</a>
@include('shared.footer')