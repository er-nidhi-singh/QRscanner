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
                            <h5>User Registration List</h5>
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
                                <a href="#">User Registration List</a>
                                <div class="text-right">
                                    <a  href="{{url('register')}}">
                                        <button type="button" class="btn btn-primary mr-2">{{ __('Add Register')}}</button>
                                    </a>
                                </div>
                            </li>
                            
                        </ol>
                    </nav>
                    
                </div>
                
            </div>
        </div>
        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-block">
                        <h3>User Registration List</h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Vendor Id</th>
                                        <th>Pincode</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key => $value)

                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->vendor_id }}</td>
                                        <td>{{ $value->pincode }}</td>
                                        {{-- <td></td> --}}
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
