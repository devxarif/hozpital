<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
