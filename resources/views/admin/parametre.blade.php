@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/parametre.css">

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
            <div class="con" style="min-height: 500px;" >

   <div class="container_form">
   
    <div class="container">
      <form action="" method="POST">
      <h3  style="margin-left: 50px;">codewithFaraz</h3>
      <div id="formfield">
        <input type="text" name="text" class="text" size="50" placeholder="Name" required>
       
      </div>
      <input name="submit" type="Submit" value="Submit">
    </form>
      <div class="controls">
        <button class="add" onclick="add()"><i class="fa fa-plus"></i>Add</button>
      </div>
    </div>

   </div>
            </div>


            
   @push('scripts')
   
   <script src="{{ asset('/js/parametre.js')}}"></script>

        @endpush
        </div>
   
    @endsection