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

        if($old_password){
            if (!Hash::check($old_password, User::find($request->user_id)->Password)) {
                return redirect()->back()->with('error', 'Old password does not match!');
            }
        }
        if($code){
            $pass_reset = Password_Reset::where('token', $code)->first();
            if (!$pass_reset) {
                return redirect()->back()->with('error', 'Code does not match!');
            }

            // else delete the code
            $pass_reset->delete();
        }
        

        if ($new_password != $confirm_password) {
            return redirect()->back()->with('error', 'New password and confirm password does not match!');
        }

        $user = User::find($request->user_id);
        $user->Password = Hash::make($new_password);
        $user->save();

        return redirect()->route('index')->with('success', 'Saved !');

    }

    public function AdvanceSearch()
    {
        return view('searchAdvance');
    }

    public function AdvanceSearchSubmit(Request $request){
    dd($request->all());
      $query = Information::query();

      // director note option
      $selection = $request->note_direttore_selection; 
      if ($request->has('not_note_direttore') && $request->Note_Direttore) {
          
      }elseif($request->Note_Direttore){
        $this->applyFilter($query, $selection, 'Notedir', $request->Note_Direttore);
      }

      $user = Auth::user();
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
        session(['richiedente' => '',
            'richiedente_sort' => ''
        ]);

        session(['Agente' => '',
            'Agente_sort' => ''
        ]);
        
        if ($sort === 'asc') {
            session(['dataCreaz' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
          </svg>',
                'date_creation_sort' => 'asc'
            ]);
        } elseif ($sort === 'desc') {
            session(['dataCreaz' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
          </svg>'
                ,
                'date_creation_sort' => 'desc']);

        }

        return view('admin.dashboard', compact('user', 'information'));
    }

    public function SortStato($sort)
    {
        $user = Auth::user();
        $information = Information::orderBy('Agente', $sort)->paginate(10);
        // set svg icon for data_Creaz to session
        session(['dataCreaz' => '',
            'date_creation_sort' => ''
        ]);

        session(['richiedente' => '',
            'richiedente_sort' => ''
        ]);

        if ($sort === 'asc') {
            session(['Agente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
          </svg>',
                'Agente_sort' => 'asc'
            ]);
        } elseif ($sort === 'desc') {
            session(['Agente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
          </svg>'
                ,
                'Agente_sort' => 'desc']);

        }

        return view('admin.dashboard', compact('user', 'information'));
    }

    public function SortRichiedente($sort)
    {
        $user = Auth::user();
        $information = Information::orderBy('richiedente', $sort)->paginate(10);
        // set svg icon for data_Creaz to session

        session(['dataCreaz' => '',
            'date_creation_sort' => ''
        ]);


        session(['Agente' => '',
            'Agente_sort' => ''
        ]);
        if ($sort === 'asc') {
            session(['richiedente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
          </svg>',
                'richiedente_sort' => 'asc'
            ]);
        } elseif ($sort === 'desc') {
            session(['richiedente' => '<svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v12m0 0 4-4m-4 4L1 9"/>
          </svg>'
                ,
                'richiedente_sort' => 'desc']);

        }

        return view('admin.dashboard', compact('user', 'information'));
    }
}
