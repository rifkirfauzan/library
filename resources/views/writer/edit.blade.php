<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit data post</title>
</head>

<body>

<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Edit Data Writer
                </div>
                <div class="card-body">
                    <form action="/writer/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Writer Name</label>
                            <input type="text" name="writer_name" placeholder="Type your writer name here..." class="form-control" value="{{ $writer->writer_name }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea name="address" id="address" cols="30" rows="5" class="form-control  @error('address') is-invalid @enderror" name="description">{{ $writer->address }}</textarea>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number" placeholder="Type your phone_number..." class="form-control" value="{{ $writer->phone_number }}">
                        </div>

                        <div class="form-group">
                            <label>Book Publish</label>
                            <input type="text" name="book_publish" placeholder="Type your book publish..." class="form-control" value="{{ $writer->book_publish }}">
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
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>