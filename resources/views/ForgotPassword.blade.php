<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
        <link rel="stylesheet" href="/resources/css/custom.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="{{ asset('public/logo.png') }}" type="image/icon type">
    </head>

    <body class="p-4 md:p-0">
        <div class="p-2">
            <a href="/"><img src="{{ asset('public/logo.png') }}" class="w-26 h-20 logocrmdsrlogin" alt="CRM DSR" title="CRM DSR"></a>
        </div>

        @if (session('error'))
        <div class="bg-danger-100 text-danger-700 mb-4 rounded-lg px-6 py-5 text-base" role="alert">
            {{ session('error') }}
        </div>
    @endif

        <div class="grid place-items-center blocco">
            <div class="block w-full rounded-lg border p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] md:w-96c">
                <form method="post" action="{{ route('password.forgot.submit') }}">
                    @csrf
                    <div class="bg-warning-100 text-warning-800 mb-4 rounded-lg px-6 py-5 text-base" role="alert">
                        Inserire nome utente o email e cliccare
                        su Invia per ricevere un codice via email
                    </div>
                    <br>
                    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1" placeholder="Example label" name="username" required/>
                        <label for="exampleFormControlInput1"
                            class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                            Nome utente o Email
                        </label>
                    </div>

                    <!--Sign in button-->
                    <button type="submit"
                        class="button-main"
                        data-te-ripple-init data-te-ripple-color="light">
                        Invia
                    </button>


                    <!--Register link-->
                    <p class="mt-6 text-center text-neutral-800 dark:text-neutral-200">
                        <a href="{{ route('register') }}"
                            class="text-primary hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600 transition duration-150 ease-in-out">Registrazione</a>
                    </p>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    fontFamily: {
                        sans: ["Roboto", "sans-serif"],
                        body: ["Roboto", "sans-serif"],
                        mono: ["ui-monospace", "monospace"],
                    },
                },
                corePlugins: {
                    preflight: false,
                },
            };
        </script>
    </body>

</html>
