<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InformationExport;

class AdminController extends Controller
{

    public function collab()
    {

        $user = Auth::user();
        $users = User::paginate(10);
        return view('admin.collab', compact('user', 'users'));
    }

    public function IndexPagination($pg)
    {

        $user = Auth::user();
        $information = Information::paginate($pg);
        return view('admin.dashboard', compact('user', 'information'));
    }
    public function CollabPagination($pg)
    {

        $user = Auth::user();
        $users = User::paginate($pg);
        return view('admin.collab', compact('user', 'users'));
    }

    public function CollabMsg(Request $request)
    {
        $user = User::find($request->user_id);
        $user->notes = $request->msg ?? null;
        $user->save();

        return redirect()->back();
    }

    public function IndexSearch(Request $request)
    {
        $searchTerm = $request->input('search');

        $user = Auth::user();
        $information = Information::where(function ($query) use ($searchTerm) {
            $query->where('Agente', $searchTerm)
                ->orWhere('richiedente', $searchTerm)
                ->orWhere('Azienda', $searchTerm)
                ->orWhere('Telefono', 'like', '%' . $searchTerm . '%')
                ->orWhere('Referente', 'like', '%' . $searchTerm . '%')
                ->orWhere('Cell', 'like', '%' . $searchTerm . '%')
                ->orWhere('Tel_Uf', 'like', '%' . $searchTerm . '%')
                ->orWhere('Mail', 'like', '%' . $searchTerm . '%')
                ->orWhere('Sito', 'like', '%' . $searchTerm . '%')
                ->orWhere('Tip_Cliente', 'like', '%' . $searchTerm . '%');

        })->paginate(10);


        return view('admin.dashboard', compact('information', 'user'));
    }

    public function PrintPage(Request $request)
    {
        $ids = $request->input('ids');

        $information = Information::whereIn('ID', $ids)->get();

        return view('print', compact('information'));
    }

    public function PrintPageAll()
    {

        $information = Information::get();

        return view('print', compact('information'));
    }

    public function PrintThisPage(Request $request)
    {
        $ids = $request->input('ids');

        $information = Information::whereIn('ID', $ids)->get();

        return view('print', compact('information'));
    }

    public function NewInfo(Request $request)
    {

      
        $info = new Information();
        $info->richiedente = $request->richiedente;
        if (auth()->user()->Gruppo === 'User') {
            $info->Agente_ID = auth()->user()->ID;
        } else {
            $info->Agente_ID = $request->assegnato;
        }
        $info->Agente = $request->Stato;
        $info->Data_Creaz = $request->create_date == null ? date('Y-m-d H:i:s') : $request->create_date;
        $info->datamodif = date('Y-m-d H:i:s');
        $info->Tip_Cliente = $request->Tip_Cliente;
        $info->Azienda = $request->Azienda;
        $info->Brand = $request->Brand;
        $info->Indirizzo = $request->Indirizzo;
        $info->Citta = $request->Citta;
        $info->cap = $request->Cap;
        $info->Telefono = $request->Telefono;
        $info->Sito = $request->Sito;
        $info->Referente = $request->Referente;
        $info->Pos_Az = $request->Posizione;
        $info->Tel_Uf = $request->Telefono_uff;
        $info->Cell = $request->Cellulare;
        $info->Mail = $request->Mail;
        $info->Birth = Carbon::createFromFormat('d/m/Y, h:i A', $request->Birth)->format('Y-m-d H:i:s');
        $info->Part_Ev = $request->part_ev;
        $info->Note_Az = $request->Note_Az;
        $info->Note_Ref = $request->Note_Ref;
        $info->Note_Coll = $request->Note_Coll;
        $info->Note_Ev = $request->Note_Ev;
        $info->Notedir = $request->Notedir;

        $info->save();

        return redirect()->route('index')->with('success', 'creato con successo!');

    }

    public function InfoEdit($id)
    {
        $information = Information::find($id);
        return view('editRecord', compact('information'));

    }

    public function InfoEditSubmit(Request $request)
    {
        $info = Information::find($request->id);
        $info->richiedente = $request->richiedente ?? $info->richiedente;
        $info->Agente_ID = $request->assegnato ?? $info->Agente_ID;
        $info->Agente = $request->Stato ?? $info->Agente;
        $info->Tip_Cliente = $request->Tip_Cliente;
        $info->Azienda = $request->Azienda;
        $info->Brand = $request->Brand;
        $info->Indirizzo = $request->Indirizzo;
        $info->Citta = $request->Citta;
        $info->cap = $request->Cap;
        $info->Telefono = $request->Telefono;
        $info->Sito = $request->Sito;
        $info->Referente = $request->Referente;
        $info->Pos_Az = $request->Posizione;
        $info->Tel_Uf = $request->Telefono_uff;
        $info->Cell = $request->Cellulare;
        $info->Mail = $request->Mail;
        $info->Birth = $request->Birth;
        $info->Part_Ev = $request->part_ev;
        $info->Note_Az = $request->Note_Az;
        $info->Note_Ref = $request->Note_Ref;
        $info->Note_Coll = $request->Note_Coll;
        $info->Note_Ev = $request->Note_Ev;
        $info->Notedir = $request->Notedir;

        $info->save();

        return redirect()->route('index')->with('success', 'Saved !');

    }

    public function deleteItems(Request $request)
    {
        $ids = $request->input('ids');

        $information = Information::whereIn('ID', $ids)->delete();

        return redirect()->route('index')->with('success', 'Done !');
    }

    public function exportXl()
    {
        return Excel::download(new InformationExport, 'users.xlsx');
    }

    public function PasswordChange()
    {
        return view('passwordChange');
    }

    public function PasswordChangeSubmit(Request $request)
    {
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        if (!Hash::check($old_password, Auth::user()->Password)) {
            return redirect()->back()->with('error', 'Old password does not match!');
        }

        if ($new_password != $confirm_password) {
            return redirect()->back()->with('error', 'New password and confirm password does not match!');
        }

        $user = Auth::user();
        $user->Password = Hash::make($new_password);
        $user->save();

        return redirect()->route('index')->with('success', 'Saved !');

    }

    public function AdvanceSearch()
    {
        return view('searchAdvance');
    }
}
