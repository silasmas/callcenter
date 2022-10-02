<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\sujet;
use App\Http\Requests\StoresujetRequest;
use App\Http\Requests\UpdatesujetRequest;
use App\Models\libelle;

class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libelle=libelle::where("sujet_id",request()->input('stat_id', 0))
        ->get();
        return response()->json($libelle);
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
     * @param  \App\Http\Requests\StoresujetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function addlibelle(Request $request)
    {
        $por = Validator::make($request->all(), [
            'description' => 'required',
            'ids' => 'required',
        ]);
        if ($por->passes()) {
           
            libelle::create([
                'description' => $request->description,
                'sujet_id' => $request->ids,
                'titre' => "",
            ]);
            return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
           
        } else {
            return response()->json(['reponse' => false,'msg' => $por->errors()->first()]);
        }
    }
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'titre' => 'required',
        ]);
        if ($por->passes()) {
           
            sujet::create([
                'titre' => $request->titre,
            ]);
            return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
           
        } else {
            return response()->json(['reponse' => false,'msg' => $por->errors()->first()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function show(sujet $sujet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function edit(sujet $sujet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesujetRequest  $request
     * @param  \App\Models\sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesujetRequest $request, sujet $sujet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sujet  $sujet
     * @return \Illuminate\Http\Response
     */
    public function destroy(sujet $sujet)
    {
        //
    }
}
