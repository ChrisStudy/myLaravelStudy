<!DOCTYPE html>
<html>
<head>
  <title>@yield('title','Laracasts')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
</head>
<body>
  <h1>This is the working header!</h1>
<div class="container">
	@yield(content);

</div>

</body>
</html>
