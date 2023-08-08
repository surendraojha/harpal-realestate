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
                        <h2> {{ $module }}</h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <!-- search -->
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('shift-home.index') }}" method="get">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="input-group">
                                            @include('admin.common.search')

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">

                                        <button type="submit" class="btn btn-sm btn-primary btn-block">Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link @if (!session()->get('errors')) active show @endif"
                                    data-toggle="tab" href="#Users">{{ $module }} list
                                </a></li>

                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf



                                        @php
                                            $route = route('shift-home.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />
                                        <table class="table table-hover table-custom spacing8" id="myTable">
                                            <thead>
                                                <tr>
                                                    <x-check-box-th :user="$user" />

                                                    <th>Type</th>
                                                    <th> Location</th>
                                                    <th>Contact</th>
                                                    <th>Schedule Date/Time</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($informations as $value)
                                                    <tr>
                                                        <x-check-box-td :value="$value" :user="$user" />

                                                        <td>{{ $value->type }}</td>
                                                        <td>

                                                            <strong>Pickup Location: </strong>
                                                            {{ $value->pick_up_location }} <br>
                                                            <strong>DropOff Location: </strong>
                                                            {{ $value->drop_off_location }}
                                                        </td>





                                                        <td>


                                                            <span>Phone: {{ $value->phone }}</span>
                                                            <span>Email: {{$value->email}}</span>
                                                        </td>




                                                        <td>


                                                            @if ($value->when != 'Instant Booking')
                                                                {{ date('h:i A', strtotime($value->schedule_time)) }}

                                                                {{ date('d M, Y', strtotime($value->schedule_date)) }}
                                                        </td>
                                                    @else
                                                        Instant Booking
                                                @endif



                                                <td>{{ date('h:i:s a d M, Y', strtotime($value->created_at)) }}</td>


                                                <td>
                                                    @if ($value->read == 0)
                                                        <a class="btn btn-success"
                                                            href="{{ route('shift-home.read', $value->id) }}">Mark As
                                                            Done
                                                            <i class="fa fa-times"></i></a>
                                                    @else
                                                        <a class="btn btn-success"
                                                            href="{{ route('shift-home.read', $value->id) }}">
                                                            <span>Done <i class="fa fa-check"></i> </span>
                                                        </a>
                                                    @endif


                                                    {{-- show --}}
                                                    <br>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('shift-home.show', $value->id) }}"
                                                        target="_blank">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </form>

                                    <x-pagination :informations="$informations" />

                                </div>
                            </div>

                            {{-- create form --}}

                            <div class="tab-pane @if (session()->get('errors')) active show @endif" id="addUser">
                                <div class="body mt-2">

                                    {!! Form::open(['route' => 'home-page-property.store', 'method' => 'post']) !!}

                                    @csrf
                                    {{-- @include('admin.home-page-property.form') --}}
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="{{ route('home-page-property.index') }}">
                                            Close
                                        </a>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('user::common.users.links') --}}
@endsection
