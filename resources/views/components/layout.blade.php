@props(['active' => false])

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    * {
        box-sizing: border-box;
        user-select: none;
    }

    input[type=color]::-webkit-color-swatch {
      border: 4px solid teal;
      border-radius: 10px;
    }
  </style>
</head>

<body class="relative h-screen bg-[url('/images/background.jpg')] bg-center bg-no-repeat bg-cover font-sans subpixel-antialiased">
    <section {{ $attributes->merge(['class' => "flex h-screen"]) }}>
      {{ $slot }}
    </section>
</body>
<x-flash></x-flash>
</html>