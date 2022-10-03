<?php

namespace App\Http\Controllers;

use App\Models\sujet;
use App\Models\client;
use Illuminate\Http\Request;
use App\Models\clientLibelle;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreclientRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateclientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }
 
    public function addScript()
    {
        return view('pages.addscript');
    }
    public function addStatut()
    {
        return view('pages.addStatut');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreclientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if ($request->id=="") {
                $por = Validator::make($request->all(), [
                    'email' => 'required|unique:clients',
                    'telephone' => 'required|unique:clients',
                ]);
                if ($por->passes()) {
               $client= client::create([
                    'nom' => $request->nom,
                    'postnom' => $request->postnom,
                    'prenom' => $request->prenom,
                    'sexe' => $request->sexe,
                    'telephone' => $request->telephone,
                    'ville' => $request->ville,
                    'commune' => $request->commune,
                    'quartier' => $request->quartier,
                    'avenu' => $request->avenu,
                    'email' => $request->email,
                ]);
                if($client){
                    if(empty($request->libelle)){
                        $st=sujet::find($request->statut);
                        clientLibelle::create([
                            'client_id' => $client->id,
                            'libelle_id' => $st->titre,
                            'user_id' =>Auth::user()->id,
                            'commentaire' => $request->description,
                        ]);
                        return back()->with(['message' => 'Enregistrement réussit', "type" => "success"]);

                      // return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
                    }else{
                        clientLibelle::create([
                            'client_id' => $client->id,
                            'libelle_id' => $request->libelle,
                            'user_id' => Auth::user()->id,
                            'commentaire' => $request->description,
                        ]);
                        return back()->with(['message' => 'Enregistrement réussit', "type" => "success"]);
                        // return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
                    }
                }
            } else {
                return back()->with(['message' =>  $por->errors()->first(), "type" => "danger"]);
                // return response()->json(['reponse' => false,'msg' => $por->errors()->first()]);
            }
            } else {
               $cl= client::find($request->id);
               if($cl){
                    $cl->nom = $request->nom;
                    $cl->postnom = $request->postnom;
                    $cl->prenom = $request->prenom;
                    $cl->sexe = $request->sexe;
                    $cl->telephone = $request->telephone;
                    $cl->ville = $request->ville;
                    $cl->commune = $request->commune;
                    $cl->quartier = $request->quartier;
                    $cl->avenu = $request->avenu;
                    $cl->email = $request->email;
                    $cl->save();
                if(empty($request->libelle)){
                    $st=sujet::find($request->statut);
                    clientLibelle::create([
                        'client_id' => $cl->id,
                        'libelle_id' => $st->titre,
                        'user_id' =>Auth::user()->id,
                        'commentaire' => $request->description,
                    ]);
                    return back()->with(['message' => 'Enregistrement réussit', "type" => "success"]);
                    // return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
                }else{
                    clientLibelle::create([
                        'client_id' => $cl->id,
                        'libelle_id' => $request->libelle,
                        'user_id' => Auth::user()->id,
                        'commentaire' => $request->description,
                    ]);
                    return back()->with(['message' => 'Enregistrement réussit', "type" => "success"]);
                    // return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
                }
            }
               
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclientRequest  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclientRequest $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        //
    }
}
