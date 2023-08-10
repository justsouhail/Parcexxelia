    @push('css')

    <link rel="stylesheet" href="/css/nav_sidebar.css">

     @endpush

     <style>
        
     </style>
<div class="navigation">
            <header>
                <!-- <h2  style="display: flex; align-items: center;">
                    <label style="vertical-align: middle;"  for="menu-toogle"> <span style="cursor: pointer;" style="margin-bottom: 6rem !important;"><img src="/images/icons8-menu-25.png" title="Profile"/></span></label> 
                    <span style="font-size: 18px; margin-bottom: 0.5rem; margin-left: 10px !important;" class="current-route"> <span>{{$route}}</span>
    
</span>


                </h2>  -->
     
                <div class="user-wrapper">
               
                <label style="vertical-align: middle;"  for="menu-toogle"> <span style="cursor: pointer;" style="margin-bottom: 6rem !important;"><img src="/images/icons8-menu-25.png" title="Profile"/></span></label>                
                   <div class="nav-item dropdown" style="margin-right: 80px !important ;">
                   <span style="font-size: 18px; margin-bottom: 0.5rem; margin-left: 10px !important;" class="current-route"> <span>{{$route}}</span>

  

                               </div>
                           
               </div>



                

                <div class="user-wrapper">
               
                <span style="margin-left: 10px; margin-right: 20px;" ><a href="/admin"><span><img src="/images/icons8-utilisateur-25.png" title="Profile"/></span></a></span>
                
                    <div class="nav-item dropdown" style="margin-right: 80px !important ;">
                                <id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        
 