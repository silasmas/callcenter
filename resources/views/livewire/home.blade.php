<div>
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row m-t-lg">

            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="{{isset($service)?"":" active" }}"><a data-toggle="tab" href="#tab-branch">
                                Client
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-branch">
                            <div class="panel-body" id="formclient">
                                <form role="form" class="form-group">
                                    <div class="row ">
                                        <div class="col-lg-8">
                                            <div class="form-inlin">
                                                <input type="text"
                                                    placeholder="Trouvez un client par son nom, prenom,téléphone ou l'e-mail pour éviter les doublons"
                                                    class="form-control" name='titre' autocomplete="off"
                                                    wire:model.debounce.500ms="client">

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-inlin">
                                                <button class="btn btn-sm btn-primary"
                                                    wire:click.prevent="opneFolder('{{ empty($tab)?'':$tab->id }}')"
                                                    type="submit" @disabled($existe)>
                                                    <i class="fa fa-folder-open"></i> Ouvrir le dossier de {{
                                                    empty($tab)?'':$tab->prenom.' '.$tab->nom }}</button>

                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <br> <br>
                                <div class="ibox-content  " wire:loading.class='sk-loading'>
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class="tab-pane active">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if (session()->has("message"))
                                                <div class="col-md-6 col-md-offset-3">
                                                    <div class="alert alert-{{session()->get('type')}} alert-dismissable">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close"
                                                            type="button">×</button>
                                                        {{ session()->get('message') }}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class=" col-lg-12 col-sm-12">
                                                <form method="POST" class='form-group' wire:submit.prevent="saveClient"
                                                    data-parsley-validate>
                                                    {{-- action="{{ route('addClient') }}" --}}
                                                    {{-- onsubmit="add('addClient','#formScript','#formclient')" --}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="d-none">
                                                            <input name="id" style="display: none"
                                                                wire:model.defer='ids' />
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Type d'appel</label>
                                                            <select name="sexe" id="" class="form-control"
                                                                wire:model.defer="type">
                                                                <option value="" selected> --Selectionez un type--
                                                                </option>
                                                                <option value="Emis">Emis</option>
                                                                <option value="Reçu">Reçu</option>
                                                            </select>
                                                            @error('type') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Nom</label>
                                                            <input type="text" placeholder="Nom " class="form-control"
                                                                name='nom' required aria-required="true" {{--
                                                                value="{{ !empty($user)?$user->nom:"" }}" --}}
                                                                data-parsley-minlength="2" data-parsley-trigger="change"
                                                                wire:model.defer='nom'>
                                                            @error('nom') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror

                                                        </div>

                                                        <div class="col-sm-4 form-group ">
                                                            <label>Post-nom</label>
                                                            <input type="text" placeholder="Post-nom "
                                                                class="form-control" name='postnom' {{--
                                                                value="{{ !empty($user)?$user->postnom:"" }}" --}}
                                                                wire:model.defer='postnom'>
                                                            @error('postnom') <span class="error text-danger">{{
                                                                $message }}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Prénom</label>
                                                            <input type="text" placeholder="Prénom "
                                                                class="form-control" name='prenom'
                                                                wire:model.defer='prenom'>
                                                            @error('prenom') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>sexe</label>
                                                            <select name="sexe" id="" class="form-control"
                                                                wire:model.defer="sexe">
                                                                <option value="" selected> --Selectionez un genre--
                                                                </option>
                                                                <option value="M">Masculin</option>
                                                                <option value="F">Féminin</option>
                                                            </select>
                                                            @error('sexe') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Téléphone</label>
                                                            <input type="text" placeholder="Téléphone "
                                                                class="form-control" name='telephone' required
                                                                aria-required="true" data-parsley-minlength="2"
                                                                data-parsley-trigger="change"
                                                                wire:model.defer='telephone'>
                                                            @error('telephone') <span class="error text-danger">{{
                                                                $message }}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Téléphone 2</label>
                                                            <input type="text" placeholder="Téléphone "
                                                                class="form-control" name='tel2'
                                                                wire:model.defer='tel2'>
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Téléphone 3</label>
                                                            <input type="text" placeholder="Téléphone "
                                                                class="form-control" name='tel3' {{--
                                                                value="{{ !empty($user)?$user->tel3:"" }}" --}}
                                                                wire:model.defer='tel3'>
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Email</label>
                                                            <input type="text" placeholder="Email " class="form-control"
                                                                name='email' wire:model.defer='email'>
                                                            @error('email') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-3 form-group ">
                                                            <label>Ville</label>
                                                            <select name="ville" class="select2 form-control" id=""
                                                                required aria-required="true"
                                                                data-parsley-trigger="change" wire:model.defer="ville">
                                                                @include("parties.listeVille")

                                                                <div class="help-block with-errors">
                                                                    @error('ville') <span class="error text-danger">{{
                                                                        $message }}</span> @enderror
                                                                </div>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 form-group ">
                                                            <label>Commune </label>
                                                            <select name="commune" class="carte2 form-control select2"
                                                                id="" wire:model.defer="commune">
                                                                @include("parties.listeCommune")
                                                            </select>
                                                            @error('commune') <span class="error text-danger">{{
                                                                $message }}</span> @enderror
                                                        </div>
                                                        <div class="col-sm-2 form-group ">
                                                            <label>Quartier</label>
                                                            <input type="text" placeholder="Quartier "
                                                                class="form-control" name='quartier'
                                                                wire:model.defer='commune'>
                                                            @error('quartier') <span class="error text-danger">{{
                                                                $message }}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-3 form-group ">
                                                            <label>Avenue</label>
                                                            <input type="text" placeholder="Avenue "
                                                                class="form-control" name='avenu'
                                                                wire:model.defer='avenu'>
                                                            @error('avenu') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror
                                                        </div>
                                                        <div class="col-sm-1 form-group ">
                                                            <label>Numéro </label>
                                                            <input type="text" placeholder="Numéro "
                                                                class="form-control" name='numero'
                                                                wire:model.defer='numero'>
                                                            @error('numero') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-2 form-group ">
                                                            <label>Date de l'appel </label>
                                                            <input type="date" placeholder="Date de l'appel "
                                                                class="form-control" name='date'
                                                                wire:model.defer='date'>
                                                            @error('numero') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-2 form-group clockpicker" data-autoclose="true">
                                                            <label>Heure (12:30) </label>
                                                            <input type="text" placeholder="Heure 12:300"
                                                                class="form-control" name='heure'
                                                                wire:model.defer='heure'>
                                                            @error('heure') <span class="error text-danger">{{ $message}}</span> @enderror

                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Satut </label>
                                                            <select name="statut" id="statut"
                                                                class="form-control select2"                                                              
                                                                required
                                                                wire:model.defer='statut'>
                                                                <option value="" disabled selected> --Selectionez un statut--</option>
                                                                @forelse ($statu as $s)
                                                                <option value="{{ $s->id }}">{{ $s->titre }}</option>
                                                                @empty

                                                                @endforelse
                                                            </select>
                                                            @error('statut') <span class="error text-danger">{{ $message
                                                                }}</span> @enderror

                                                        </div>
                                                        @if(!is_null($libelles) )
                                                        @if(count($libelles)>0)
                                                        <div class="col-sm-4 form-group d-none">
                                                            <label>Libelle</label>
                                                            <select name="libelle" id="libelle"
                                                                class="form-control select2" required
                                                                wire:model.defer='libelle'>
                                                                <option value="" disabled selected> --Selectionez un
                                                                    statut-- </option>
                                                                @forelse ($libelles as $s)
                                                                <option value="{{ $s->description }}">{{ $s->description
                                                                    }}
                                                                </option>
                                                                @empty
                                                                <option value="" disabled> Ce statut n'a pas des libelle
                                                                </option>
                                                                @endforelse
                                                            </select>
                                                            @error('libelle') <span class="error text-danger">{{
                                                                $message }}</span> @enderror

                                                        </div>
                                                        @endif
                                                        @endif
                                                        <div class=" col-sm-12 form-group">
                                                            <label>Commentaire </label>
                                                            <textarea name="description" class="form-control" rows="2"
                                                                cols="60" wire:model.defer='description'>
                                                                </textarea>
                                                            @error('description') <span class="error text-danger">{{
                                                                $message }}</span> @enderror

                                                        </div>
                                                        <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                            <div class="col-sm-5">
                                                                <button class="btn btn-sm btn-warning"
                                                                    wire:click="modifClient" @disabled($modif)
                                                                    wire:loading.property='disabled'>Modifier </button>

                                                            </div>

                                                            <div class="col-sm-offset-1 col-sm-5">
                                                                <button class="ladda-button btn btn-sm btn-primary"
                                                                    type="submit">Enregistrer</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('autres-script')
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/jasny/jasny-bootstrap.min.js') }}"></script>
 <!-- Clock picker -->
 <script src="{{ asset('assets/js/clockpicker/clockpicker.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        //$('.clockpicker').clockpicker();
    });
    function select(id){
        var $state = $('#libelle');
        @this.selectstatut=id;
    }
</script>
@endsection