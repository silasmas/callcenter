<?php

namespace App\Http\Controllers;

use App\Models\libelle;
use App\Http\Requests\StorelibelleRequest;
use App\Http\Requests\UpdatelibelleRequest;

class LibelleController extends Controller
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
     * @param  \App\Http\Requests\StorelibelleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelibelleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\libelle  $libelle
     * @return \Illuminate\Http\Response
     */
    public function show(libelle $libelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\libelle  $libelle
     * @return \Illuminate\Http\Response
     */
    public function edit(libelle $libelle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelibelleRequest  $request
     * @param  \App\Models\libelle  $libelle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelibelleRequest $request, libelle $libelle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\libelle  $libelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(libelle $libelle)
    {
        //
    }
}
