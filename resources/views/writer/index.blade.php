<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Application Library</title>
  </head>

  <body>
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <a class="nav-link" href="/writer/index">Writer</a>
                  </div>
                </div>
              </div>
            </nav>
            <div class="card-header">
            </div>
            <div class="card-body">
              <a href="/writer/create" class="btn btn-md btn-success" style="margin-bottom: 10px">ADD DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Writer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Book publish</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($writers as $writer)
                  <tr>
                      <td>{{$writer->writer_name }}</td>
                      <td>{{ $writer->address }}</td>
                      <td>{!! $writer->phone_number !!}</td>
                      <td>{!! $writer->book_publish !!}</td>
                      <td class="text-center">
                        <form onsubmit="return confirm('Are you sure want to delete ?');" action="/writer/destroy/{{ $writer->id }}" method="POST">
                            <a href="/writer/edit/{{ $writer->id }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>