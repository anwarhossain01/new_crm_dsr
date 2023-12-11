<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="{{ asset('public/logo.jpg') }}" type="image/icon type">

        @push('css')
        @endpush
    </head>

    <body class="bg-slate-200">
        <div class="p-4">


            <nav
                class="flex-no-wrap relative flex w-full items-center justify-between bg-[#FBFBFB] py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 print:hidden lg:flex-wrap lg:justify-start lg:py-4">
                <div class="flex w-full flex-wrap items-center justify-between px-3">
                    <!-- Hamburger button for mobile view -->
                    <button
                        class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                        type="button" data-te-collapse-init data-te-target="#navbarSupportedContent12"
                        aria-controls="navbarSupportedContent12" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- Hamburger icon -->
                        <span class="[&>svg]:w-7">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-7 w-7">
                                <path fill-rule="evenodd"
                                    d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>

                    <!-- Collapsible navigation container -->
                    <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
                        id="navbarSupportedContent12" data-te-collapse-item>
                        <!-- Logo -->
                        <a class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
                            href="#">
                            <img src="{{ asset('public/logo.jpg') }}" style="height: 31px" alt="TE Logo"
                                loading="lazy" />
                        </a>
                        <!-- Left navigation links -->
                        <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <!-- Dashboard link -->
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                    href="{{ route('index') }}" data-te-nav-link-ref>Dashboard</a>
                            </li>

                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                                    onclick="printSelectionsForPage()" href="#" data-te-nav-link-ref>Stampa questa
                                    pagina</a>
                            </li>

                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                                    href="{{ Auth::user()->Gruppo == 'Admin' ? (Str::startsWith(Route::currentRouteName(), 'collab') ? route('print.collab.all') : route('print.all')) : route('print.user.all') }}"
                                    data-te-nav-link-ref>Stampa tutto</a>
                            </li>

                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                                    href="{{ route('search.advance') }}" data-te-nav-link-ref>Ricerca avanzata</a>
                            </li>

                            @if (Auth::user()->Gruppo == 'Admin')
                                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                    <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                                        href="{{ route('import.document') }}" data-te-nav-link-ref>Importa</a>
                                </li>

                                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                    <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                                        href="#" onclick="printForExportAll()" data-te-nav-link-ref>Esporta i risultati</a>
                                </li>
                            @endif

                        </ul>
                    </div>

                    <!-- Right elements -->
                    <div class="relative flex items-center">

                        @php
                            $user = Auth::user();
                        @endphp
                        @if ($user->Gruppo == 'Admin')
                            @include('layout.templates.new_user')
                        @endif


                        <!-- Second dropdown container -->
                        <div class="relative" data-te-dropdown-ref data-te-dropdown-alignment="end">
                            <!-- Second dropdown trigger -->
                            <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                                href="#" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref
                                aria-expanded="false">
                                <!-- User avatar -->
                                <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </a>
                            <!-- Second dropdown menu -->
                            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                                <!-- Second dropdown menu items -->
                                <li>
                                    <a class="flex w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                        href="{{ route('password.change', Auth::user()->ID) }}" data-te-dropdown-item-ref>
                                        <svg class="mr-2 h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.5 8C5.80777 8 5.13108 7.79473 4.55551 7.41015C3.97993 7.02556 3.53133 6.47893 3.26642 5.83939C3.00152 5.19985 2.9322 4.49612 3.06725 3.81719C3.2023 3.13825 3.53564 2.51461 4.02513 2.02513C4.51461 1.53564 5.13825 1.2023 5.81719 1.06725C6.49612 0.932205 7.19985 1.00152 7.83939 1.26642C8.47893 1.53133 9.02556 1.97993 9.41015 2.55551C9.79473 3.13108 10 3.80777 10 4.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M6.5 17H1V15C1 13.9391 1.42143 12.9217 2.17157 12.1716C2.92172 11.4214 3.93913 11 5 11"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19.5 11H18.38C18.2672 10.5081 18.0714 10.0391 17.801 9.613L18.601 8.818C18.6947 8.72424 18.7474 8.59708 18.7474 8.4645C18.7474 8.33192 18.6947 8.20476 18.601 8.111L17.894 7.404C17.8002 7.31026 17.6731 7.25761 17.5405 7.25761C17.4079 7.25761 17.2808 7.31026 17.187 7.404L16.392 8.204C15.9647 7.93136 15.4939 7.73384 15 7.62V6.5C15 6.36739 14.9473 6.24021 14.8536 6.14645C14.7598 6.05268 14.6326 6 14.5 6H13.5C13.3674 6 13.2402 6.05268 13.1464 6.14645C13.0527 6.24021 13 6.36739 13 6.5V7.62C12.5081 7.73283 12.0391 7.92863 11.613 8.199L10.818 7.404C10.7242 7.31026 10.5971 7.25761 10.4645 7.25761C10.3319 7.25761 10.2048 7.31026 10.111 7.404L9.404 8.111C9.31026 8.20476 9.25761 8.33192 9.25761 8.4645C9.25761 8.59708 9.31026 8.72424 9.404 8.818L10.204 9.618C9.9324 10.0422 9.73492 10.5096 9.62 11H8.5C8.36739 11 8.24021 11.0527 8.14645 11.1464C8.05268 11.2402 8 11.3674 8 11.5V12.5C8 12.6326 8.05268 12.7598 8.14645 12.8536C8.24021 12.9473 8.36739 13 8.5 13H9.62C9.73283 13.4919 9.92863 13.9609 10.199 14.387L9.404 15.182C9.31026 15.2758 9.25761 15.4029 9.25761 15.5355C9.25761 15.6681 9.31026 15.7952 9.404 15.889L10.111 16.596C10.2048 16.6897 10.3319 16.7424 10.4645 16.7424C10.5971 16.7424 10.7242 16.6897 10.818 16.596L11.618 15.796C12.0422 16.0676 12.5096 16.2651 13 16.38V17.5C13 17.6326 13.0527 17.7598 13.1464 17.8536C13.2402 17.9473 13.3674 18 13.5 18H14.5C14.6326 18 14.7598 17.9473 14.8536 17.8536C14.9473 17.7598 15 17.6326 15 17.5V16.38C15.4919 16.2672 15.9609 16.0714 16.387 15.801L17.182 16.601C17.2758 16.6947 17.4029 16.7474 17.5355 16.7474C17.6681 16.7474 17.7952 16.6947 17.889 16.601L18.596 15.894C18.6897 15.8002 18.7424 15.6731 18.7424 15.5405C18.7424 15.4079 18.6897 15.2808 18.596 15.187L17.796 14.392C18.0686 13.9647 18.2662 13.4939 18.38 13H19.5C19.6326 13 19.7598 12.9473 19.8536 12.8536C19.9473 12.7598 20 12.6326 20 12.5V11.5C20 11.3674 19.9473 11.2402 19.8536 11.1464C19.7598 11.0527 19.6326 11 19.5 11ZM14 14.5C13.5055 14.5 13.0222 14.3534 12.6111 14.0787C12.2 13.804 11.8795 13.4135 11.6903 12.9567C11.5011 12.4999 11.4516 11.9972 11.548 11.5123C11.6445 11.0273 11.8826 10.5819 12.2322 10.2322C12.5819 9.8826 13.0273 9.6445 13.5123 9.54804C13.9972 9.45157 14.4999 9.50108 14.9567 9.6903C15.4135 9.87952 15.804 10.2 16.0787 10.6111C16.3534 11.0222 16.5 11.5055 16.5 12C16.5 12.663 16.2366 13.2989 15.7678 13.7678C15.2989 14.2366 14.663 14.5 14 14.5Z"
                                                fill="currentColor" />
                                        </svg>

                                        Cambia Password</a>
                                </li>
                                <li>
                                    <a class="flex w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                        href="{{ route('logout') }}" data-te-dropdown-item-ref>
                                        <svg class="mr-2 h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                        </svg>

                                        Logout</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <br><br>
            @yield('content')
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

        <script>
            let checkInputsAll = [];

            function addAllCheckboxForPage() {

                checkInputsAll = [];
                // Check the current route name
                let currentRoute = "{{ Route::currentRouteName() }}";

                // Set checkboxes based on the route name
                if (currentRoute.startsWith("collab")) {
                    checkboxes = document.querySelectorAll('.info-checks-collab');
                } else {
                    checkboxes = document.querySelectorAll('.info-checks');
                }


                checkboxes.forEach(element => {
                    checkInputsAll.push(element.value);
                });

            }

            function printSelectionsForPage() {
                addAllCheckboxForPage();
                // if checkInputs empty
                if (checkInputsAll.length == 0) {
                    return;
                }

                // Create a form element
                var form = document.createElement('form');
                form.method = 'POST'; // Use POST method
                let currentRoute = "{{ Route::currentRouteName() }}";

                // Set form action based on the route name
                if (currentRoute.startsWith("collab")) {
                    form.action = '{{ route('print.collab') }}';
                } else {
                    form.action = '{{ route('print.page') }}';
                }



                // Create an input for CSRF token
                var csrfTokenInput = document.createElement('input');
                csrfTokenInput.type = 'hidden';
                csrfTokenInput.name = '_token';
                csrfTokenInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfTokenInput);

                // Create an input element for each ID
                checkInputsAll.forEach(function(id) {
                    var input = document.createElement('input');
                    input.type = 'hidden'; // Hidden input
                    input.name = 'ids[]'; // Use an array for multiple values
                    input.value = id;
                    form.appendChild(input);
                });

                // Append the form to the body
                document.body.appendChild(form);

                // Submit the form
                form.submit();

            }

            function printForExportAll() {
                addAllCheckboxForPage();
                // if checkInputs empty
                if (checkInputsAll.length == 0) {
                    return;
                }
                // Create a form element
                var form = document.createElement('form');
                form.method = 'POST'; // Use POST method

                form.action = '{{ route('export.choose') }}';

                // Create an input for CSRF token
                var csrfTokenInput = document.createElement('input');
                csrfTokenInput.type = 'hidden';
                csrfTokenInput.name = '_token';
                csrfTokenInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfTokenInput);

                // Create an input element for each ID
                checkInputsAll.forEach(function(id) {
                    var input = document.createElement('input');
                    input.type = 'hidden'; // Hidden input
                    input.name = 'ids[]'; // Use an array for multiple values
                    input.value = id;
                    form.appendChild(input);
                });

                let currentRoute = "{{ Route::currentRouteName() }}";
                if (currentRoute.startsWith("collab")) {
                    // make a new hidden input
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'type';
                    input.value = 'collab';
                    form.appendChild(input);
                }else{
                    // make a new hidden input
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'type';
                    input.value = 'anagraph';
                    form.appendChild(input);
                }
                // Append the form to the body
                document.body.appendChild(form);

                // Submit the form
                form.submit();
            }
        </script>
    </body>

</html>
