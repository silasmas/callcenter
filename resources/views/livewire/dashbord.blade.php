<div wire:poll>
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab_publication">Rapport</a></li>
            {{-- <li class=""><a data-toggle="tab" href="#tab_categorie">Rapport par agent</a></li> --}}
        </ul>
        <div class="tab-content">
            <div id="tab_categorie" class="tab-pane active">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Postnom</th>
                                    <th>Prénom</th>
                                    <th>sexe</th>
                                    <th>telephone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Statut</th>
                                    <th>Commentaire</th>
                                    <th>Agent</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all as $i)
                                <tr class="gradeX">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $i->nom }}</td>
                                    <td>{{ $i->postnom }}</td>
                                    <td>{{ $i->prenom }}</td>
                                    <td>{{ $i->sexe }}</td>
                                    <td>{{ $i->telephone }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ 'V/ '.$i->ville." C/ ".$i->commune." Q/ ".$i->quartier." AV/ ".$i->avenu }}</td>
                                    <td>{{ $i->libelle_id }}</td>
                                    <td>{{ $i->commentaire }}</td>
                                    <td>{{ $i->un." ".$i->up }}</td>
                                    <td> {{ \Carbon\Carbon::parse( $i->created_at)->isoFormat('LLLL') }}</td>

                                </tr>
                                @empty

                                @endforelse


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Postnom</th>
                                    <th>Prénom</th>
                                    <th>sexe</th>
                                    <th>telephone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Statut</th>
                                    <th>Commentaire</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            <div id="tab_publication" class="tab-pane">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Postnom</th>
                                    <th>Prénom</th>
                                    <th>sexe</th>
                                    <th>telephone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Statut</th>
                                    <th>Commentaire</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($all as $i)
                                <tr class="gradeX">
                                    <td>{{ $i->id }}</td>
                                    <td>{{ $i->nom }}</td>
                                    <td>{{ $i->postnom }}</td>
                                    <td>{{ $i->prenom }}</td>
                                    <td>{{ $i->sexe }}</td>
                                    <td>{{ $i->telephone }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ 'V/ '.$i->ville." C/ ".$i->commune." Q/ ".$i->quartier." AV/ ".$i->avenu }}</td>
                                    <td>{{ $i->libelle_id }}</td>
                                    <td>{{ $i->commentaire }}</td>
                                    <td> {{ \Carbon\Carbon::parse( $i->created_at)->isoFormat('LLLL') }}</td>

                                </tr>
                                @empty

                                @endforelse


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Postnom</th>
                                    <th>Prénom</th>
                                    <th>sexe</th>
                                    <th>telephone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Statut</th>
                                    <th>Commentaire</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
