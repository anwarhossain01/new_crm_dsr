<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $query->where('Agente', $searchTerm )
                  ->orWhere('richiedente',  $searchTerm )
                  ->orWhere('Azienda',  $searchTerm )
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
}
