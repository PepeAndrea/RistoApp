<?php

namespace App\Http\Controllers;

use App\Restourant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RistoController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $data = Restourant::all();
        return view('list',['data' => $data,]);
    }

    public function add()
    {
        return view('add');
    }

    public function storeRisto(Request $req)
    {
        $req->validate([
            'nome' => 'required|unique:restourants,name',
            'indirizzo' => 'required',
            'email' => 'required|email|unique:restourants,email'
        ], [
            'nome.required' => 'Inserisci un nome',
            'nome.unique' => 'Il nome digitato è già registrato',
            'indirizzo.required' => 'Inserisci indirizzo',
            'email.required' => 'Inserisci indirizzo email',
            'email.email' => 'Inserisci indirizzo email valido',
            'email.unique' => 'Indirizzo email già registrato',
        ]);

        $risto = new Restourant;
        $risto->name=$req->input('nome');
        $risto->address=$req->input('indirizzo');
        $risto->email=$req->input('email');
        $risto->save();
        $req->session()->flash('status', 'Ristorante aggiunto con successo');
        return redirect('list');
    }

    public function delete($id)
    {
        if (Restourant::find($id)->delete()) {
            Session::flash('status', 'Ristorante eliminato');
            return redirect('list');
        } else {
            Session::flash('status', 'Impossibile eliminare ristorante');
            return redirect('list');
        }
        
    }

    public function editPage($id)
    {
        if($data = Restourant::find($id)) {
        return view('edit',['data' => $data,]);
        }else{
            Session::flash('status', 'Impossibile trovare il ristorante');
            return redirect('list');
        }
    }

    public function editRisto(Request $req)
    {
        $req->validate([
            'nome' => 'required|unique:restourants,name,'.$req->input('id'),
            'indirizzo' => 'required',
            'email' => 'required|email|unique:restourants,email,'.$req->input('id')
        ], [
            'nome.required' => 'Inserisci un nome',
            'nome.unique' => 'Il nome digitato è già registrato',
            'indirizzo.required' => 'Inserisci indirizzo',
            'email.required' => 'Inserisci indirizzo email',
            'email.email' => 'Inserisci indirizzo email valido',
            'email.unique' => 'Indirizzo email già registrato',
        ]);

        $risto = Restourant::find($req->id);
        $risto->name=$req->input('nome');
        $risto->address=$req->input('indirizzo');
        $risto->email=$req->input('email');
        $risto->save();
        $req->session()->flash('status', 'Ristorante modificato con successo');
        return redirect('list');
    }

    public function search(Request $req)
    {
        $data = Restourant::where('address', $req->address)->get();
        if ($data->count() >0) {
            return view('search',['data' => $data,]);
        }else{
            Session::flash('status', 'Impossibile trovare il ristorante');
            return view('search');
        }
    }

}
