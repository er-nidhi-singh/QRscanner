@extends('layouts.main') 
@section('title', 'Table Bootstrap')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

      <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">  
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-credit-card bg-blue"></i>
                        <div class="d-inline">
                            <h5>Master List</h5>
                            <!--<span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Master List</a>
                                <div class="text-right">
                                    <a  href="{{url('bulk-master')}}">
                                        <button type="button" class="btn btn-primary mr-2">{{ __('Bulk Upload')}}</button>
                                    </a>
                                </div>
                            </li>
                           
                            <!--<li class="breadcrumb-item active" aria-current="page">{{ __('Bootstrap Tables')}}</li>-->
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>Master List</h3>
                        <!--<span>use class <code>table</code> inside table element</span>-->
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Coupon No</th>
                                        <th>Product</th>
                                        <th>Lot No</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->coupon_no}}</td>
                                        <td>{{ $value->product}}</td>
                                        <td>{{ $value->lot_no}}</td>
                                        {{-- <td>
                                            <a  href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$key}}">Coordinates </a>
                                             <a href="{{ url('master-delete/' . $value->id) }}" class="btn btn-danger mt-2">Delete</a>
                                        </td> --}}

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

    <!-- push external js -->
    @push('script')  

        <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('js/tables.js') }}"></script>
    @endpush


@endsection
   