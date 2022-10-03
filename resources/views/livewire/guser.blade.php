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
                        <li class="{{ $openedit?" active":"" }} active"><a data-toggle="tab" href="#tab-user">Ajouter un
                                agent</a></li>
                        <li class=""><a data-toggle="tab" href="#listAgent"> Liste agent
                                <span class="pull-right label label-danger">{{ count($users) }}</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane {{ $openedit?" active":"" }} active" id="tab-user">
                            <div class="ibox-content" wire:loading.class='sk-loading'>
                                <div class="sk-spinner sk-spinner-wandering-cubes">
                                    <div class="sk-cube1"></div>
                                    <div class="sk-cube2"></div>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" class='form-group' id="formScript" data-parsley-validate
                                        wire:submit.prevent="{{ $openedit?" updateUser":"addUser" }}">
                                        @csrf
                                        <div class="row">
                                            <div>
                                                <input name="id" hidden wire:model.defer="idu" />
                                            </div>

                                            <div class="col-sm-6 form-group ">
                                                <label>Nom</label>
                                                <input type="text" placeholder="Nom " class="form-control" name='name'
                                                    wire:model.defer="name">
                                                @error('name') <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6 form-group ">
                                                <label>Prénom</label>
                                                <input type="text" placeholder="Prénom " class="form-control"
                                                    name='prenom' wire:model.defer="prenom">
                                                @error('prenom') <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-4 form-group ">
                                                <label>Sexe</label>
                                                <select name="sexe" id="" required aria-required="true"
                                                    class=" form-control " wire:model.defer="sexe">
                                                    <option value="" disabled selected>Selectionez un genre</option>
                                                    <option value="M">HOMME</option>
                                                    <option value="F">FEMME</option>
                                                </select>
                                                @error('titre') <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="col-sm-4 form-group ">
                                                <label>Téléphone</label>
                                                <input type="text" placeholder="Téléphone " class="form-control"
                                                    name='telephone' wire:model.defer="telephone">
                                                @error('telephone') <span class="error text-danger">{{ $message
                                                    }}</span>
                                                @enderror

                                            </div>
                                            <div class="col-sm-4 form-group ">
                                                <label>Email</label>
                                                <input type="email" placeholder="Email " class="form-control"
                                                    name='email' required aria-required="true"
                                                    data-parsley-minlength="2" data-parsley-trigger="change"
                                                    wire:model.defer="email">
                                                @error('email') <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="col-sm-4 form-group ">
                                                <label>Fonction</label>
                                                <input type="text" placeholder="Fonction " class="form-control"
                                                    name='fonction' wire:model.defer="fonction">
                                                @error('fonction') <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="col-sm-4 form-group ">
                                                <label>Niveau</label>
                                                <select name="niveau" id="" class="form-control "
                                                    wire:model.defer="niveau">
                                                    <option value="" disabled selected>Selectionez un niveau</option>
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                @error('niveau') <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="col-sm-4 form-group ">
                                                <label>Mot de passe</label>
                                                <input type="password" placeholder="Mot de passe " class="form-control"
                                                    name='password' wire:model.defer="pwd">
                                                @error('password') <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>

                                            <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                <div class="col-sm-offset-4 col-sm-5">
                                                    <button class="ladda-button btn btn-sm btn-primary" type="submit">{{
                                                        $openedit?"Modifier":"Enregistrer" }}</button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="listAgent" class="tab-pane">
                            <div class="panel-body">
                                <div class="ibox-content" wire:loading.class='sk-loading'>
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>sexe</th>
                                                    <th>telephone</th>
                                                    <th>Email</th>
                                                    <th>Fonction</th>
                                                    <th>Niveau</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users as $i)
                                                <tr class="gradeX">
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $i->name }}</td>
                                                    <td>{{ $i->prenom }}</td>
                                                    <td>{{ $i->sexe }}</td>
                                                    <td>{{ $i->telephone }}</td>
                                                    <td>{{ $i->email }}</td>
                                                    <td>{{ $i->fonction }}</td>
                                                    <td>{{ $i->niveau}}</td>
                                                    <td class="text-center gradeX">
                                                        <span class="btn btn-primary btn-circle btn-outline">
                                                            <i class="fa fa-edit" wire:click="edite({{ $i->id}})"></i>
                                                        </span>
                                                        <small class="btn btn-danger btn-circle btn-outline">
                                                            <a href="tel" title="adresse" id='delete'><i
                                                                    class="fa fa-trash"></i></a>
                                                        </small>
                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>sexe</th>
                                                    <th>telephone</th>
                                                    <th>Email</th>
                                                    <th>Fonction</th>
                                                    <th>Niveau</th>
                                                    <th>Options</th>
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
    </div>
</div>