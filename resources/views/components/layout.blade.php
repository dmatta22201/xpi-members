{{--
    General layout of web pages. Should be used by all pages unless otherwise noted in that page's content.
--}}
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Xanodria Productions, Inc. Members Site</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

   <!-- Contains various iconography as text. -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Styles -->
   @vite('resources/css/app.css')
</head>

<body class='font-Inter bg-xpi-white'>
   @if (isset($suppressNav))
      <x-common.header suppressNav />
   @else
      <x-common.header />
   @endif
   {{ $slot }}
   <x-common.footer />
</body>

</html>
