<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Post</title>
</head>

<body>

<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Add Data Book 
                </div>
                <div class="card-body">
                    <form action="/book/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Book Title</label>
                            <input type="text" name="book_title" placeholder="Type your book title..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Writer </label>
                          <select  class="form-control" style="width: 100%;"  name="writer_id" id="writer_id">
                          <option value>-- Choose Writer --</option>
                          @foreach ( $writers as $writer )
                              <option value="{{ $writer->id }}">{{ $writer->writer_name }}</option>
                          @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Book Price</label>
                            <input type="text" name="book_price" placeholder="Type your book price..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Book Type</label>
                            <input type="text" name="book_type" placeholder="Type your book type..." class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <button type="reset" class="btn btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>