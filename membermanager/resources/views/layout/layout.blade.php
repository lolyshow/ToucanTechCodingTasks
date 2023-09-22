<!DOCTYPE html>
<html>
<head>
    <title>Member Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

</head>
<body>
   
<div class="container-fluid">
    <div class="row justify-content-center">
        @include('layout.sidebar')
        <div class="col-md-9 col-lg-10">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>