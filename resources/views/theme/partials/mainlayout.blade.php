<!DOCTYPE html>
<html lang="en">
<head>
  @include('theme/partials/head')
</head>
<body>
  @include('theme/partials/nav')

  @yield('content')
  @include('theme/partials/footer')
  @include('theme/partials/footerscript')
</body>
</html>