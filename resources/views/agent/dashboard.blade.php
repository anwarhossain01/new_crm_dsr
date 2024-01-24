@extends('layout.master')

@section('content')
    @include('layout.templates.new_record_modal')

    <div class="mb-2 flex flex-wrap items-center justify-between">
        <div class="">
            <form action="{{ route('collab.search') }}" method="get">
                @csrf
                <div class="relative mb-4 flex w-full flex-wrap items-stretch">

                    <input type="search"
                        class="focus:border-primary dark:focus:border-primary relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon1" name="search" />

                    <!--Search button-->
                    <button
                        class="bg-primary hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-800 relative z-[2] flex items-center rounded-r px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                        type="submit" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                </div>

            </form>
        </div>

        <div class="flex justify-end">

            <button data-te-toggle="modal" data-te-target="#exampleModalXl" data-te-ripple-init data-te-ripple-color="light"
                type="button "
                class="bg-success hover:bg-success-600 focus:bg-success-600 active:bg-success-700 mr-2 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                Aggiungi nuovo
            </button>

            <button type="button" onclick="printSelections(this)"
                class="bg-info hover:bg-info-600 focus:bg-info-600 active:bg-info-700 mr-2 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
                Stampa la selezione
            </button>

        </div>
    </div>

    @if (auth()->user()->notes)
        <div class="flex justify-center">
            <div class="text-warning-800 mb-3 hidden w-1/2 items-center rounded-lg border-2 border-solid border-red-500 px-6 py-5 text-base data-[te-alert-show]:inline-flex"
                role="alert" data-te-alert-init data-te-alert-show>
                {{ auth()->user()->notes }}
                <button type="button"
                    class="text-warning-900 hover:text-warning-900 ml-auto box-content rounded-none border-none p-1 opacity-50 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-alert-dismiss aria-label="Close">
                    <span
                        class="w-[1em] text-red-500 focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                            <path fill-rule="evenodd"
                                d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    @endif

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                                <th scope="col" class="px-6 py-4">Actions</th>
                                <th scope="col" class="px-6 py-4">
                                    <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="checked:border-primary checked:bg-primary dark:checked:border-primary dark:checked:bg-primary relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="checkbox" onclick="addAllCheckbox()" value=""
                                            id="checkboxDefault" />

                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4">Data Modifica</th>
                                <th scope="col" class="px-6 py-4">Stato</th>
                                <th scope="col" class="px-6 py-4">Azienda</th>
                                <th scope="col" class="px-6 py-4">Telefono</th>
                                <th scope="col" class="px-6 py-4">Referente</th>
                                <th scope="col" class="px-6 py-4">Cellulare</th>
                                <th scope="col" class="px-6 py-4">Ufficio</th>
                                <th scope="col" class="px-6 py-4">Mail</th>
                                <th scope="col" class="px-6 py-4">Sito web</th>
                                <th scope="col" class="px-6 py-4">Part. Eventi</th>
                                <th scope="col" class="px-6 py-4">Tipologia</th>
                                <th scope="col" class="px-6 py-4">Creazione</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($information as $info)
                                <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <button type="button" data-te-ripple-init data-te-ripple-color="light"
                                            class="bg-primary hover:bg-primary-600 focus:bg-primary-600 active:bg-primary-700 inline-block rounded-full p-2 uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                            <svg class="h-3 w-3 text-white dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                            <input
                                                class="info-checks checked:border-primary checked:bg-primary dark:checked:border-primary dark:checked:bg-primary relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                                onclick="Checkbox({{ $info->ID }})" type="checkbox"
                                                value="{{ $info->ID }}" id="checkboxDefault" />

                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{ \Carbon\Carbon::parse($info->datamodif)->format('d/n/Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Agente }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Azienda }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Telefono }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Referente }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Cell }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Tel_Uf }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Mail }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Sito }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Part_Ev == 'SI' ? 'Si' : 'No' }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $info->Tip_Cliente }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{ \Carbon\Carbon::parse($info->Data_Creaz)->format('d/n/Y \a\t h:i:s A') }}

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    {{ $information->links() }}

    <script>
        let checkInputs = [];
        let allChecked = false;

        function Checkbox(id) {

            if (checkInputs.includes(id)) {
                checkInputs.splice(checkInputs.indexOf(id), 1);
            } else {
                checkInputs.push(id);
            }

            console.log(checkInputs);
        }

        function addAllCheckbox() {

            checkInputs = [];

            let checkboxes = document.querySelectorAll('.info-checks');

            if (allChecked == false) {
                checkboxes.forEach(element => {
                    checkInputs.push(element.value);
                    element.checked = true
                });
                allChecked = true;
            } else {
                checkboxes.forEach(element => {
                    checkInputs.splice(checkInputs.indexOf(element.value), 1);
                    element.checked = false
                });
                allChecked = false;
            }


            console.log(checkInputs);
        }

        function printSelections() {
            // if checkInputs empty
            if (checkInputs.length == 0) {

                return;
            }

            // Create a form element
            var form = document.createElement('form');
            form.method = 'POST'; // Use POST method
            form.action = '{{ route('print') }}';

            // Create an input for CSRF token
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.type = 'hidden';
            csrfTokenInput.name = '_token';
            csrfTokenInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfTokenInput);

            // Create an input element for each ID
            checkInputs.forEach(function(id) {
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
    </script>
@endsection
