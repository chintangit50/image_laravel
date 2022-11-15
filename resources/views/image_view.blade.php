<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Image View</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
}
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}
        </style>
    </head>
    <body class="antialiased">
        <div class="container text-center">
            <div class="row mt-5">
              <div class="col-12">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}
                    </div>
                @endif
                <ul class="breadcrumb">
                    @php
                    $folderName = explode('/',asset('images/uploads'));
                    @endphp
                    <li><a href="javascript:void(0)">{{ $folderName[4] }}</a></li>
                    <li><a href="javascript:void(0)">{{ $folderName[5] }}</a></li>
                    <li><a href="javascript:void(0)">{{ $folderName[6] }}</a></li>
                </ul>
                <div class="col-12">
                    <div class="card">
                        <a href="{{route('welcome')}}" class="btn btn-info float-right ml-2 mt-2 mb-3 col-sm-2">Upload Image</a>
                        <div class="card-body">
                            @foreach ($images as $item)
                                <img src="{{asset('images/uploads')}}/{{$item['image']}}" width="259" height="194" alt="{{$item['image']}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
