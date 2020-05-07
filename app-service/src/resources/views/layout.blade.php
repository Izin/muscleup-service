<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MuscleUp</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
  <style>
    .container {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <h1><i class="fa fa-dumbbell"></i> MuscleUp (CRUD)</h1>
    </div>
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
