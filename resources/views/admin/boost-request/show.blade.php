@extends('admin.layouts.main')

@section('title')
    {{ $module }}
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>{{ $module }}</h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">




                <div class="col-lg-12">
                    <div class="card">

                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf

                                        <table class="table table-hover table-custom spacing8" id="myTable">

                                            <tbody>




                                            @if(@$information->property)
                                                <tr>
                                                    <th>AdID</th>
                                                    <td>

                                                    <a target="_blank" href="{{route('property.detail',$information->property->slug)}}">
                                                        {{@$information->property->ad_id}}
                                                    </a>
                                                    </td>

                                                </tr>
                                            @endif
                                                @php
                                                    $deposit_slip = public_path() . '/uploads/' . $information->deposit_slip;
                                                @endphp


                                                <tr>
                                                    <th>Deposit Slip</th>
                                                    <td>
                                                        @if (file_exists($deposit_slip) && $information->deposit_slip)
                                                            <a target="_blank" href="{{ asset('uploads/' . $information->deposit_slip) }}">Show
                                                                Slip</a>
                                                        @else
                                                            Not Available
                                                        @endif
                                                    </td>
                                                </tr>





                                                <tr>
                                                    <th>Name</th>

                                                    <td>

                                                        {{ $information->name }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th>Email</th>

                                                    <td>

                                                        {{ $information->email }}
                                                    </td>
                                                </tr>







                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $information->phone }}</td>

                                                </tr>


                                                <tr>
                                                    <th>Message</th>
                                                    <td>
                                                        {!! $information->message !!}
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <th>Subscription</th>
                                                    <td>{{ $information->subscription->title }}</td>

                                                </tr>


                                                <tr>

                                                    <th>Created At</th>
                                                    <td>{{ date('h:i:s a d M, Y', strtotime($information->created_at)) }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Action</th>
                                                    <td>


                                                             <a href="{{route('boost-request.show',$information->id)}}">


                                                            @if($information->status==1)

                                                            <span style="color: green">Approved</span>

                                                            @else
                                                            <span style="color:red;"
                                                            >Pending</span>

                                                            @endif

                                                        </a>


                                                        {{-- show more details --}}


                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>


                                </div>
                            </div>

                            {{-- create form --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('user::common.users.links') --}}
@endsection
