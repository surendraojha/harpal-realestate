@extends('admin.layouts.main')
@section('title')
Dashboard
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Dashboard</h1>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">My Page</li>
                        </ol>
                    </nav> --}}
                </div>
                {{-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                </div> --}}
            </div>
        </div>

        <div class="row clearfix">


             {{-- categories --}}
             <div class="col-lg-3 col-md-6">
                <a href="#">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Properties</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$rental_properties }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>



            {{-- categories --}}
            <div class="col-lg-3 col-md-6">
                <a href="{{route('boost-request.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-rocket" aria-hidden="true"></i>



                                        </div>

                                <div class="ml-4">
                                    <span>Boost Request</span>
                                    <h4 class="mb-0 font-weight-bold"> {{ @$boost_request }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>


            <div class="col-lg-3 col-md-6">
                <a href="{{route('contact-us.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Find Me Room</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$find_me_room }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>



            <div class="col-lg-3 col-md-6">
                <a href="{{route('faq.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>FAQs</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$faqs }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="{{route('shift-home.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Shift Homes</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$shift_homes }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="{{route('user.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Users</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$users }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="{{route('advertisement.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Advertisements</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$advertisement }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="{{route('support-forum.index')}}">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                <i class="fa fa-comment" aria-hidden="true"></i>

                                </div>

                                <div class="ml-4">
                                    <span>Forum</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$forum }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-3 col-md-6">
                <a href="#">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Newsletter Subscribers</span>
                                    <h4 class="mb-0 font-weight-medium"> {{ @$news_letter_subscribers }}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5">
                        <thead>
                            <tr>
                                {{-- <th style="width: 20px;">#</th> --}}
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Created At</th>
                                {{-- <th style="width: 50px;">Amount</th>
                                <th style="width: 50px;">Status</th> --}}

                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest_users as $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->role}}</td>
                                <td>{{date('d M, Y',strtotime($value->created_at))}}</td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
            </div>
        </div>

    </div>
</div>
@endsection

