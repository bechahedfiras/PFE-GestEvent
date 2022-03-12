@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ asset('admin/users') }}">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Users</h6>
                                    <h2>{{ $detail['users'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ asset('orders') }}">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>...</h6>
                                   
                                </div>
                                <div class="icon">
                                    <i class="ik ik-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ asset('products') }}">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>...</h6>
                                    
                                </div>
                                <div class="icon">
                                    <i class="ik ik-box"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ asset('categories') }}">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>...</h6>
                                    
                                </div>
                                <div class="icon">
                                    <i class="ik ik-menu"></i>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
