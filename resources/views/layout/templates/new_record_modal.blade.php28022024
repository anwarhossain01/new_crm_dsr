<!--Extra large modal-->
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div
            class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <!--Modal title-->
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalXlLabel">

                    Aggiungi anagrafica

                </h5>
                <!--Close button-->
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!--Modal body-->
            <div class="relative px-6 py-8" style="opacity:0.9;">
                @php
                $all_users = \App\Models\User::get();
                $is_user = auth()->user()->Gruppo == 'User' ? true : false;
                @endphp


                <form action="{{ route('new.info') }}" method="post">
                    @csrf
                    <div class="flex flex-wrap justify-center">
                        <div class="ml-0 lg:mr-8">

                            <div class="mb-2">
                                <label class="text-sm text-gray-500"><b>Agente Richiedente</b></label>
                                <select id="richiedente" data-te-select-init class="w-full" name="richiedente">
                                    @if ($is_user)
                                    <option value="{{ auth()->user()->Nome }}" selected>{{ auth()->user()->Nome }}
                                    </option>
                                    @else
                                    @foreach ($all_users as $usr)
                                    <option value="{{ $usr->Nome }}">{{ $usr->Nome }}</option>
                                    @endforeach
                                    @endif

                                </select>
                            </div>

                            @if (!$is_user)
                            <div class="mb-2">

                                <label class="text-sm text-gray-500"><b>Agente Assegnato</b></label>
                                <select data-te-select-init class="w-full" name="assegnato" required>
                                    @foreach ($all_users as $usr)
                                    <option value="{{ $usr->ID }}">{{ $usr->Nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="mb-2">
                                <label class="text-sm text-gray-500"><b>Stato Scheda</b></label>
                                <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
                                <div class="flex flex-wrap justify-center">
                                    @if (!$is_user)
                                    <!--First radio-->
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="checked:border-primary checked:after:border-primary checked:after:bg-primary checked:focus:border-primary dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="radio" name="Stato" id="inlineRadio1" value="Richiesta" />
                                        <label class="radio-butt mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                            for="inlineRadio1">Richiesta</label>
                                    </div>

                                    <!--Second radio-->
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="checked:border-primary checked:after:border-primary checked:after:bg-primary checked:focus:border-primary dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="radio" name="Stato" id="inlineRadio2" value="Assegnato" />
                                        <label class="radio-butt mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                            for="inlineRadio2">Assegnato</label>
                                    </div>


                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="checked:border-primary checked:after:border-primary checked:after:bg-primary checked:focus:border-primary dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="radio" name="Stato" id="inlineRadio3" value="Rifiutato" />
                                        <label class="radio-butt mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                            for="inlineRadio3">Rifiutato</label>
                                    </div>

                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="checked:border-primary checked:after:border-primary checked:after:bg-primary checked:focus:border-primary dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="radio" name="Stato" id="inlineRadio4" value="Maggiori Info" />
                                        <label class="radio-butt mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                            for="inlineRadio4">Maggiori Info
                                        </label>
                                    </div>
                                    @else
                                    <!--First radio-->
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input
                                            class="checked:border-primary checked:after:border-primary checked:after:bg-primary checked:focus:border-primary dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                            type="radio" name="Stato" id="inlineRadio1" value="Richiesta" checked />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
                                            for="inlineRadio1">Richiesta</label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="ml-0 lg:ml-8">
                            @if (!$is_user)
                            <div class="mb-2">
                                <label class="text-sm text-gray-500"><b>Data Creazione</b></label>
                                <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                                    <input type="text" name="create_date"
                                        class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        placeholder="Seleziona una data" disabled />
                                    <label for="floatingInput"
                                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">Seleziona
                                        una data</label>
                                </div>
                            </div>
                            @else
                            <div class="mb-2">
                                <label class="text-sm text-gray-500"><b>Data Creazione</b></label>
                                <div class="relative mb-3" data-te-input-wrapper-init>
                                    <input type="text" name="create_date"
                                        class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleFormControlInput50"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                        aria-label="readonly input example" readonly />
                                    <label for="exampleFormControlInput50"
                                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                    </label>
                                </div>
                            </div>
                            @endif
                            <div class="mb-2">
                                <label class="text-sm text-gray-500"><b>Data Modifica</b></label>
                                <div class="relative mb-3" data-te-input-wrapper-init>
                                    <input type="text" name="modify_date"
                                        class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleFormControlInput50"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                        aria-label="readonly input example" readonly />
                                    <label for="exampleFormControlInput50"
                                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                    </label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="text-sm text-gray-500"><b>Tipologia Cliente</b></label>
                                <select name="Tip_Cliente" data-te-select-init class="w-full">
                                    <option value="Potenziale">Potenziale</option>
                                    <option value="Attivo">Attivo</option>

                                </select>
                            </div>

                        </div>
                    </div>

                    <br>

                    <div class="flex flex-wrap flex-wrap justify-center">
                        <div class="mr-8 flex-1">
                            <h2 class="text-lg font-bold text-blue-500">INFORMAZIONI AZIENDA</h2>
                            <br>

                            <div class="relative mb-3">
                                <input type="text" onkeyup="checkForMatchingAzenda(this)"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Azienda" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">
                                    Azienda
                                </label>
                                <p class="text-red-500 text-xs hidden" id="azendaError">This Item Already Exists</p>

                            </div>


                            <div class="relative mb-3">
                                <input type="text" onkeyup="checkForMatchingBrand(this)"
                                    class="focus:border-primary focus:shadow-te-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingPassword" name="Brand" />
                                <label for="floatingPassword"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Brand/Prodotto</label>
                                <p class="text-red-500 text-xs hidden" id="brandError">This Item Already Exists</p>

                            </div>

                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Indirizzo" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Indirizzo
                                </label>
                            </div>

                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Citta" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Città
                                </label>
                            </div>
                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Cap" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Cap
                                </label>
                            </div>
                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Telefono" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Telefono
                                </label>
                            </div>
                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Sito" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Sito
                                </label>
                            </div>



                        </div>

                        <div class="ml-8 flex-1">
                            <h2 class="text-lg font-bold text-blue-500">INFORMAZIONI REFERENTE </h2>
                            <br>
                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Referente" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">
                                    Referente
                                </label>
                            </div>


                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary focus:shadow-te-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingPassword" name="Posizione" />
                                <label for="floatingPassword"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Posizione
                                    Azienda</label>
                            </div>

                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Telefono_uff" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Telefono
                                    Ufficio
                                </label>
                            </div>

                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Cellulare" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Cellulare
                                </label>
                            </div>
                            <div class="relative mb-3">
                                <input type="text"
                                    class="focus:border-primary peer-focus:text-primary dark:focus:border-primary dark:peer-focus:text-primary peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-4 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:pb-[0.625rem] focus:pt-[1.625rem] focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 [&:not(:placeholder-shown)]:pb-[0.625rem] [&:not(:placeholder-shown)]:pt-[1.625rem]"
                                    id="floatingInput" name="Mail" />
                                <label for="floatingInput"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-4 text-neutral-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-200">Email
                                </label>
                            </div>

                            <div class="relative mb-3" data-te-date-timepicker-init data-te-input-wrapper-init
                                data-te-inline="true">
                                <input type="text"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="form2" name="Birth" />
                                <label for="form2"
                                    class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">Compleanno</label>
                            </div>


                            <div class="mb-3">
                                <label class="text-sm text-gray-500"><b>Partecipazione Eventi</b></label>
                                <select data-te-select-init class="w-full" name="part_ev">
                                    <option value="SI">Si</option>
                                    <option selected value="NO">no</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <textarea name="Note_Az"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1"
                                class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                Note sull'Azienda
                            </label>
                        </div>

                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <textarea name="Note_Ref"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1"
                                class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                Note sul Referente
                            </label>
                        </div>

                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <textarea name="Note_Coll"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1"
                                class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                Note del Collaboratore
                            </label>
                        </div>

                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <textarea name="Note_Ev"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlTextarea1" rows="2"></textarea>
                            <label for="exampleFormControlTextarea1"
                                class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                Note Eventi
                            </label>
                        </div>

                        @if (!$is_user)
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <textarea name="Notedir"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1"
                                class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                                Note del Direttore
                            </label>
                        </div>
                        @endif
                    </div>


            </div>

            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button type="button"
                    class="bg-primary-100 text-primary-700 hover:bg-primary-accent-100 focus:bg-primary-accent-100 active:bg-primary-accent-200 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    Indietro
                </button>
                <button type="submit"
                    class="bg-primary hover:bg-primary-600 focus:bg-primary-600 active:bg-primary-700 ml-1 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    data-te-ripple-init data-te-ripple-color="light">
                    Salva
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function checkForMatchingAzenda(input) {
        // create a new XMLHttpRequest
        var xhr = new XMLHttpRequest();
        let errorTxt = document.getElementById('azendaError');
        errorTxt.classList.add('hidden');
      //  console.log(input.value);
        // define a callback function for when the server responds
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var responseData = JSON.parse(xhr.responseText);

                if (responseData.success == true) {
                    errorTxt.classList.remove('hidden');
                    alert('Questa azienda esiste già.');
                }
            }
        };

        // open the request with the verb and the url
        xhr.open("GET", "{{ route('search.azenda') }}?azienda=" + encodeURIComponent(input.value));
        xhr.send();

    }

    function checkForMatchingBrand(input) {
        // create a new XMLHttpRequest
        var xhr = new XMLHttpRequest();
        let errorTxt = document.getElementById('brandError');
        errorTxt.classList.add('hidden');

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // update the response div
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success == true) {
                    errorTxt.classList.remove('hidden');
                    alert('Questo brand/prodotto esiste già.');
                }
            }
        };

        // open the request with the verb and the url
        xhr.open("GET", "{{ route('search.brand') }}?brand=" + encodeURIComponent(input.value));

        xhr.send();
    }
</script>