@props(['active' => false])

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    * {
        box-sizing: border-box;
        user-select: none;
    }
  </style>
</head>

<body class="relative h-screen bg-[url('/images/background.jpg')] bg-center bg-no-repeat bg-cover">
    @include("_header")
    <section class="flex h-screen justify-center items-center">
    {{ $slot }}
    </section>
    @if ($active) 
        @include("_footer")
    @endif
</body>
<x-flash></x-flash>
</html>