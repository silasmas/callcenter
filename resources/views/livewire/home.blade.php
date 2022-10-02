<div>
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row m-t-lg">
            @if (session()->has('message'))
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-{{session()->get('type')}} alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{ session()->get('message') }}
                </div>
            </div>
            @endif
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
                                                <input type="text" placeholder="Tapez le nom ou le numéro du client"
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
                                        <div class='row'>
                                            <div class=" col-lg-12 col-sm-12">
                                                <form method="POST" action="{{ route('addClient') }}" class='form-group' data-parsley-validate
                                                    >
                                                    {{-- onsubmit="add('addClient','#formScript','#formclient')" --}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="d-none" style="display: none">
                                                            <input name="id" 
                                                                value="{{ !empty($user)?$user->id:"" }}" />
                                                        </div>

                                                        <div class="col-sm-4 form-group ">
                                                            <label>Nom</label>
                                                            <input type="text" placeholder="Nom " class="form-control"
                                                                name='nom' required aria-required="true"
                                                                value="{{ !empty($user)?$user->nom:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Post-nom</label>
                                                            <input type="text" placeholder="Post-nom "
                                                                class="form-control" name='postnom' required
                                                                aria-required="true"
                                                                value="{{ !empty($user)?$user->postnom:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Prénom</label>
                                                            <input type="text" placeholder="Prénom "
                                                                class="form-control" name='prenom' required
                                                                aria-required="true"
                                                                value="{{ !empty($user)?$user->prenom:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>sexe</label>
                                                            <select name="sexe" id="" class="form-control"
                                                                wire:model.defer="sexe">
                                                                <option disabled selected> --Selectionez un genre--
                                                                </option>
                                                                <option value="M" {{ !empty($user)?$user->sexe:""
                                                                    }}>Massculin</option>
                                                                <option value="F">Féminin</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Téléphone</label>
                                                            <input type="text" placeholder="Téléphone "
                                                                class="form-control" name='telephone' required
                                                                aria-required="true"
                                                                value="{{ !empty($user)?$user->telephone:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-4 form-group ">
                                                            <label>Email</label>
                                                            <input type="email" placeholder="Email " class="form-control"
                                                                name='email' required aria-required="true"
                                                                value="{{ !empty($user)?$user->email:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>

                                                        <div class="col-sm-3 form-group ">
                                                            <label>Ville</label>
                                                            <select name="ville" class="select2 form-control"
                                                                id="" required aria-required="true"
                                                                data-parsley-trigger="change" wire:model.defer="ville">
                                                                @include("parties.listeVille")

                                                                <div class="help-block with-errors"></div>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 form-group ">
                                                            <label>Commune </label>
                                                            <select name="commune"
                                                                class="select2 carte2 form-control"
                                                                class=" form-control" id="" required
                                                                aria-required="true" data-parsley-trigger="change"
                                                                wire:model.defer="commune">
                                                                @include("parties.listeCommune")
                                                                <div class="help-block with-errors"></div>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 form-group ">
                                                            <label>Quartier</label>
                                                            <input type="text" placeholder="Quartier "
                                                                class="form-control" name='quartier' required
                                                                aria-required="true"
                                                                value="{{ !empty($user)?$user->quartier:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        <div class="col-sm-3 form-group ">
                                                            <label>Avenue</label>
                                                            <input type="text" placeholder="Avenue "
                                                                class="form-control" name='avenu' required
                                                                aria-required="true"
                                                                value="{{ !empty($user)?$user->avenu:"" }}"
                                                                data-parsley-minlength="2"
                                                                data-parsley-trigger="change">
                                                        </div>
                                                        @livewire('historique')
                                                        <div class=" col-sm-12 form-group">
                                                            <label>Commentaire </label>
                                                            <textarea name="description" class="form-control" rows="2"
                                                                cols="60">
                                                                </textarea>
                                                        </div>
                                                        <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                            <div class="col-sm-offset-4 col-sm-5">
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

    