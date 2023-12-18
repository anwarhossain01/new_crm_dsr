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
    <form action="#" method="post">
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
                        type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="inlineRadio1"> Tutte le
                        condizioni</label>
                </div>

                <!--Second radio-->
                <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                    <input
                        class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                        type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
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

            $selection_topology = ['' => 'Please Select' ,'potenziale' => 'Potenziale', 'attivo' => 'Attivo'];

            $selection_equal = ['Equals' => 'Uguale'];

            $selection_user = App\Models\User::all();

        @endphp

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'Note del Direttore',
            'name' => 'Note_Direttore',
            'selection' => $selection_options_all,
        ])

        @include('layout.templates.formTemplates.GridRadio', [
            'title' => 'Stato Scheda',
            'name' => 'Stato_Scheda',
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => 'ID',
            'name' => 'ID',
            'selection' => $selection_options_all,
        ])

        @include('layout.templates.formTemplates.GridSelection', [
            'title' => ' Agente Richiedente',
            'name' => ' Agente_Richiedente',
            'selection1' => $selection_equal,
            'selection2' => $selection_user,
        ])

        @include('layout.templates.formTemplates.GridSelection', [
            'title' => ' Agente Assegnato',
            'name' => ' Agente_Assegnato',
            'selection1' => $selection_equal,
            'selection2' => $selection_user,
        ])

        @include('layout.templates.formTemplates.GridInput', [
            'title' => ' Data Creazione',
            'name' => 'date_creation',
            'selection' => $selection_half,
        ])

        @include('layout.templates.formTemplates.GridSelectionNormal', [
        'title' => ' Tipologia Cliente',
        'name' => '  Tipologia_Cliente',
        'selection1' => $selection_equal,
        'selection2' => $selection_topology,
    ])

    </form>
@endsection
