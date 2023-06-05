@push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
     @endpush
<div class="navigation">
            <header>
                <h2  style="display: flex; align-items: center;">
                    <label style="vertical-align: middle; "  for="menu-toogle"> <span style="cursor: pointer;"><ion-icon name="menu-outline" id="menu"></ion-icon></span></label> 
                    <span style="font-size: 18px; margin-bottom: 0.7rem; margin-left: 10px;" class="current-route"> <span>{{$route}}</span>
    
</span>


                </h2> 
     
                



                

                <div class="user-wrapper">
               
                <span ><a href="/"><span><img src="/images/icons8-home-22.png" title="Acceuil"/></span></a></span>
                <span style="margin-left: 10px;" ><a href="/admin"><span><img src="/images/icons8-utilisateur-25.png" title="Profile"/></span></a></span>
                
                    <div class="nav-item dropdown" style="margin-right: 80px !important ;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->Nom }}  {{ Auth::user()->Prenom }}
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
        
 