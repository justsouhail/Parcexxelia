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
<div class="logo" >
<h1>
    <div style="display: flex; align-items: center;">
        <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/favicon-exxelia.png'))) }}" alt="" style="width: 39px; height: 39px;" id="img-logo"></span>
        <span style="color: black;">ParcInfo</span> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;    <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/Exxelia.png'))) }}" alt="" style="width: 120px;"></span>
    </div>

</h1>

            </div>

  <div style="text-align: center; margin-top: 0;">
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Decharge</u></h2>
  </div>
  <div>

  <p class="decharge">
  <p>
    Je soussigné, <strong>{{$user->Prenom}}&nbsp;{{$user->Nom}}</strong>, responsable informatique de <strong>{{$user->Branche_Societe}}</strong>,
    déclare par la présente que j'ai remis le matériel informatique de type <strong>{{$tag}}</strong> à
    <strong>{{$employe->Prenom}}&nbsp;{{$employe->Nom}}</strong>:
</p>
<br>
<div style="font-size: 17px !important;">
    <ul>
        <li>Marque et modèle de {{$tag}}:
            <strong>{{ isset($data2->Marque->Marque_Nom) ? $data2->Marque->Marque_Nom : '' }}
                {{ isset($data2->Model->Model_Nom) ? $data2->Model->Model_Nom : '' }}</strong>
        </li>
        <li>Numéro de série: <strong>{{ isset($data2->N°_de_serie) ? $data2->N°_de_serie : '' }}</strong></li>
        <li>Service: <strong>{{ isset($employe->Service->Nom) ? $employe->Service->Nom : '' }}</strong></li>
        @if (isset($data2->Status))
            <li>Status: <strong>{{$data2->Status}}</strong></li>
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