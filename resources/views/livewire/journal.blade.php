<div>
   
    <div class="sidebar-title">
        <h3> <i class="fa fa-cube"></i>Vos appels d'aujourd'hui</h3>
        <small><i class="fa fa-tim"></i>Vous avez {{ $journal->count() }} enregistrement(s)</small>
    </div>
    <div>
        
    
    @forelse ($journal as $j)
    <div class="sidebar-message">
        <a href="#">
            <span class="label label-primary pull-right">{{ $j->libelle_id }}</span>
            <div class="pull-left text-center">
                <img alt="image" class="img-circle message-avatar" src="{{ asset('assets/img/default.png') }}">
            </div>
            <div class="media-body">
                {{ $j->nom." ".$j->nom }}
                <br>
                <span> {{ $j->telephone." (".$j->sexe.")" }}</span>
                <br>
                <small class="text-muted">{{ \Carbon\Carbon::parse( $j->created_at)->isoFormat('LLLL')  }}</small>
            </div>
        </a>
    </div>
    @empty
    <small class="text-danger">Vous n'avez rien enregistrer jusque là</small>
    @endforelse

</div>
</div>
