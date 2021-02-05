<!DOCTYPE
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>CRUD Eloquent Laravel</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
            <div class="card-header text-center">
                    CRUD Eloquent Laravel 05-Feb-2021
                </div>
                <div class="card-body">
                    <a href="/items/add" class="btn btn-primary">Input New Item</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->alamat }}</td>
                                <td>
                                    <a href="/items/edit/{{ $i->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/items/delete/{{ $i->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>