<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"><strong>M2KM</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" >
            <li class="nav-item">
              <a class="nav-link" href="{{url('home')}}" style="color:white;text-decoration:none;">Home</a>
            </li>
            <li>
                <a class="nav-link" href="{{url('user')}}" style="color:white;text-decoration:none;">User</a>
            </li>
          </ul>
        </div>
      </nav>

    <div style="text-align: center; padding:5% 20%;">
        <h2>Data User</h2>
        @if($errors->has('nama'))
            <div class="alert alert-danger">{{ $errors->first('nama') }}</div>
        @endif
        @if($errors->has('usia'))
            <div class="alert alert-danger">{{ $errors->first('usia') }}</div>
        @endif
        @if($errors->has('kota'))
            <div class="alert alert-danger">{{ $errors->first('kota') }}</div>
        @endif
        <br>
        <table class="table table-bordered">
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
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data User</button>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{url('register')}}" method="post">
                    @csrf
                    <label for="">Nama</label>
                    <input class="form-control" type="text" name="nama"> <br>
                    <label for="">Usia</label>
                    <input class="form-control" type="number" name="usia"><br>
                    <label for="">Kota</label>
                    <input class="form-control" type="text" name="kota">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
          </div>
        </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
