<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Users</title>
    </head>
    <body>
        <table>
            <tr>
                <td>No.</td>
                <td>Name</td>
                <td>E-mail</td>
            </tr>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
