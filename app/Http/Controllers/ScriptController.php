<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\script;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatescriptRequest;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorescriptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'niveau' => 'required|int|unique:scripts',
        ]);
        if ($por->passes()) {
           
            script::create([
                'niveau' => $request->niveau,
                'titre' => $request->titre,
                'description' => $request->description,
            ]);
            return response()->json(['reponse' => true,'msg' => 'Enregistrement réussit']);
           
        } else {
            return response()->json(['reponse' => false,'msg' => $por->errors()->first()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\script  $script
     * @return \Illuminate\Http\Response
     */
    public function show(script $script)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\script  $script
     * @return \Illuminate\Http\Response
     */
    public function edit(script $script)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatescriptRequest  $request
     * @param  \App\Models\script  $script
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatescriptRequest $request, script $script)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\script  $script
     * @return \Illuminate\Http\Response
     */
    public function destroy(script $script)
    {
        //
    }
}
