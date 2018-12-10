<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/portfolio/navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/portfolio/upload.css') }}" rel="stylesheet">
        <title>Upload Image</title>
    </head>
    <body>
        @include('../portfolio/navbar')
        <div class="container">

            <div class="panel panel-primary">

                <div class="panel-body">

                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <strong>{{ $message }}</strong>

                        </div>

                        <img src="images/{{ Session::get('image') }}">

                    @endif

                    @if (count($errors) > 0)

                        <div class="alert alert-danger">

                            <strong>Whoops!</strong> There were some problems with your input.

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('UploadImage') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-md-6">

                                <input type="file" name="image" class="form-control">

                            </div>

                            <div class="col-md-6">

                                <button type="submit" class="btn btn-success">Upload</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </body>
</html>