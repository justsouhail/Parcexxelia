
<div class="sidebar">
           <div class="logo">
              <h1 ><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 50px; height: 50px;" id="img-logo" ></span> <span>ParcInfo</span></h1>
            </div>
            <div class="sidebar_menu">
                <ul>
                    <a href="/" class=""><li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><img src="/images/icons8-home-22.png" title="Acceuil"/></span> <span>Acceuil </span></li></a>
                    <a href="/Employes" class=""> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><img src="/images/icons8-users-22.png" title="Acceuil"/></span> <span>Employés</span> </li></a>
                           
                  <div class="contenaire">  
                  <button id="dropdown">
  <span>
    <img src="/images/icons8-usb-connector-25.png" title="Acceuil"/>
  </span>
  <span class="btnbtnbtn">Materiel</span>
  <span id="hide">
    <img src="/images/icons8-sort-down-22.png" title="Acceuil"/>
  </span>
</button>
 
                    <div class="dropdown-container">
                                        <a href="/Materiel" class="side_link">Tout</a>
                                        <a href="/Materiel/ordinateurs" class="side_link">Ordinateur</a>
                                        <a href="/Materiel/imprimante" class="side_link">Imprimante</a>
                                <a href="/Materiel/Reseau" class="side_link">Reseau</a>
                                        <a href="/Materiel/Tel_fixe" class="side_link">Telephone_Fixe</a>
                                        <a href="/Materiel/Moniteur" class="side_link">Mobile</a>
                                        <a href="/Materiel/ticket" class="side_link">Distributeur</a>
                                        <a href="/Materiel/Moniteur" class="side_link">Moniteur</a>

                             </div></div>
                    <a href="/Attribution"> <li   style="display: flex; align-items: center;"><span style="vertical-align: middle;"><img src="/images/icons8-ball-point-pen-22.png" title="Acceuil"/></span><span>Affectation  </span></li></a>
                    <a href="/history"> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><img src="/images/icons8-history-22.png" title="Acceuil"/></span><span>Historique </span></li></a>
                    <a href="/admin/verify"> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><img src="/images/icons8-microsoft-admin-22.png" title="Acceuil"/></span> <span>Espace Admin</span></li></a>
                    
                </ul>
            </div>           
       </div>

            
       @push('scripts')
        
           <script src="{{ asset('/js/dropdown.js')}}"></script>
     
                 @endpush