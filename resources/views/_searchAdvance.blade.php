@extends('layout.master')

@section('content')
    @if (session('error'))
        <div class="bg-danger-100 text-danger-700 mb-4 rounded-lg px-6 py-5 text-base" role="alert">
            {{ session('error') }}
        </div>
    @endif


    <table class="w-full border border-neutral-300 rounded overflow-hidden shadow-lg" align="center">

        <tr class="bg-blue-500 text-white">
           
            <td class="p-2">
                <div class="font-bold text-lg">Ricerca avanzata Anagrafica</div>
            </td>
        
        </tr>
        
        <tr class="bg-gray-200">
            <td class="p-2"></td>
            <td class="p-2">
                <center>
                    <span class="font-semibold">Criteria:&nbsp;</span>
                    <input type="radio" name="srchType" id="all_checkbox" value="and" checked>
                    <label for="all_checkbox">Tutte le condizioni</label>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="srchType" id="any_checkbox" value="or">
                    <label for="any_checkbox">Qualunque condizione</label>
                </center>
            </td>
            <td class="p-2"></td>
        </tr>
        
        <tr class="bg-gray-300">
            <td class="p-2"></td>
            <td class="p-2">
                <div class="bg-blue-700 text-white p-2">
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
            <td class="runner-cc runner-cc1">
                Note del Direttore</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Note_Direttore">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Note_Direttore"><select id="srchOpt_1_Note_Direttore"
                        NAME="srchOpt_1_Note_Direttore" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Note_Direttore_0" class="runner-nowrap""><input
                        id="value_Note_Direttore_1" style="" type="text" autocomplete="off"
                        name="value_Note_Direttore_1" rows=50 cols=500 value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Note_Direttore_1" class="runner-nowrap"
                    style="display:none""><input id="value1_Note_Direttore_1" style="" type="text"
                        autocomplete="off" name="value1_Note_Direttore_1" rows=50 cols=500 value=""></span>&nbsp;
            </td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Stato Scheda</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Scheda_Assegnata">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Scheda_Assegnata"><select id="srchOpt_1_Scheda_Assegnata"
                        NAME="srchOpt_1_Scheda_Assegnata" SIZE=1>
                        <option value="Equals">Uguale</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Scheda_Assegnata_0" class="runner-nowrap""><input
                        id="value_Scheda_Assegnata_1" type=hidden name="value_Scheda_Assegnata_1" value=""><input
                        type="Radio" id="radio_Scheda_Assegnata_1_0" name="radio_Scheda_Assegnata_1"
                        value="Richiesta">Richiesta<br /><input type="Radio" id="radio_Scheda_Assegnata_1_1"
                        name="radio_Scheda_Assegnata_1" value="Assegnato">Assegnato<br /><input type="Radio"
                        id="radio_Scheda_Assegnata_1_2" name="radio_Scheda_Assegnata_1"
                        value="Rifiutato">Rifiutato<br /><input type="Radio" id="radio_Scheda_Assegnata_1_3"
                        name="radio_Scheda_Assegnata_1" value="Maggiori Info">Maggiori Info<br /></span>&nbsp;</td>
            <td class="runner-cc alt">&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                ID</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_ID">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_ID"><select id="srchOpt_1_ID" NAME="srchOpt_1_ID" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_ID_0" class="runner-nowrap""><input id="value_ID_1"
                        style="" type="text" autocomplete="off" name="value_ID_1" value=""></span>&nbsp;
            </td>
            <td class="runner-cc alt"><span id="edit1_ID_1" class="runner-nowrap" style="display:none""><input
                        id="value1_ID_1" style="" type="text" autocomplete="off" name="value1_ID_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Agente Richiedente</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Agente_Richiedente">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Agente_Richiedente"><select
                        id="srchOpt_1_Agente_Richiedente" NAME="srchOpt_1_Agente_Richiedente" SIZE=1>
                        <option value="Equals">Uguale</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Agente_Richiedente_0" class="runner-nowrap""><select
                        size = "1" id="value_Agente_Richiedente_1" name="value_Agente_Richiedente_1">
                        <option value="">Selezionare...</option>
                        <option value="alessandra">alessandra</option>
                        <option value="alessia">alessia</option>
                       
                    </select></span>&nbsp;</td>
            <td class="runner-cc alt">&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Agente Assegnato</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Agente_Assegnato">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Agente_Assegnato"><select id="srchOpt_1_Agente_Assegnato"
                        NAME="srchOpt_1_Agente_Assegnato" SIZE=1>
                        <option value="Equals">Uguale</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Agente_Assegnato_0" class="runner-nowrap""><select size = "1"
                        id="value_Agente_Assegnato_1" name="value_Agente_Assegnato_1">
                        <option value="">Selezionare...</option>
                        <option value="52">alessandra</option>
                       
                    </select></span>&nbsp;</td>
            <td class="runner-cc alt">&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Data Creazione</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Data_Creazione">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Data_Creazione"><select id="srchOpt_1_Data_Creazione"
                        NAME="srchOpt_1_Data_Creazione" SIZE=1>
                        <option value="Equals">Uguale</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Data_Creazione_0" class="runner-nowrap""><input
                        id="value_Data_Creazione_1" type="Text" name="value_Data_Creazione_1" size="20"
                        value=""><input id="tsvalue_Data_Creazione_1" type="Hidden"
                        name="tsvalue_Data_Creazione_1" value="0-0-0">&nbsp;&nbsp;&nbsp;<a href="#"
                        id="imgCal_value_Data_Creazione_1"></a><input id="type_Data_Creazione_1" type="hidden"
                        name="type_Data_Creazione_1" value="date11"></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Data_Creazione_1" class="runner-nowrap"
                    style="display:none""><input id="value1_Data_Creazione_1" type="Text"
                        name="value1_Data_Creazione_1" size="20" value=""><input
                        id="tsvalue1_Data_Creazione_1" type="Hidden" name="tsvalue1_Data_Creazione_1"
                        value="0-0-0">&nbsp;&nbsp;&nbsp;<a href="#" id="imgCal_value1_Data_Creazione_1"></a><input id="type1_Data_Creazione_1" type="hidden"
                        name="type1_Data_Creazione_1" value="date11"></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Tipologia Cliente</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Tipologia_Cliente">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Tipologia_Cliente"><select id="srchOpt_1_Tipologia_Cliente"
                        NAME="srchOpt_1_Tipologia_Cliente" SIZE=1>
                        <option value="Equals">Uguale</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Tipologia_Cliente_0" class="runner-nowrap""><select
                        id="value_Tipologia_Cliente_1" size = "1" name="value_Tipologia_Cliente_1">
                        <option value="">Selezionare...</option>
                        <option value="Potenziale">Potenziale</option>
                        <option value="Attivo">Attivo</option>
                    </select></span>&nbsp;</td>
            <td class="runner-cc alt">&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Azienda</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Azienda">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Azienda"><select id="srchOpt_1_Azienda"
                        NAME="srchOpt_1_Azienda" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Azienda_0" class="runner-nowrap""><input id="value_Azienda_1"
                        style="" type="text" autocomplete="off" name="value_Azienda_1" maxlength=50
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Azienda_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Azienda_1" style="" type="text" autocomplete="off" name="value1_Azienda_1"
                        maxlength=50 value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Brand/Prodotto</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Brand_Prodotto">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Brand_Prodotto"><select id="srchOpt_1_Brand_Prodotto"
                        NAME="srchOpt_1_Brand_Prodotto" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Brand_Prodotto_0" class="runner-nowrap""><input
                        id="value_Brand_Prodotto_1" style="" type="text" autocomplete="off"
                        name="value_Brand_Prodotto_1" maxlength=50 value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Brand_Prodotto_1" class="runner-nowrap"
                    style="display:none""><input id="value1_Brand_Prodotto_1" style="" type="text"
                        autocomplete="off" name="value1_Brand_Prodotto_1" maxlength=50 value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Città</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Citta">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Citta"><select id="srchOpt_1_Citta" NAME="srchOpt_1_Citta"
                        SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Citta_0" class="runner-nowrap""><input id="value_Citta_1"
                        style="" type="text" autocomplete="off" name="value_Citta_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Citta_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Citta_1" style="" type="text" autocomplete="off" name="value1_Citta_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Cap</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Cap">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Cap"><select id="srchOpt_1_Cap" NAME="srchOpt_1_Cap"
                        SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Cap_0" class="runner-nowrap""><input id="value_Cap_1"
                        style="" type="text" autocomplete="off" name="value_Cap_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Cap_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Cap_1" style="" type="text" autocomplete="off" name="value1_Cap_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Indirizzo</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Indirizzo">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Indirizzo"><select id="srchOpt_1_Indirizzo"
                        NAME="srchOpt_1_Indirizzo" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Indirizzo_0" class="runner-nowrap""><input id="value_Indirizzo_1"
                        style="" type="text" autocomplete="off" name="value_Indirizzo_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Indirizzo_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Indirizzo_1" style="" type="text" autocomplete="off"
                        name="value1_Indirizzo_1" value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Referente</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Referente">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Referente"><select id="srchOpt_1_Referente"
                        NAME="srchOpt_1_Referente" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Referente_0" class="runner-nowrap""><input id="value_Referente_1"
                        style="" type="text" autocomplete="off" name="value_Referente_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Referente_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Referente_1" style="" type="text" autocomplete="off"
                        name="value1_Referente_1" value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Compleanno</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Compleanno">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Compleanno"><select id="srchOpt_1_Compleanno"
                        NAME="srchOpt_1_Compleanno" SIZE=1>
                        <option value="Equals">Uguale</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Compleanno_0" class="runner-nowrap""><input
                        id="value_Compleanno_1" type="Text" name="value_Compleanno_1" size="20"
                        value=""><input id="tsvalue_Compleanno_1" type="Hidden" name="tsvalue_Compleanno_1"
                        value="0-0-0">&nbsp;&nbsp;&nbsp;<a href="#" id="imgCal_value_Compleanno_1"></a><input id="type_Compleanno_1" type="hidden"
                        name="type_Compleanno_1" value="date11"></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Compleanno_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Compleanno_1" type="Text" name="value1_Compleanno_1" size="20"
                        value=""><input id="tsvalue1_Compleanno_1" type="Hidden" name="tsvalue1_Compleanno_1"
                        value="0-0-0">&nbsp;&nbsp;&nbsp;<a href="#" id="imgCal_value1_Compleanno_1"></a><input id="type1_Compleanno_1" type="hidden"
                        name="type1_Compleanno_1" value="date11"></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Telefono</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Telefono">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Telefono"><select id="srchOpt_1_Telefono"
                        NAME="srchOpt_1_Telefono" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Telefono_0" class="runner-nowrap""><input id="value_Telefono_1"
                        style="" type="text" autocomplete="off" name="value_Telefono_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Telefono_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Telefono_1" style="" type="text" autocomplete="off"
                        name="value1_Telefono_1" value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Part. Eventi</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Part__Eventi">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Part__Eventi"><select id="srchOpt_1_Part__Eventi"
                        NAME="srchOpt_1_Part__Eventi" SIZE=1>
                        <option value="Equals">Uguale</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Part__Eventi_0" class="runner-nowrap""><select
                        id="value_Part__Eventi_1" size = "1" name="value_Part__Eventi_1">
                        <option value="">Selezionare...</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select></span>&nbsp;</td>
            <td class="runner-cc alt">&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Sito</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Sito">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Sito"><select class="select" id="srchOpt_1_Sito" NAME="srchOpt_1_Sito"
                        SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Sito_0" class="runner-nowrap""><input id="value_Sito_1"
                        style="" type="text" autocomplete="off" name="value_Sito_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Sito_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Sito_1" style="" type="text" autocomplete="off" name="value1_Sito_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Note sull&#39; Azienda</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Note_Azienda">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Note_Azienda"><select id="srchOpt_1_Note_Azienda"
                        NAME="srchOpt_1_Note_Azienda" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Note_Azienda_0" class="runner-nowrap""><input
                        id="value_Note_Azienda_1" style="" type="text" autocomplete="off"
                        name="value_Note_Azienda_1" rows=60 cols=500 value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Note_Azienda_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Note_Azienda_1" style="" type="text" autocomplete="off"
                        name="value1_Note_Azienda_1" rows=60 cols=500 value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Posizione Az.</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Posizione_Az_">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Posizione_Az_"><select id="srchOpt_1_Posizione_Az_"
                        NAME="srchOpt_1_Posizione_Az_" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Posizione_Az__0" class="runner-nowrap""><input
                        id="value_Posizione_Az__1" style="" type="text" autocomplete="off"
                        name="value_Posizione_Az__1" value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Posizione_Az__1" class="runner-nowrap"
                    style="display:none""><input id="value1_Posizione_Az__1" style="" type="text"
                        autocomplete="off" name="value1_Posizione_Az__1" value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Cellulare</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Cellulare">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Cellulare"><select id="srchOpt_1_Cellulare"
                        NAME="srchOpt_1_Cellulare" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Cellulare_0" class="runner-nowrap""><input id="value_Cellulare_1"
                        style="" type="text" autocomplete="off" name="value_Cellulare_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Cellulare_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Cellulare_1" style="" type="text" autocomplete="off"
                        name="value1_Cellulare_1" value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Telefono Uff.</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Telefono_Uff_">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Telefono_Uff_"><select id="srchOpt_1_Telefono_Uff_"
                        NAME="srchOpt_1_Telefono_Uff_" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Telefono_Uff__0" class="runner-nowrap""><input
                        id="value_Telefono_Uff__1" style="" type="text" autocomplete="off"
                        name="value_Telefono_Uff__1" value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Telefono_Uff__1" class="runner-nowrap"
                    style="display:none""><input id="value1_Telefono_Uff__1" style="" type="text"
                        autocomplete="off" name="value1_Telefono_Uff__1" value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Mail</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Mail">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Mail"><select id="srchOpt_1_Mail" NAME="srchOpt_1_Mail"
                        SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Mail_0" class="runner-nowrap""><input id="value_Mail_1"
                        style="" type="text" autocomplete="off" name="value_Mail_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Mail_1" class="runner-nowrap" style="display:none""><input
                        id="value1_Mail_1" style="" type="text" autocomplete="off" name="value1_Mail_1"
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Note sul Referente</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Note_Referente">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Note_Referente"><select id="srchOpt_1_Note_Referente"
                        NAME="srchOpt_1_Note_Referente" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Note_Referente_0" class="runner-nowrap""><input
                        id="value_Note_Referente_1" style="" type="text" autocomplete="off"
                        name="value_Note_Referente_1" rows=60 cols=500 value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Note_Referente_1" class="runner-nowrap"
                    style="display:none""><input id="value1_Note_Referente_1" style="" type="text"
                        autocomplete="off" name="value1_Note_Referente_1" rows=60 cols=500
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Note del Collaboratore</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Note_Collaboratore">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Note_Collaboratore"><select
                        id="srchOpt_1_Note_Collaboratore" NAME="srchOpt_1_Note_Collaboratore" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Note_Collaboratore_0" class="runner-nowrap""><input
                        id="value_Note_Collaboratore_1" style="" type="text" autocomplete="off"
                        name="value_Note_Collaboratore_1" rows=60 cols=500 value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Note_Collaboratore_1" class="runner-nowrap"
                    style="display:none""><input id="value1_Note_Collaboratore_1" style="" type="text"
                        autocomplete="off" name="value1_Note_Collaboratore_1" rows=60 cols=500
                        value=""></span>&nbsp;</td>
            <td class="runner-cr alt"></td>
        </tr>


        <tr class="runner-row style1 runner-b-srchfields">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-cc1">
                Note Eventi:</td>
            </td>
            <td class="runner-cc alt">
                <input type="checkbox" id="not_1_Note_Eventi">
            </td>
            <td class="runner-cc alt"><span id="searchType_1_Note_Eventi"><select id="srchOpt_1_Note_Eventi"
                        NAME="srchOpt_1_Note_Eventi" SIZE=1>
                        <option value="Contains">Contiene</option>
                        <option value="Equals">Uguale</option>
                        <option value="Starts with">Incomincia per</option>
                        <option value="More than">Più di</option>
                        <option value="Less than">Meno di</option>
                        <option value="Between">Tra</option>
                        <option value="Empty">Vuoto</option>
                    </select></span></td>
            <td class="runner-cc alt"><span id="edit1_Note_Eventi_0" class="runner-nowrap""><input
                        id="value_Note_Eventi_1" style="" type="text" autocomplete="off"
                        name="value_Note_Eventi_1" rows=20 cols=500 value=""></span>&nbsp;</td>
            <td class="runner-cc alt"><span id="edit1_Note_Eventi_1" class="runner-nowrap"
                    style="display:none""><input id="value1_Note_Eventi_1" style="" type="text"
                        autocomplete="off" name="value1_Note_Eventi_1" rows=20 cols=500 value=""></span>&nbsp;
            </td>
            <td class="runner-cr alt"></td>
        </tr>





        <tr class="runner-row style2 runner-b-srchbuttons">
            <td class="runner-cl"></td>
            <td class="runner-cc runner-brickcontents" colspan=5>
                <span class="runner-btnframe">
                    <span class="runner-btnleft"></span>
                    <span class="runner-btnright"></span>
                    <a href="#" class="runner-button" id="searchButton1">Cerca</a>
                </span>


                <span class="runner-btnframe">
                    <span class="runner-btnleft"></span>
                    <span class="runner-btnright"></span>
                    <a href="#" class="runner-button" id="resetButton1">Annulla</a>
                </span>


                <span class="runner-btnframe">
                    <span class="runner-btnleft"></span>
                    <span class="runner-btnright"></span>
                    <a href="#" class="runner-button" id="backButton1">Torna alla lista</a>
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
    </table>
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
@endsection
