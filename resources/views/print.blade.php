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

        @foreach ($information as $info)
            <div class="p-2 mb-2">
                <div class="block w-4/6 rounded-lg bg-white p-6">
                    <div class="flex justify-end">
                        <p>Data Creazione: {{ \Carbon\Carbon::parse($info->Data_Creaz)->format('d/n/Y \a\t h:i:s A') }}
                        </p>
                    </div>
                    <hr>

                    <div class="flex justify-between">
                        <p>Agente Assegnato: {{ $info->User->Nome }}</p>
                        <p>Data Modifica: {{ \Carbon\Carbon::parse($info->datamodif)->format('d/n/Y') }}</p>
                    </div>
                    <hr>

                    <div class="flex justify-between">
                        <p>Stato: {{ $info->Agente }}</p>
                        <p>Tipologia Cliente: {{ $info->Tip_Cliente }}</p>
                    </div>
                    <hr>
                    <br>
                    <hr>
                    <div class="flex justify-between">
                        <h4 class="font-bold">INFORMAZIONI AZIENDA </h4>
                        <h4 class="font-bold">INFORMAZIONI REFERENTE </h4>
                    </div>
                    <hr>
                    <br>
                    <hr>
                    <div class="flex justify-between">
                        <div>
                            <p class="text-lg">Azienda: {{ $info->Azienda }}</p>
                            <p class="text-lg">Brand\Prodotto: {{ $info->Brand }}</p>
                            <p class="text-lg">Indirizzo: {{ $info->Indirizzo }}</p>
                            <p class="text-lg">Città: {{ $info->Citta }}</p>
                            <p class="text-lg">Cap: {{ $info->Cap }}</p>
                            <p class="text-lg">Telefono: {{ $info->Telefono }}</p>
                            <p class="text-lg">Sito: {{ $info->Sito }}</p>
                        </div>

                        <div>
                            <p class="text-lg">Referente: {{ $info->Referente }}</p>
                            <p class="text-lg">Posozione Az:
                                {{ $info->Pos_Az }}</p>
                            <p class="text-lg">Cellulare:
                                {{ $info->Cell }}</p>
                            <p class="text-lg">Telefono Uff.:
                                {{ $info->Tel_Uf }}</p>
                            <p class="text-lg">Mail:
                                {{ $info->Mail }}</p>
                             <p class="text-lg">Compleanno:
                                {{$info->Birth}}</p>
                            <p class="text-lg">Part. Eventi:
                                {{ $info->Part_Ev == 'SI' ? 'Si' : 'No' }}</p>

                        </div>
                    </div>
                    <hr>
                    <br>
                    <hr>

                    <div>
                        <p class="font-bold text-sm">Note sull'Azienda:	</p>
                        <p>{{ $info->Note_Az }}</p>
                    </div>
                    <hr>
                    <br>
                    <hr>

                    <div>
                        <p class="font-bold text-sm">Note sul Referente:		</p>
                        <p>{{ $info->Note_Ref }}</p>
                    </div>

                    <hr>
                    <br>
                    <hr>

                    <div>
                        <p class="font-bold text-sm">Note del Collaboratore:	</p>
                        <p>{{ $info->Note_Coll }}</p>
                    </div>

                    <hr>
                    <br>
                    <hr>

                    <div>
                        <p class="font-bold text-sm">Note del Direttore:	</p>
                        <p>{{ $info->Notedir }}</p>
                    </div>

                    <hr>
                    <br>
                    <hr>

                    <div>
                        <p class="font-bold text-sm">Note Eventi:</p>
                        <p>{{ $info->Note_Ev }}</p>
                    </div>

                </div>
            </div>
        @endforeach


        <script>
            // page load complete then print
            window.onload = function() {
                window.print();
            }
        </script>
    </body>

</html>
