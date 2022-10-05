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
                                Statut
                            </a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-sujet">
                                Libelle
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="panel-body" id="tab-statut">
                                <div class="ibox-content">
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class='row'>
                                        <div class=" col-lg-12 col-sm-12">
                                            <form method="POST" role="form" class='form-group'id="formStatu"
                                                data-parsley-validate onsubmit="add('addstatute','#formStatu','#tab-statut')" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                        <input name="id" hidden
                                                            value="{{ isset($branche)?$branche->id:"" }}" />
                                                    </div>

                                                    <div class="col-sm-8">
                                                       <div class="form-inlin">
                                                        {{-- <label>Titre</label> --}}
                                                        <input type="text" placeholder="Entrer le Nom du statut " class="form-control"
                                                            name='titre' required aria-required="true" 
                                                            value="{{ isset($branche)?$branche->titre:"" }}"
                                                            data-parsley-minlength="2" data-parsley-trigger="change">
                                                       </div>
                                                    </div>      
                                                    <div class="col-lg-3 ">
                                                        <div class="form-inlin">
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">{{
                                                                isset($branche)?"Modifier":"Enregistrer" }}</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-sujet">
                            <div class="panel-body">
                              @livewire("add-stat")
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>