<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="{{ asset('public/logo.jpg') }}" type="image/icon type">
    </head>

    <body class="bg-slate-100">
        <div class="p-2">
            <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
            <img src="{{ asset('public/logo.jpg') }}"
                class="h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                alt="" />
        </div>

        <br>
        <div class="p-2 mb-2">
            <div class="block w-4/6 rounded-lg bg-white p-6">
        @foreach ($users as $info)
            

                   <div class="grid grid-cols-2 mb-2">
                        <div>
                            <h2 class="font-bold">Nome</h2>
                            <p>{{ $info->Nome }}</p>
                        </div>

                        <div>
                            <h2 class="font-bold">Mail</h2>
                            <p>{{ $info->mail }}</p>
                        </div>
                   </div>

                   <hr>
             
        @endforeach
    </div>
</div>

        <script>
            // page load complete then print
            window.onload = function() {
                window.print();
            }
        </script>
    </body>

</html>
