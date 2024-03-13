<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Password_Reset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private function applyFilter($query, $filterOption, $fieldName, $filterValue)
    {
        switch ($filterOption) {
            case 'Contains':
                $query->where($fieldName, 'like', '%' . $filterValue . '%');
                break;
            case 'Equals':
                $query->where($fieldName, $filterValue);
                break;
            case 'Starts_with':
                $query->where($fieldName, 'like', $filterValue . '%');
                break;
            case 'More_than':
                $query->where($fieldName, '>', $filterValue);
                break;
            case 'Less_than':
                $query->where($fieldName, '<', $filterValue);
                break;
            case 'Between':
                // Assuming $filterValue is an array with two values
                $query->whereBetween($fieldName, $filterValue);
                break;
            case 'Empty':
                $query->whereNull($fieldName);
                break;
        }
    }
    private function applyNotFilter($query, $filterOption, $fieldName, $filterValue)
    {
        switch ($filterOption) {
            case 'Contains':
                $query->where($fieldName, 'not like', '%' . $filterValue . '%');
                break;
            case 'Equals':
                $query->where($fieldName, '!=', $filterValue);
                break;
            case 'Starts_with':
                $query->where($fieldName, 'not like', $filterValue . '%');
                break;
            case 'More_than':
                $query->where($fieldName, '<=', $filterValue);
                break;
            case 'Less_than':
                $query->where($fieldName, '>=', $filterValue);
                break;
            case 'Between':
                // Assuming $filterValue is an array with two values
                $query->whereNotBetween($fieldName, $filterValue);
                break;
            case 'Empty':
                $query->whereNotNull($fieldName);
                break;
        }
    }

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
            $query
                ->where('Agente', $searchTerm)
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
        // dd($request->all());

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

        return redirect()
            ->route('index')
            ->with('success', 'creato con successo!');
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

        return redirect()
            ->route('index')
            ->with('success', 'Saved !');
    }

    public function deleteItems(Request $request)
    {
        $ids = $request->input('ids');

        $information = Information::whereIn('ID', $ids)->delete();

        return redirect()
            ->route('index')
            ->with('success', 'Done !');
    }

    public function PasswordChange($uid)
    {
        return view('passwordChange', compact('uid'));
    }

    public function PasswordChangeSubmit(Request $request)
    {
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        $code = $request->code;

        if ($old_password) {
            if (!Hash::check($old_password, User::find($request->user_id)->Password)) {
                return redirect()
                    ->back()
                    ->with('error', 'Old password does not match!');
            }
        }
        if ($code) {
            $pass_reset = Password_Reset::where('token', $code)->first();
            if (!$pass_reset) {
                return redirect()
                    ->back()
                    ->with('error', 'Code does not match!');
            }

            // else delete the code
            $pass_reset->delete();
        }

        if ($new_password != $confirm_password) {
            return redirect()
                ->back()
                ->with('error', 'New password and confirm password does not match!');
        }

        $user = User::find($request->user_id);
        $user->Password = Hash::make($new_password);
        $user->save();

        return redirect()
            ->route('index')
            ->with('success', 'Saved !');
    }

    public function AdvanceSearch()
    {
        return view('searchAdvance');
    }

    public function AdvanceSearchSubmit(Request $request)
    {
     //  dd($request->all());


        $query = Information::query();

        if ($request->has("agente_richiedente_selection_user") && $request->agente_richiedente_selection_user && !$request->has("not_agente_richiedente")) {
            $query->where('richiedente', $request->agente_richiedente_selection_user);
        } elseif ($request->has("agente_richiedente_selection_user") && $request->agente_richiedente_selection_user && $request->has("not_agente_richiedente")) {
            $query->whereNotIn('richiedente', [$request->agente_richiedente_selection_user]);
        }

        if ($request->has("tipologia_cliente_selection_2") && $request->tipologia_cliente_selection_2 && !$request->has("not_tipologia_cliente")) {
            $query->where('Tip_Cliente', $request->tipologia_cliente_selection_2);
        } elseif ($request->has("tipologia_cliente_selection_2") && $request->tipologia_cliente_selection_2 && $request->has("not_tipologia_cliente")) {
            $query->whereNotIn('Tip_Cliente', [$request->tipologia_cliente_selection_2]);
        }
        // // director note option
        $selection = $request->note_direttore_selection;
        if ($request->has('not_note_direttore') && $request->Note_Direttore) {
            //     // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Notedir', $request->Note_Direttore);
        } elseif ($request->Note_Direttore) {
            //  dd($request->Note_Direttore);
            $this->applyFilter($query, $selection, 'Notedir', $request->Note_Direttore);
        }

        // // state options
        $selection = $request->stato_scheda_selection;
        if ($request->has('not_stato_scheda') && $request->Stato_Scheda) {
            $this->applyNotFilter($query, $selection, 'Agente', $request->Stato_Scheda);
        } elseif ($request->Stato_Scheda) {
            $this->applyFilter($query, $selection, 'Agente', $request->Stato_Scheda);
        }

        // // id options
        $selection = $request->id_selection;
        if ($request->has('not_id') && $request->ID) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Agente_ID', $request->ID);
        } elseif ($request->ID) {
            $this->applyFilter($query, $selection, 'Agente_ID', $request->ID);
        }

        // // agent richiedente
        // $selection = $request->agente_richiedente_selection_1;
        // $ric_user = null;
        // if ($request->agente_richiedente_selection_user) {
        //     $ric_user = User::find($request->agente_richiedente_selection_user)->Nome;
        // }
        // if ($request->has('not_agente_richiedente') && $ric_user) {
        //     // Include additional conditions inside this closure
        //     $this->applyNotFilter($query, $selection, 'richiedente', $ric_user);
        // } elseif ($ric_user) {
        //     $this->applyFilter($query, $selection, 'richiedente', $ric_user);
        // }

        // // top client option
        // $selection = $request->tipologia_cliente_selection_1;
        // if ($request->has('not_tipologia_cliente') && $request->tipologia_cliente_selection_2) {
        //     // Include additional conditions inside this closure
        //     $this->applyNotFilter($query, $selection, 'Tip_Cliente', $request->tipologia_cliente_selection_2);
        // } elseif ($request->tipologia_cliente_selection_2) {
        //     $this->applyFilter($query, $selection, 'Tip_Cliente', $request->tipologia_cliente_selection_2);
        // }

        // // agenda options
        $selection = $request->azienda_selection;
        if ($request->has('not_azienda') && $request->Azienda) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Azienda', $request->Azienda);
        } elseif ($request->Azienda) {
            $this->applyFilter($query, $selection, 'Azienda', $request->Azienda);
        }

        // brand options
        $selection = $request->brand_selection;
        if ($request->has('not_brand') && $request->Brand) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Brand', $request->Brand);
        } elseif ($request->Brand) {
            $this->applyFilter($query, $selection, 'Brand', $request->Brand);
        }

        // city options
        $selection = $request->city_selection;
        if ($request->has('not_city') && $request->City) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Citta', $request->City);
        } elseif ($request->City) {
            $this->applyFilter($query, $selection, 'Citta', $request->City);
        }

        // cap options
        $selection = $request->cap_selection;
        if ($request->has('not_cap') && $request->Cap) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Cap', $request->Cap);
        } elseif ($request->Cap) {
            $this->applyFilter($query, $selection, 'Cap', $request->Cap);
        }

        // indirizzo options
        $selection = $request->indirizzo_selection;
        if ($request->has('not_indirizzo') && $request->Indirizzo) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Indirizzo', $request->Indirizzo);
        } elseif ($request->Indirizzo) {
            $this->applyFilter($query, $selection, 'Indirizzo', $request->Indirizzo);
        }

        // refernte options
        $selection = $request->referente_selection;
        if ($request->has('not_referente') && $request->Referente) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Referente', $request->Referente);
        } elseif ($request->Referente) {
            $this->applyFilter($query, $selection, 'Referente', $request->Referente);
        }

        // compleanno options
        $selection = $request->compleanno_selection;
        if ($request->has('not_compleanno') && $request->Compleanno) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Birth', $request->Compleanno);
        } elseif ($request->Compleanno) {
            $this->applyFilter($query, $selection, 'Birth', $request->Compleanno);
        }

        // telephone options
        $selection = $request->telefono_selection;
        if ($request->has('not_telefono') && $request->Telefono) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Cell', $request->Telefono);
        } elseif ($request->Telefono) {
            $this->applyFilter($query, $selection, 'Cell', $request->Telefono);
        }

        // part time options
        $selection = $request->part_eventi_selection_1;
        if ($request->has('not_part_eventi') && $request->part_eventi_selection_2) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Part_Ev', $request->part_eventi_selection_2);
        } elseif ($request->part_eventi_selection_2) {
            $this->applyFilter($query, $selection, 'Part_Ev', $request->part_eventi_selection_2);
        }

        // sito options
        $selection = $request->sito_selection;
        if ($request->has('not_sito') && $request->Sito) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Sito', $request->Sito);
        } elseif ($request->Sito) {
            $this->applyFilter($query, $selection, 'Sito', $request->Sito);
        }

        // note azenda
        $selection = $request->note_azienda_selection;
        if ($request->has('not_note_azienda') && $request->Note_Azienda) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Note_Az', $request->Note_Azienda);
        } elseif ($request->Note_Azienda) {
            $this->applyFilter($query, $selection, 'Note_Az', $request->Note_Azienda);
        }

        // pos az
        $selection = $request->posizione_az_selection;
        if ($request->has('not_posizione_az') && $request->Posizione_Az) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Pos_Az', $request->Posizione_Az);
        } elseif ($request->Posizione_Az) {
            $this->applyFilter($query, $selection, 'Pos_Az', $request->Posizione_Az);
        }

        // tellephone official
        $selection = $request->tel_uff_selection;
        if ($request->has('not_tel_uff') && $request->Tel_Uff) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Tel_Uf', $request->Tel_Uff);
        } elseif ($request->Tel_Uff) {
            $this->applyFilter($query, $selection, 'Tel_Uf', $request->Tel_Uff);
        }

        // mail options
        $selection = $request->mail_selection;
        if ($request->has('not_mail') && $request->Mail) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Mail', $request->Mail);
        } elseif ($request->Mail) {
            $this->applyFilter($query, $selection, 'Mail', $request->Mail);
        }

        // note reference
        $selection = $request->note_ref_selection;
        if ($request->has('not_note_ref') && $request->Note_ref) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Note_Ref', $request->Note_ref);
        } elseif ($request->Note_ref) {
            $this->applyFilter($query, $selection, 'Note_Ref', $request->Note_ref);
        }

        // note collaborator
        $selection = $request->note_col_selection;
        if ($request->has('not_note_col') && $request->Note_col) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Note_Coll', $request->Note_col);
        } elseif ($request->Note_col) {
            $this->applyFilter($query, $selection, 'Note_Coll', $request->Note_col);
        }

        // note ev
        $selection = $request->note_ev_selection;
        if ($request->has('not_note_ev') && $request->Note_ev) {
            // Include additional conditions inside this closure
            $this->applyNotFilter($query, $selection, 'Note_Ev', $request->Note_ev);
        } elseif ($request->Note_ev) {
            $this->applyFilter($query, $selection, 'Note_Ev', $request->Note_ev);
        }

        $user = Auth::user();
        $information = $query->paginate(10)->appends(request()->query());


        return view('admin.dashboard', compact('user', 'information'));
    }

    public function collabSearchAdmin(Request $request)
    {
        $searchTerm = $request->input('search');

        $user = Auth::user();
        $users = User::where('Nome', 'like', '%' . $searchTerm . '%')
            ->orWhere('mail', 'like', '%' . $searchTerm . '%')
            ->paginate(10);

        return view('admin.collab', compact('user', 'users'));
    }

    public function PrintCollab(Request $request)
    {
        $ids = $request->input('ids');

        $users = User::whereIn('ID', $ids)->get();

        return view('admin.printCollab', compact('users'));
    }

    public function PrintCollabAll()
    {
        $users = User::get();
        return view('admin.printCollab', compact('users'));
    }

    public function SortDateModification($sort)
    {
        $user = Auth::user();
        $information = Information::orderBy('Data_Creaz', $sort)->paginate(10);
        // set svg icon for data_Creaz to session
        session(['richiedente' => '', 'richiedente_sort' => '']);

        session(['Agente' => '', 'Agente_sort' => '']);

        if ($sort === 'asc') {
            session([
                'dataCreaz' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
          </svg>',
                'date_creation_sort' => 'asc',
            ]);
        } elseif ($sort === 'desc') {
            session([
                'dataCreaz' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
          </svg>',
                'date_creation_sort' => 'desc',
            ]);
        }

        return view('admin.dashboard', compact('user', 'information'));
    }

    public function SortStato($sort)
    {
        $user = Auth::user();
        $information = Information::orderBy('Agente', $sort)->paginate(10);
        // set svg icon for data_Creaz to session
        session(['dataCreaz' => '', 'date_creation_sort' => '']);

        session(['richiedente' => '', 'richiedente_sort' => '']);

        if ($sort === 'asc') {
            session([
                'Agente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
          </svg>',
                'Agente_sort' => 'asc',
            ]);
        } elseif ($sort === 'desc') {
            session([
                'Agente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
          </svg>',
                'Agente_sort' => 'desc',
            ]);
        }

        return view('admin.dashboard', compact('user', 'information'));
    }

    public function SortRichiedente($sort)
    {
        $user = Auth::user();
        $information = Information::orderBy('richiedente', $sort)->paginate(10);
        // set svg icon for data_Creaz to session

        session(['dataCreaz' => '', 'date_creation_sort' => '']);

        session(['Agente' => '', 'Agente_sort' => '']);
        if ($sort === 'asc') {
            session([
                'richiedente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
          </svg>',
                'richiedente_sort' => 'asc',
            ]);
        } elseif ($sort === 'desc') {
            session([
                'richiedente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
          </svg>',
                'richiedente_sort' => 'desc',
            ]);
        }

        return view('admin.dashboard', compact('user', 'information'));
    }

    public function searchMatchingAzenda(Request $request)
    {
        $azenda = $request->query('azienda');
        $success = false;
        $information = Information::where('Azienda', '=', $azenda)->get();
        if (!$information->isEmpty()) {
            $success = true;
        }

        return response()->json([
            'success' => $success,
        ]);
    }

    public function searchMatchingBrand(Request $request)
    {
        $brand = $request->query('brand');

        $success = false;
        $information = Information::whereNotNull('Brand')
            ->where('Brand', '=', $brand)
            ->get();

        if (!$information->isEmpty()) {
            $success = true;
        }

        return response()->json([
            'success' => $success,
        ]);
    }
}
