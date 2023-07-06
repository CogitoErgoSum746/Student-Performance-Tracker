<table>
    <tr>
        <td>name</td>
        <td>role</td>
        <td>email</td>
    </tr>
    @foreach($users as $u)
    <tr>
        <td>$u->name</td>
        <td>$u->role</td>
        <td>$u->email</td>
    </tr>
    @endforeach
</table>