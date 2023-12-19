@extends('layout.master')

@section('content')
    @if (session('error'))
        <div class="bg-danger-100 text-danger-700 mb-4 rounded-lg px-6 py-5 text-base" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="font-bold text-xl">Ricerca avanzata Anagrafica</h2>
    <br>
    <hr>
    <br>
    <form action="{{ route('search.advance.submit') }}" method="post">
        @csrf
        <div class="text-center mb-4">
            <span class="font-bold mr-2">
                Criteria:
            </span>

            <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
            <div class="flex justify-center">
                <!--First radio-->
                <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                    <input
                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                        type="radio" name="searchSelection" id="inlineRadio1" value="total" checked />
                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="inlineRadio1"> Tutte le
                        condizioni</label>
                </div>

                <!--Second radio-->
                <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                    <input
                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                        type="radio" name="searchSelection" id="inlineRadio2" value="condition" />
                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="inlineRadio2">Qualunque
                        condizione</label>
                </div>

            </div>


        </div>
        <br>

        <div class="grid grid-cols-2">
            <div class="col-start-2">
                <label class="font-bold">NOT</label>
            </div>
        </div>

        <br>

        @php
            $selection_options_all = [
                'Contains' => 'Contiene',
                'Equals' => 'Uguale',
                'Starts_with' => 'Incomincia per',
                'More_than' => 'Più di',
                'Less_than' => 'Meno di',
                'Between' => 'Tra',
                'Empty' => 'Vuoto',
            ];

            $selection_half = [
                'Equals' => 'Uguale',
                'More_than' => 'Più di',
                'Less_than' => 'Meno di',
                'Between' => 'Tra',
                'Empty' => 'Vuoto',
            ];

            $selection_topology = ['' => 'Please Select', 'potenziale' => 'Potenziale', 'attivo' => 'Attivo'];

            $selection_equal = ['Equals' => 'Uguale'];

            $selection_user = App\Models\User::all();

        @endphp

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Note del Direttore',
            'name' => 'Note_Direttore',
            'selection' => $selection_options_all,
            'not_name' => 'not_note_direttore',
            'selection_name' => 'note_direttore_selection',
        ])

        @include('layout.templates.formTemplates.GridRadio', [
            'title' => 'Stato Scheda',
            'name' => 'Stato_Scheda',
            'not_name' => 'not_stato_scheda',
            'selection_name' => 'stato_scheda_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'ID',
            'name' => 'ID',
            'selection' => $selection_options_all,
            'not_name' => 'not_id',
            'selection_name' => 'id_selection',
        ])

        @include('layout.templates.formTemplates.GridSelection', [
            'title' => ' Agente Richiedente',
            'name' => 'Agente_Richiedente',
            'selection1' => $selection_equal,
            'selection2' => $selection_user,
            'not_name' => 'not_agente_richiedente',
            'selection1_name' => 'agente_richiedente_selection_1',
            'selection2_name' => 'agente_richiedente_selection_user',
        ])

        @include('layout.templates.formTemplates.GridSelection', [
            'title' => ' Agente Assegnato',
            'name' => 'Agente_Assegnato',
            'selection1' => $selection_equal,
            'selection2' => $selection_user,
            'not_name' => 'not_agente_assegnato',
            'selection1_name' => 'agente_assegnato_selection_1',
            'selection2_name' => 'agente_assegnato_selection_user',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => ' Data Creazione',
            'name' => 'date_creation',
            'selection' => $selection_half,
            'not_name' => 'not_date_creation',
            'selection_name' => 'date_creation_selection',
        ])

        @include('layout.templates.formTemplates.GridSelectionNormal', [
            'title' => ' Tipologia Cliente',
            'name' => 'Tipologia_Cliente',
            'selection1' => $selection_equal,
            'selection2' => $selection_topology,
            'not_name' => 'not_tipologia_cliente',
            'selection1_name' => 'tipologia_cliente_selection_1',
            'selection2_name' => 'tipologia_cliente_selection_2',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Azienda',
            'name' => 'Azienda',
            'selection' => $selection_options_all,
            'not_name' => 'not_azienda',
            'selection_name' => 'azienda_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Brand/Prodotto',
            'name' => 'Brand',
            'selection' => $selection_options_all,
            'not_name' => 'not_brand',
            'selection_name' => 'brand_selection',
        ])


        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Città',
            'name' => 'City',
            'selection' => $selection_options_all,
            'not_name' => 'not_city',
            'selection_name' => 'city_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Cap',
            'name' => 'Cap',
            'selection' => $selection_options_all,
            'not_name' => 'not_cap',
            'selection_name' => 'cap_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Indirizzo',
            'name' => 'Indirizzo',
            'selection' => $selection_options_all,
            'not_name' => 'not_indirizzo',
            'selection_name' => 'indirizzo_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Referente',
            'name' => 'Referente',
            'selection' => $selection_options_all,
            'not_name' => 'not_referente',
            'selection_name' => 'referente_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Compleanno',
            'name' => 'Compleanno',
            'selection' => $selection_half,
            'not_name' => 'not_compleanno',
            'selection_name' => 'compleanno_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Telefono',
            'name' => 'Telefono',
            'selection' => $selection_options_all,
            'not_name' => 'not_telefono',
            'selection_name' => 'telefono_selection',
        ])

        @include('layout.templates.formTemplates.GridSelectionNormal', [
            'title' => ' 	Part. Eventi',
            'name' => 'Part_Eventi',
            'selection1' => $selection_equal,
            'selection2' => ['Si' => 'Si', 'No' => 'No'],
            'not_name' => 'not_part_eventi',
            'selection1_name' => 'part_eventi_selection_1',
            'selection2_name' => 'part_eventi_selection_2',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Sito',
            'name' => 'Sito',
            'selection' => $selection_equal,
            'not_name' => 'not_sito',
            'selection_name' => 'sito_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Note sull Azienda',
            'name' => 'Note_Azienda',
            'selection' => $selection_options_all,
            'not_name' => 'not_note_azienda',
            'selection_name' => 'note_azienda_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Posizione Az.',
            'name' => 'Posizione_Az',
            'selection' => $selection_options_all,
            'not_name' => 'not_posizione_az',
            'selection_name' => 'posizione_az_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Cellulare',
            'name' => 'Cellulare',
            'selection' => $selection_options_all,
            'not_name' => 'not_cellulare',
            'selection_name' => 'cellulare_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Telefono Uff.',
            'name' => 'Tel_Uff',
            'selection' => $selection_options_all,
            'not_name' => 'not_tel_uff',
            'selection_name' => 'tel_uff_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Mail',
            'name' => 'Mail',
            'selection' => $selection_options_all,
            'not_name' => 'not_mail',
            'selection_name' => 'mail_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Note sul Referente',
            'name' => 'Note_ref',
            'selection' => $selection_options_all,
            'not_name' => 'not_note_ref',
            'selection_name' => 'note_ref_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Note del Collaboratore',
            'name' => 'Note_col',
            'selection' => $selection_options_all,
            'not_name' => 'not_note_col',
            'selection_name' => 'note_col_selection',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => ' 	Note Eventi',
            'name' => 'Note_ev',
            'selection' => $selection_options_all,
            'not_name' => 'not_note_ev',
            'selection_name' => 'note_ev_selection',
        ])

        <div class="flex justify-center mt-2">
            <button type="submit"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Submit
            </button>
            <a href="={{ url()->previous() }}"
                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200">
                Annulla Torna alla lista
            </a>
        </div>

    </form>
@endsection
