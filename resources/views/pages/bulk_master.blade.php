@extends('layouts.main') 
@section('title', 'Form Components')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add QRScanner</h5>
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
                            <li class="breadcrumb-item"><a href="#">{{ __('Forms')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Components')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Excel Import</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" action="{{ url('master_import') }}" method="post" enctype="multipart/form-data">
                            @csrf                            
                            <div class="form-group">
                                <label for="exampleInputUsername1">Excel import</label>
                                <input type="file"  name="excel"class="form-control" id="exampleInputUsername1" placeholder="Chemical Name">
                            </div>
          
                            <button type="submit" class="btn btn-primary mr-2" name="submit">{{ __('Submit')}}</button>
                            <!--<button class="btn btn-light">{{ __('Cancel')}}</button>-->
                          </form>
                    </div>
                </div>
            </div>

           
        </div>

    </div>
    
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('js/form-components.js') }}"></script>
    @endpush
@endsection