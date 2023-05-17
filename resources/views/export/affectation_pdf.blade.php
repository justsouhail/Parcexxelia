@extends('layouts.app')


    @section('content')
    <link rel="stylesheet" href="/css/nav_sidebar.css">

    @push('css')
    <style>
/* .logo{
    color: white;
    height: 90px;
    padding: 1.3rem 1rem 9rem 2rem;

} */
.decharge {
        font-family: Arial, sans-serif;
        font-size: 18px;
        line-height: 2;
        margin-bottom: 20px;
        text-align: justify;
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .decharge strong {
        font-weight: bold;
    }

    .decharge br {
        margin-bottom: 10px;
    }

    .decharge .signature {
        margin-top: 30px;
    }
</style>
   


     @endpush
     <body>

<div style="display: flex; justify-content: space-between; align-items: center;">
<div class="logo">
              <h1>
                <span ><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/favicon-exxelia.png'))) }}" alt="" style="width: 39px; height: 39px; " id="img-logo" ></span>
                 <span style="color: black; ">ParcInfo &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <span style="font-size: 1.4rem;">EXXELIA MAROC  </span> 
            </h1>
            </div>

  <div style="text-align: center; margin-top: 0;">
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Decharge</u></h2>
  </div>
  <div>

  <p class="decharge">
            Je soussigné,<strong> {{$user->Prenom}}&nbsp;{{$user->Nom}}</strong>, responsable informatique de <strong>{{$user->Societe}}</strong>, déclare par la présente que j'ai remis le materiel informatique suivant à <strong>{{$employe->Nom}}&nbsp;{{$employe->Nom}}</strong>  :  </p>
<br>
            <div style="font-size: 17px !important; ">
            <ul>
                <li>  Marque et modèle de l'ordinateur : <strong>{{$ordinateur->Marque->Marque_Nom}}&nbsp; {{$ordinateur->Model->Model_Nom}}</strong> </li>
                <li>Numéro de série : <strong>{{$ordinateur->N°_de_serie}} </strong> </li>
                <li> Type : <strong>{{$ordinateur->Type->Type_Nom}}</strong> </li>
                <li>RAM  : <strong>{{$ordinateur->RAM}}&nbsp;(Go) &nbsp;</strong></li>
                <li> Stockage : <strong>{{$ordinateur->Stockage}}&nbsp;(Go)</strong> </li>
                @if(isset($ordinateur->Status))
                    <li>Status:<strong> {{$ordinateur->Status}}</strong></li>
                @else
                    <li>[]</li>
                @endif


            </ul>
            </div>

           <p  class="decharge"> L'employé susmentionné reconnaît avoir reçu l'ordinateur en bon état de fonctionnement et s'engage à en faire un usage approprié conformément aux politiques et aux règles de sécurité de l'entreprise. <br>

L'employé est responsable de la protection de l'ordinateur contre les dommages, le vol ou toute utilisation abusive. En cas de perte, de vol ou de tout dommage causé à l'ordinateur, l'employé doit en informer immédiatement le service informatique. <br>

En signant ci-dessous, l'employé confirme avoir reçu l'ordinateur susmentionné et accepte les termes et conditions de cette décharge. <br></p>
<br>
<br><br>
<div style="padding-left: 20px;"> <strong>Le {{ now()->format('Y-m-d H:i:s') }}</strong>
</div><br><br>

&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <strong>Signature </strong> 

</p>

  </div>
  

</body>
    @endsection