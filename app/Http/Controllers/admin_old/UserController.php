<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function PrintUserAll(){
        $information = Information::where('Agente_ID', auth()->user()->ID)->get();
        return view('print', compact('information'));
    }

    public function CollabSearch(Request $request){
        $searchTerm = $request->input('search');

        $user = Auth::user();
        $information = Information::where(function ($query) use ($searchTerm) {
            $query->where('Agente_ID', auth()->user()->ID)
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


        return view('agent.dashboard', compact('information', 'user'));
    }
}
