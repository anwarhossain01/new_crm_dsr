@extends('layout.master')

@section('content')
    @if (session('error'))
        <div class="bg-danger-100 text-danger-700 mb-4 rounded-lg px-6 py-5 text-base" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="ricerca-avanzata-tit">
        <div class="text-lg font-bold">Ricerca avanzata Anagrafica</div>
    </div>

    @php
        $selection_user = App\Models\User::all();
    @endphp

    <form action="{{ route('search.advance.submit') }}" method="get">
        <table class="w-full overflow-hidden rounded border border-neutral-300 shadow-lg" align="center">

            <tr class="text-white">
                <td class="p-2">
                </td>
            </tr>

            <tr class="bg-gray-200">
                <td class="p-2"></td>
                <td class="p-2">
                    <div class="condizioni">
                        <center>
                            <span class="font-semibold">Condizioni:&nbsp;</span>
                            <input type="radio" name="srchType" id="all_checkbox" value="and" checked>
                            <label for="all_checkbox">Tutte</label>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="srchType" id="any_checkbox" value="or">
                            <label for="any_checkbox">Qualunque</label>
                        </center>
                    </div>
                </td>
                <td class="p-2"></td>
            </tr>




            <tr class="bg-gray-300">
                <td class="p-2"></td>
                <td class="p-2">
                    <div class="p-2 text-white">
                        <table class="w-full">
                            <!-- Modify the table header and rows as needed -->
                            <!-- ... -->
                        </table>
                    </div>
                </td>
                <td class="p-2"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cl"></td>
                <td class="runner-cl">Not</td>
                <td class="runner-cl"></td>
                <td class="runner-cl"></td>
                <td class="runner-cl"></td>
                <td class="runner-cl"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Note del Direttore&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_note_direttore" type="checkbox" id="not_1_Note_Direttore">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Note_Direttore"><select id="srchOpt_1_Note_Direttore"
                            NAME="note_direttore_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Note_Direttore_0" class="runner-nowrap"">
                        <input id=" value_Note_Direttore_1" style="" type="text" autocomplete="off"
                            name="Note_Direttore" rows=50 cols=500 value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Data Modifica </td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_data_modifica" type="checkbox" id="data_modifica">
                </td>
                <td class="runner-cc alt"><span id="data_modifica"><select NAME="data_modifica_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt">
                    <div class="relative mb-3" data-te-date-timepicker-init data-te-input-wrapper-init
                        data-te-inline="true">
                        <input type="text"
                            class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-1/2 rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="form2" name="data_modifica" />
                        <label for="form2"
                            class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">data
                            modifica</label>
                    </div>
                </td>

                <td class="runner-cr alt"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Data Creazione </td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_data_creazione" type="checkbox" id="data_creazione">
                </td>
                <td class="runner-cc alt"><span id="data_modifica"><select NAME="data_creazione_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt">
                    <div class="relative mb-3" data-te-date-timepicker-init data-te-input-wrapper-init
                        data-te-inline="true">
                        <input type="text"
                            class="peer-focus:text-primary dark:peer-focus:text-primary peer block min-h-[auto] w-1/2 rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="form2" name="data_creazione" />
                        <label for="form2"
                            class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">
                            data creazione</label>
                    </div>
                </td>

                <td class="runner-cr alt"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Stato Scheda&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_stato_scheda" id="not_1_Scheda_Assegnata">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Scheda_Assegnata">
                        <select id="srchOpt_1_Scheda_Assegnata" NAME="stato_scheda_selection" SIZE=1>
                            <option value="Equals">Uguale</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Scheda_Assegnata_0" class="runner-nowrap"">
                        <input id=" value_Scheda_Assegnata_1" type=hidden name="Stato_Scheda" value="">
                        <input type="Radio" id="radio_Scheda_Assegnata_1_0" name="Stato_Scheda"
                            value="Richiesta">Richiesta<br />
                        <input type="Radio" id="radio_Scheda_Assegnata_1_1" name="Stato_Scheda"
                            value="Assegnato">Assegnato<br />
                        <input type="Radio" id="radio_Scheda_Assegnata_1_2" name="Stato_Scheda"
                            value="Rifiutato">Rifiutato<br />
                        <input type="Radio" id="radio_Scheda_Assegnata_1_3" name="Stato_Scheda"
                            value="Maggiori Info">Maggiori Info<br />
                    </span>&nbsp;
                </td>
                <td class="runner-cc alt">&nbsp;</td>
                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    ID&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_id" id="not_1_ID">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_ID"><select id="srchOpt_1_ID" NAME="id_selection"
                            SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_ID_0" class="runner-nowrap""><input id=" value_ID_1"
                            style="" type="text" autocomplete="off" name="ID"
                            value=""></span>&nbsp;
                </td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Agente Richiedente&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_agente_richiedente" id="not_1_Agente_Richiedente">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Agente_Richiedente"><select
                            id="srchOpt_1_Agente_Richiedente" NAME="agente_richiedente_selection_1" SIZE=1>
                            <option value="Equals">Uguale</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Agente_Richiedente_0" class="runner-nowrap""><select
                            size=" 1" id="value_Agente_Richiedente_1" name="agente_richiedente_selection_user">
                            <option value="">Selezionare...</option>
                            @foreach ($selection_user as $user)
                                <option value="{{ $user->ID }}">{{ $user->Nome }}</option>
                            @endforeach
                        </select>
                    </span>&nbsp;</td>
                <td class="runner-cc alt">&nbsp;</td>
                <td class="runner-cr alt"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Agente Assegnato&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_agente_assegnato" id="not_1_Agente_Richiedente">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Agente_assegnato"><select
                            id="srchOpt_1_Agente_assegnato" NAME="agente_assegnato_selection_1" SIZE=1>
                            <option value="Equals">Uguale</option>
                        </select></span>
                </td>
                <td class="runner-cc alt"><span id="edit1_Agente_assegnato_0" class="runner-nowrap""><select
                            size=" 1" id="value_Agente_assegnato_1" name="agente_assegnato_selection_user">
                            <option value="">Selezionare...</option>
                            @foreach ($selection_user as $user)
                                <option value="{{ $user->ID }}">{{ $user->Nome }}</option>
                            @endforeach
                        </select>
                    </span>&nbsp;</td>
                <td class="runner-cc alt">&nbsp;</td>
                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Tipologia Cliente&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_tipologia_cliente" id="not_1_Tipologia_Cliente">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Tipologia_Cliente"><select
                            id="srchOpt_1_Tipologia_Cliente" NAME="tipologia_cliente_selection_1" SIZE=1>
                            <option value="Equals">Uguale</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Tipologia_Cliente_0" class="runner-nowrap""><select
                            id=" value_Tipologia_Cliente_1" size="1" name="tipologia_cliente_selection_2">
                            <option value="">Selezionare...</option>
                            <option value="potenziale">Potenziale</option>
                            <option value="attivo">Attivo</option>
                        </select>
                    </span>&nbsp;</td>
                <td class="runner-cc alt">&nbsp;</td>
                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Azienda&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_azienda" id="not_1_Azienda">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Azienda"><select id="srchOpt_1_Azienda"
                            NAME="azienda_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Azienda_0" class="runner-nowrap""><input id=" value_Azienda_1"
                            style="" type="text" autocomplete="off" name="Azienda" maxlength=50
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Brand/Prodotto&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_brand" id="not_1_Brand_Prodotto">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Brand_Prodotto"><select id="srchOpt_1_Brand_Prodotto"
                            NAME="brand_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Brand_Prodotto_0" class="runner-nowrap""><input
                            id=" value_Brand_Prodotto_1" style="" type="text" autocomplete="off"
                            name="Brand" maxlength=50 value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Città&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_city" id="not_1_Citta">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Citta"><select id="srchOpt_1_Citta"
                            NAME="city_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Citta_0" class="runner-nowrap""><input id=" value_Citta_1"
                            style="" type="text" autocomplete="off" name="City"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Cap&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_cap" id="not_1_Cap">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Cap"><select id="srchOpt_1_Cap" NAME="cap_selection"
                            SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Cap_0" class="runner-nowrap""><input id=" value_Cap_1"
                            style="" type="text" autocomplete="off" name="Cap"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Indirizzo&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_indirizzo" id="not_1_Indirizzo">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Indirizzo"><select id="srchOpt_1_Indirizzo"
                            NAME="indirizzo_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Indirizzo_0" class="runner-nowrap""><input
                            id=" value_Indirizzo_1" style="" type="text" autocomplete="off" name="Indirizzo"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Referente&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_referente" id="not_1_Referente">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Referente"><select id="srchOpt_1_Referente"
                            NAME="referente_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Referente_0" class="runner-nowrap""><input
                            id=" value_Referente_1" style="" type="text" autocomplete="off" name="Referente"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Compleanno&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_compleanno" id="not_1_Compleanno">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Compleanno"><select id="srchOpt_1_Compleanno"
                            NAME="compleanno_selection" SIZE=1>
                            <option value="Equals">Uguale</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Compleanno_0" class="runner-nowrap"">
                        <input id=" value_Compleanno_1" type="Text" name="Compleanno" size="20" value="">
                </td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Telefono&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_telefono" id="not_1_Telefono">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Telefono"><select id="srchOpt_1_Telefono"
                            NAME="telefono_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Telefono_0" class="runner-nowrap""><input
                            id=" value_Telefono_1" style="" type="text" autocomplete="off" name="Telefono"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>

            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Cellulare&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_cellulare" id="not_1_Telefono">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Telefono"><select id="srchOpt_1_Telefono"
                            NAME="cellulare_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Telefono_0" class="runner-nowrap""><input
                            id=" value_Telefono_1" style="" type="text" autocomplete="off" name="cellulare"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Part. Eventi&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_part_eventi" id="not_1_Part__Eventi">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Part__Eventi">
                        <select id="srchOpt_1_Part__Eventi" NAME="part_eventi_selection_1" SIZE=1>
                            <option value="Equals">Uguale</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Part__Eventi_0" class="runner-nowrap"">
                        <select id=" value_Part__Eventi_1" size="1" name="part_eventi_selection_2">
                            <option value="">Selezionare...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </span>&nbsp;</td>
                <td class="runner-cc alt">&nbsp;</td>
                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Sito&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_sito" type="checkbox" id="not_1_Sito">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Sito"><select id="srchOpt_1_Sito" NAME="sito_selection"
                            SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Sito_0" class="runner-nowrap""><input id=" value_Sito_1"
                            style="" type="text" autocomplete="off" name="Sito"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Note sull&#39;Azienda&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_note_azienda" type="checkbox" id="not_1_Note_Azienda">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Note_Azienda"><select id="srchOpt_1_Note_Azienda"
                            NAME="note_azienda_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Note_Azienda_0" class="runner-nowrap""><input
                            id=" value_Note_Azienda_1" style="" type="text" autocomplete="off"
                            name="Note_Azienda" rows=60 cols=500 value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Posizione Azienda&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_posizione_az" id="not_1_Posizione_Az_">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Posizione_Az_"><select id="srchOpt_1_Posizione_Az_"
                            NAME="posizione_az_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Posizione_Az__0" class="runner-nowrap""><input
                            id=" value_Posizione_Az__1" style="" type="text" autocomplete="off"
                            name="Posizione_Az" value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>



            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Telefono Ufficio&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_tel_uff" id="not_1_Telefono_Uff_">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Telefono_Uff_"><select id="srchOpt_1_Telefono_Uff_"
                            NAME="tel_uff_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Telefono_Uff__0" class="runner-nowrap""><input
                            id=" value_Telefono_Uff__1" style="" type="text" autocomplete="off" name="Tel_Uff"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Mail&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_mail" type="checkbox" id="not_1_Mail">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Mail"><select id="srchOpt_1_Mail" NAME="mail_selection"
                            SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Mail_0" class="runner-nowrap""><input id=" value_Mail_1"
                            style="" type="text" autocomplete="off" name="Mail"
                            value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Note sul Referente&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_note_ref" type="checkbox" id="not_1_Note_Referente">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Note_Referente"><select id="srchOpt_1_Note_Referente"
                            NAME="note_ref_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Note_Referente_0" class="runner-nowrap""><input
                            id=" value_Note_Referente_1" style="" type="text" autocomplete="off"
                            name="Note_ref" rows=60 cols=500 value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Note del Collaboratore&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input type="checkbox" name="not_note_col" id="not_1_Note_Collaboratore">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Note_Collaboratore"><select
                            id="srchOpt_1_Note_Collaboratore" NAME="note_col_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Note_Collaboratore_0" class="runner-nowrap""><input
                            id=" value_Note_Collaboratore_1" style="" type="text" autocomplete="off"
                            name="Note_col" rows=60 cols=500 value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>


            <tr class="runner-row style1 runner-b-srchfields">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-cc1" align="right">
                    Note Eventi:&nbsp;</td>
                </td>
                <td class="runner-cc alt">
                    <input name="not_note_ev" type="checkbox" id="not_1_Note_Eventi">
                </td>
                <td class="runner-cc alt"><span id="searchType_1_Note_Eventi"><select id="srchOpt_1_Note_Eventi"
                            NAME="note_ev_selection" SIZE=1>
                            <option value="Contains">Contiene</option>
                            <option value="Equals">Uguale</option>
                            <option value="Starts with">Incomincia per</option>
                            <option value="More than">Più di</option>
                            <option value="Less than">Meno di</option>
                            <option value="Between">Tra</option>
                            <option value="Empty">Vuoto</option>
                        </select></span></td>
                <td class="runner-cc alt"><span id="edit1_Note_Eventi_0" class="runner-nowrap""><input
                            id=" value_Note_Eventi_1" style="" type="text" autocomplete="off" name="Note_ev"
                            rows=20 cols=500 value=""></span>&nbsp;</td>

                <td class="runner-cr alt"></td>
            </tr>





            <tr class="runner-row style2 runner-b-srchbuttons">
                <td class="runner-cl"></td>
                <td class="runner-cc runner-brickcontents" colspan=5>
                    <span class="runner-btnframe">
                        <span class="runner-btnleft"></span>
                        <span class="runner-btnright"></span>
                        <button type="submit" class="runner-button" id="searchButton1">Cerca</button>
                    </span>


                    <span class="runner-btnframe">
                        <span class="runner-btnleft"></span>
                        <span class="runner-btnright"></span>
                        <a href="{{ url()->previous() }}" class="runner-button" id="resetButton1">Annulla</a>
                    </span>


                    <span class="runner-btnframe">
                        <span class="runner-btnleft"></span>
                        <span class="runner-btnright"></span>
                        <a href="{{ route('index') }}" class="runner-button" id="backButton1">Torna alla lista</a>
                    </span>
                </td>
                <td class="runner-cr"></td>
            </tr>


            <tr class="runner-bottomrow style2">
                <td class="runner-cl"></td>
                <td class="runner-cc"></td>
                <td class="runner-cc"></td>
                <td class="runner-cc"></td>
                <td class="runner-cc"></td>
                <td class="runner-cc"></td>
                <td class="runner-cr"></td>
            </tr>
        </table><br>
        </div>

        </td>
        <td class="runner-cr"></td>
        </tr>


        <tr class="runner-bottomrow style1">
            <td class="runner-cl"></td>
            <td class="runner-cc"></td>
            <td class="runner-cr"></td>
        </tr>
        </table>
        </div>


        </td>
        </tr>
        <tr class="runner-body">

            <td class="runner-left">

            </td>

            <td class="runner-center">

            </td>

            <td class="runner-right">

            </td>
        </tr>
        <tr class="runner-footer">
            <td class="runner-bottom" colspan=3>
                <!--%%bottom%%-->
            </td>
        </tr>
        </table>

    </form>
@endsection
