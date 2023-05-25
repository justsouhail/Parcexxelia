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
						<h5 class="user-name">Yuki Hayashi</h5>
						<h6 class="user-email">yuki@Maxwell.com</h6>
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
				<div class="row gutters" style="margin-top: 1rem;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Parametres systeme</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Nom">Nom</label>
							<input type="text" class="form-control" id="Nom" placeholder="Entrer nom">
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Prenom">Prenom</label>
							<input type="text" class="form-control" id="Prenom" placeholder="Entrer prenom">
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Societe">Societe</label>
							<input type="text" class="form-control" id="Societe" placeholder="Entrer Societe">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" id="eMail" placeholder="Enter email">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="mdp">Mot de passe</label>
							<input type="text" class="form-control" id="mdp" placeholder="Enter mdp number">
						</div>
					</div>
						<div class="row gutters" style="margin-top: 1rem;">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
							<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
				</div>



				<div class="row gutters" style="margin-top: 4rem;" >
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Accedez au Sauvegarde (Backup)</h6>
					</div>
                    <div class="cartes">
                        <a href="/admin/backup">
                        <div class="carte">
                            <div class="info-carte">
                                <span>Utilisateurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-conference-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Ordinateurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Mobile</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Imprimantes</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Moniteurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-workstation-22.png"/></span>

                            </div>
                        </div>
                        </a>
                    </div>
					
						
					</div>

                    <div class="row gutters" style="margin-top: 4rem;" >
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary"> Parametres Systemes </h6>
					</div>
                    <div class="cartess">
                        <a href="/admin/parametre">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Services</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Categories</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Marque</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Model</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Os</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Antivirus</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Logiciels</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="cartos">
                            <div class="info-carte">
                                <span>Post</span>
                            </div>
                            <div>
                            <span ><img src="/images/icons8-setting-23.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
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