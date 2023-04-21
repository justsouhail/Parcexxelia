<div class="navigation">
            <header>
                <h2  style="display: flex; align-items: center;">
                    <label style="vertical-align: middle;"  for="menu-toogle"> <span style="cursor: pointer;"><ion-icon name="menu-outline" id="menu"></ion-icon></span></label> 
                    <span id="tb"> Tableau de bord</span>
 
                </h2>

                 <div class="bar-recherche" style="margin-top: 10px;">
                    <span><ion-icon name="search-outline"></ion-icon></span>
                     <input type="search" placeholder="Chercher Ici">
                 </div>

                <div class="user-wrapper">

                    <div class="nav-item dropdown" style="margin-right: 80px !important ;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->Nom }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                </div>
                            
                </div>

            </header>

            </div>