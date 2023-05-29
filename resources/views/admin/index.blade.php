@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/admin.css">
     @endpush
     <input type="checkbox" id="menu-toogle">
        <!-- sidebar -->

        @include('sidebar')
            <!-- navbar -->
            @include('nav')
            <!-- main -->
            
            <div class="main-content">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="users" style="min-height: 500px;" >

            <div class="container">
<div class="row gutters"  style="margin-top: 1rem;">
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="account-settings">
					<div class="user-profile">
						<div class="user-avatar">
							<img src="/images/favicon-exxelia.png" alt="Maxwell Admin">
						</div>
						<h5 class="user-name">{{$user->Prenom}} {{$user->Nom}}  </h5>
						<h6 class="user-email">{{$user->email}}</h6>
					</div>
					<div class="about">
						<h5 class="mb-2 text-primary">Espace admin</h5>
						<p>Modifiez vos informations, modfiez des parameters système ou récupérez des informations de sauvegarde. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
            <form action="/admin/update" method="post">
                @csrf
				<div class="row gutters" style="margin-top: 1rem;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Parametres systeme</h6>
					</div>

                    
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Nom">Nom</label>
							<input type="text" class="form-control" id="Nom" name="Nom" placeholder="Entrer nom" value="{{$user->Nom}}">
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Prenom">Prenom</label>
							<input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Entrer prenom" value="{{$user->Prenom}}">
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Societe">Societe</label>
							<input type="text" class="form-control" id="Societe" name="Branche_Societe" placeholder="Entrer Societe" value="{{$user->Branche_Societe}}">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email" value="{{$user->email}}">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="mdp">Mot de passe</label>
							<input type="text" class="form-control" id="mdp" name="mdp" placeholder="Enter Mot de passe" >
						</div>
					</div>
						<div class="row gutters" style="margin-top: 1rem;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
                            <button type="submit" id="submit" class="btn btn-primary" style="background-color:  #0A5E4F; border: 0;">Modifier</button>
						</div>
					</div>
                    
				</div>
				</div>
                </form>

<hr style="background: linear-gradient(to left, transparent, #0071DC 50%, transparent), linear-gradient(to right, transparent, #0071DC 50%, transparent); height: 2px; border: none; margin-top: 4rem;">

				<div class="row gutters" style="margin-top: 4rem;" >
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Accedez au Sauvegarde (Backup)</h6>
					</div>
                    <div class="cartes">
                    <a href="/admin/backup?category=Utilisateurs">
                        <div class="carte">
                            <div class="info-carte">
                                <span>Utilisateurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-conference-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/backup?category=Ordinateurs">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Ordinateurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/backup?category=Mobile">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Mobile</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/backup?category=Imprimantes">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Imprimantes</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/backup?category=Moniteurs">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Moniteurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/backup?category=tel_fixes">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Telephone fixe</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                    </div>
					
						
					</div>
                    <hr style="background: linear-gradient(to left, transparent, #0071DC 50%, transparent), linear-gradient(to right, transparent, #0071DC 50%, transparent); height: 2px; border: none; margin-top: 4rem;">

                    <div class="row gutters" style="margin-top: 4rem;" >
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary"> Parametres Systemes </h6>
					</div>
                    <div class="cartess">
                        <a href="/admin/parametre?Param=Services">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Services</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Categories">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Categories</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Marque">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Marque</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Os">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Os</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Antivirus">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Antivirus</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Logiciel">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Logiciels</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Post">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Post</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/admin/parametre?Param=Role">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Role</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                       
                    </div>

                    </div>
			
			
			</div>
		</div>
	</div>
    
</div>

</div>


            
   @push('scripts')
   

        @endpush
        </div>
    </div>
    @endsection