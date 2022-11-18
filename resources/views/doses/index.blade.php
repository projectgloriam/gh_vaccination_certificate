@include('shared.header')

@php
    $userActive = false;
    $doseActive = true;
    $adminActive = false;
@endphp

@include('shared.navbar')
        <h1>Dose List</h1>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doses as $dose) 
                        <tr>
                            <td>
                                {{ $dose->name }}
                            </td>
                            <td colspan="3">
                                <div class="flex-container">
                                    <a href="{{ route('doses.show', [ 'dose' => $dose ]); }}" class="buttonLink">Show</a>
                                    <a href="{{ route('doses.edit', [ 'dose' => $dose ]); }}" class="buttonLink">Edit</a>
                                    <form method="POST" action="{{ route('doses.destroy', [ 'dose' => $dose ]); }}">
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
        <a href="{{ route('doses.create'); }}" class="txtlink">New Dose</a>
    @include('shared.footer')