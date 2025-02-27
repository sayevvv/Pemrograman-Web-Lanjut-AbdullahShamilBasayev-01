<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-nav></x-nav>
    <section class="flex flex-col h-screen bg-white m-0 mt-3">
        <main>
            {{ $slot }}
        </main>
    </section>
</body>
</html>
