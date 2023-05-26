@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/backup.css">

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

<div class="container">
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="overflow-hidden card table-nowrap table-card" id="tt">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $tag}}</h5>
                </div>
                <div class="table-responsive">
                <table class="table mb-0">
    <thead class="small text-uppercase bg-body text-muted">
        <tr>
            <th></th> <!-- Placeholder for the action column -->
            @foreach($columns as $cl)
                <th>{{$cl}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($data as $dt)
            <tr class="align-middle">
                <td>
                    <a href="/admin/restore/{{$dt->id}}?category={{$tag}}">
                        <span><img src="/images/icons8-data-backup-22.png"/></span>
                    </a>
                </td>
                @foreach($columns as $cl)
                    <td>{{$dt->$cl}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>

</div>


            
   @push('scripts')
   

        @endpush
        </div>
   
    @endsection