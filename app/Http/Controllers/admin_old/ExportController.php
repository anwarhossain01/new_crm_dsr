<?php

namespace App\Http\Controllers\admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InformationExport;
use App\Imports\InformationImport;
use PhpOffice\PhpSpreadsheet\Shared\XMLWriter;

class ExportController extends Controller
{
    //

    public function exportToXmlForInfo($data)
    {
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElement('data');
        $fields = [
            'Agente_ID', 'Data_Creaz', 'Tip_Cliente', 'Azienda', 'Brand', 'Agente',
            'Indirizzo', 'Citta', 'Telefono', 'Sito', 'Note_Az', 'Referente', 'Pos_Az',
            'Tel_Uf', 'Cell', 'Mail', 'Birth', 'Note_Ref', 'Part_Ev', 'Note_Ev',
            'Note_Coll', 'Notedir', 'richiedente'
        ];
        $data = $data
            ? Information::select($fields)->whereIn('ID', $data)->get()
            : Information::select($fields)->get();

        foreach ($data as $item) {
            $xmlWriter->startElement('item');

            $xmlWriter->writeElement('Agente_ID', $item->Agente_ID);
            $xmlWriter->writeElement('DataCreazione', $item->Data_Creaz);
            $xmlWriter->writeElement('Topology', $item->Tip_Cliente);
            $xmlWriter->writeElement('Azienda', $item->Azienda);
            $xmlWriter->writeElement('Brand_Prodotto', $item->Brand);
            $xmlWriter->writeElement('Agente', $item->Agente);
            $xmlWriter->writeElement('Indirizzo', $item->Indirizzo);
            $xmlWriter->writeElement('Citta', $item->Citta);
            $xmlWriter->writeElement('Telefono', $item->Telefono);
            $xmlWriter->writeElement('Sito', $item->Sito);
            $xmlWriter->writeElement('Note_Sull_Azienda', $item->Note_Az);
            $xmlWriter->writeElement('Referente', $item->Referente);
            $xmlWriter->writeElement('Agente_Posozione', $item->Pos_Az);
            $xmlWriter->writeElement('Ufficio', $item->Tel_Uf);
            $xmlWriter->writeElement('Telefono', $item->Cell);
            $xmlWriter->writeElement('Mail', $item->Mail);
            $xmlWriter->writeElement('Compleanno', $item->Birth);
            $xmlWriter->writeElement('Note_sul_Referente', $item->Note_Ref);
            $xmlWriter->writeElement('Part_Eventi', $item->Part_Ev);
            $xmlWriter->writeElement('Note_Eventi', $item->Note_Ev);
            $xmlWriter->writeElement('Note_del_Collaboratore', $item->Note_Coll);
            $xmlWriter->writeElement('Note_del_Direttore', $item->Notedir);
            $xmlWriter->writeElement('Richiedente', $item->richiedente);
            $xmlWriter->endElement(); // End 'item'
        }
        $xmlWriter->endElement(); // End 'data'
        $xmlWriter->endDocument();

        $content = $xmlWriter->outputMemory();

        return response($content)
            ->header('Content-Type', 'text/xml')
            ->header('Content-Disposition', 'attachment; filename="anagrafiche.xml"');
    }

    public function exportToXmlForUser($data)
    {
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElement('data');
        $fields = ["Nome", "Gruppo", "mail", "active", "notes"];
        $data = $data
            ? User::select($fields)->whereIn('ID', $data)->get()
            : User::select($fields)->get();

        foreach ($data as $item) {
            $xmlWriter->startElement('item');

            $xmlWriter->writeElement('Nome', $item->Nome);
            $xmlWriter->writeElement('Gruppo', $item->Gruppo);
            $xmlWriter->writeElement('Mail', $item->mail);
            $xmlWriter->writeElement('Activo', $item->active);
            $xmlWriter->writeElement('Note', $item->notes);
            $xmlWriter->endElement(); // End 'item'
        }
        $xmlWriter->endElement(); // End 'data'
        $xmlWriter->endDocument();

        $content = $xmlWriter->outputMemory();

        return response($content)
            ->header('Content-Type', 'text/xml')
            ->header('Content-Disposition', 'attachment; filename="collaboratori.xml"');
    }

    private function exportXl($data = null, $type)
    {
        if ($type === "anagraph") {
            return Excel::download(new InformationExport($data), 'anagrafiche.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } elseif ($type === "collab") {
            return Excel::download(new UsersExport($data), 'collaboratori.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }
    private function exportPdf($data = null, $type)
    {
        if ($type === "anagraph") {
            return Excel::download(new InformationExport($data), 'anagrafiche.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } elseif ($type === "collab") {
            return Excel::download(new UsersExport($data), 'collaboratori.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }
    }
    private function exportCsv($data = null, $type)
    {
        if ($type === "anagraph") {
            return Excel::download(new InformationExport($data), 'anagrafiche.csv', \Maatwebsite\Excel\Excel::CSV, [
                'Content-Type' => 'text/csv',
            ]);
        } elseif ($type === "collab") {
            return Excel::download(new UsersExport($data), 'collaboratori.csv', \Maatwebsite\Excel\Excel::CSV, [
                'Content-Type' => 'text/csv',
            ]);
        }
    }
    private function exportHtml($data = null, $type)
    {
        if ($type === "anagraph") {
            return Excel::download(new InformationExport($data), 'anagrafiche.html', \Maatwebsite\Excel\Excel::HTML);
        } elseif ($type === "collab") {
            return Excel::download(new UsersExport($data), 'collaboratori.html', \Maatwebsite\Excel\Excel::HTML);
        }
    }
    private function exportXML($data = null, $type)
    {
        if ($type === "anagraph") {
            return $this->exportToXmlForInfo($data);
        } elseif ($type === "collab") {
            return $this->exportToXmlForUser($data);
        }
    }

    private function ExportFormat($format, $data = null, $type)
    {

        if ($format === "pdf") {
            return $this->exportPdf($data, $type);
        } elseif ($format === "excel") {
            return $this->exportXl($data, $type);
        } elseif ($format === "csv") {
            return $this->exportCsv($data, $type);
        } elseif ($format === "html") {
            return $this->exportHtml($data, $type);
        } elseif ($format === "xml") {
            return $this->exportXML($data, $type);
        }

    }

    public function ChooseExport(Request $request)
    {

        $data = null;
        $type = $request->type;
        if ($type === "collab") {
            $ids = $request->input('ids');
            $data = $ids;
        } elseif ($type === "anagraph") {
            $ids = $request->input('ids');
            $data = $ids;
        }

        // store $data in session
        $request->session()->put('data', $data);
        $request->session()->put('type', $type);
        return view('admin.Export_Format_Select');
    }


    public function ChooseExportSubmit(Request $request)
    {
        $type = $request->session()->get('type');

        if ($request->exportType === "single") {
            // get $data from session
            $data = $request->session()->get('data');
            return $this->ExportFormat($request->exportOption, $data, $type);
        } elseif ($request->exportType === "total") {
            return $this->ExportFormat($request->exportOption, null, $type);
        }

    }

    public function ImportDocument()
    {
        return view('admin.Import_Select');
    }

    public function ImportDocumentSubmit(Request $request)
    {
        try {
            Excel::import(new InformationImport, request()->file('file'));
            
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('index')->with('error', 'Importa il file in formato errato, esporta un file Excel e segui la sua intestazione! 😞');
    }
}
