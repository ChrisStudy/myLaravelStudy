<!DOCTYPE html>
<html>
<head>
  <title>@yield('title','Laracasts')</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
      <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css')}}">
      <style>
        .is-complete {
          text-decoration: line-through;
        }
      </style>

</head>
<body style="margin: 40px;">

  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About Us</a></li>
    <li><a href="/contact">Contact Us</a></li>
    <li><a href="/projects">Projects</a></li>
    <li><a href="/projects/create">Create a Project</a></li>

  </ul>

    @yield('content')

    <script src="{{ mix('/js/app.js')}}"></script>
</body>
</html>
