<div>
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab_publication">Rapport</a></li>
            {{-- <li class=""><a data-toggle="tab" href="#tab_categorie">Rapport par agent</a></li> --}}
        </ul>
        <div class="tab-content">
            <div id="tab_categorie" class="tab-pane active">
                <div class="panel-body">
                    <div class="row">
                        <form role="form" class="form-group" method="GET">
                            <div class="row ">
                                <div class="col-lg-3 ">
                                    <h3 class="pull-right" >Afficher par date :</h3>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-inlin">
                                        <input wire:model.defer="date" type="date" class="form-control datepicker" name='titre'>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-inlin">                                        
                                        <button class="btn btn-sm btn-primary" type="submit" 
                                        wire:submite.prevent="byDate">
                                            <i class="fa fa-search"></i> Enoyer</button>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                        <div class="row">
                            <div class="ibox-content  " wire:loading.class='sk-loading'>
                                <div class="sk-spinner sk-spinner-wandering-cubes">
                                    <div class="sk-cube1"></div>
                                    <div class="sk-cube2"></div>
                                </div>
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
                                                <td>{{ 'V/ '.$i->ville." C/ ".$i->commune." Q/ ".$i->quartier." AV/
                                                    ".$i->avenu }}</td>
                                                <td>{{ $i->libelle_id }}</td>
                                                <td>{{ Str::limit($i->commentaire, 100, '...') }}</td>
                                                <td>{{ $i->un." ".$i->up }}</td>
                                                <td> {{ \Carbon\Carbon::parse( $i->created_at)->isoFormat('LLLL') }}
                                                </td>

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
    </div>
</div>

@section('autres-script')
<script>
    
</script>
@endsection