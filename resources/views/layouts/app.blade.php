<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
  @include('includes.style')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      @yield('content')
    </section>
  </div>
@include('includes.script')
</body>


</html>