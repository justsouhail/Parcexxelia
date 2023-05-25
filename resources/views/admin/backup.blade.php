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
                    <h5 class="mb-0">New customers</h5>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="small text-uppercase bg-body text-muted">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Payment method</th>
                                <th>Created Date</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div style="margin-top: 5px;">
                                            <div class="h6 mb-0 lh-1">Mark Voldov</div>
                                        </div>
                                    </div>
                                </td>
                                <td>mvoges@email.com</td>
                                <td> <span class="d-inline-block align-middle">Russia</span></td>
                                <td><span>****6231</span></td>
                                <td>21 Sep, 2021</td>
                            </tr>
                           
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