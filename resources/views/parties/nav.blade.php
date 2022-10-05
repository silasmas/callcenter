<div id="right-sidebar" class="animated">
    <div class="sidebar-container">

        <ul class="nav nav-tabs navs-3">

            <li class="active"><a data-toggle="tab" href="#tab-1">
                    SCRIPT
                </a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">
                    Historique
                </a></li>
            <li><a data-toggle="tab" href="#tab-2">
                    Info
                </a></li>
        </ul>

        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="sidebar-title">
                    <h3> <i class="fa fa-comments-o"></i>Ceci est votre scripte</h3>
                    <small><i class="fa fa-tim"></i> Bonjour Mme (Mr) je suis <b>{{ Auth::user()->name }}</b> de la
                        BGFI</small>
                </div>
                <ul class="sidebar-list">

                    @livewire('view-script')


                </ul>


            </div>

            <div id="tab-2" class="tab-pane">
                <div class="sidebar-title">
                    <h3> <i class="fa fa-info-circle"></i> Info sur l'adresse des agence BGFI</h3>
                    {{-- <small><i class="fa fa-info"></i></small> --}}
                </div>
                <ul class="sidebar-list">
                    <li>
                        <a href="#">
                            <h4>1/ KINSHASA :</h4>
                            <span>
                    <li> KINTAMBO : SHALOOM MANGINDULA</li>
                    </span>
                    <span>
                        <li> CENTRE D AFFAIRE : SANCHO EKAYE KAZADI</li>
                    </span>
                    <span>
                        <li> VENUS : JERRY MONSHENGWO ALILO</li>
                    </span>
                    <span>
                        <li> ROYAL (SIEGE) : ISAAC IBUABU</li>
                    </span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                            <h4>2/ LUBUMBASHI : JEAN FELIX MULUMBA</h4>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h4>3/ BOMA : GRACE KIALA</h4>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h4>4/ MATADI : BLANCHE MASSANGA </h4>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h4>5/ MBUJI-MAYI : MICHAEL TCHAMANI</h4>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h4>6/ BUNIA :SAMUEL LIRIPA SAFARI</h4>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h4>7/ KOLOWEZI :WILLY BUKASA</h4>

                        </a>
                    </li>
                </ul>



            </div>

            <div id="tab-3" class="tab-pane">

                @livewire('journal')

            </div>
        </div>

    </div>



</div>