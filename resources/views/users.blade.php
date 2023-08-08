<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{url('register')}}" method="post">
        @csrf
        <label for="">Nama</label>
        <input type="text" name="nama"> <br>
        <label for="">Usia</label>
        <input type="text" name="usia"><br>
        <label for="">Kota</label>
        <input type="text" name="kota">
        <br>
        <button type="submit">Daftar</button>
    </form>
    <table>
        <tr>
            <th>Nama</th>
            <th>Usia</th>
            <th>Kota</th>
        </tr>
        @foreach($data_user as $user)
        <tr>
            <td>{{$user->nama}}</td>
            <td>{{$user->usia}}</td>
            <td>{{$user->kota}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
