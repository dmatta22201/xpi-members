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

   <!-- Styles -->
   @vite('resources/css/app.css')
</head>

<body>
   {{ $slot }}
</body>

</html>
