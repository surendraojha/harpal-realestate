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
                        <form action="{{ route('boost-request.index') }}" method="get">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="input-group">

                                            <input type="text" class="form-control" name="keyword"
                                                value="{{ @$keyword }}" placeholder="Type AdId ,Name,email or phone  "
                                                autocomplete="off">

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
                            {{-- <li class="nav-item"><a class="nav-link @if (session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#addUser">Add {{$module}}
                            </a></li> --}}
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf


                                        @php
                                            $route = route('boost-request.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />
                                        <table class="table table-hover table-custom spacing8" id="myTable">
                                            <thead>
                                                <tr>
                                                    <x-check-box-th :user="$user" />

                                                    <th>Property Details</th>
                                                    <th>Contact Details</th>

                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($informations as $value)
                                                    @if ($value->status == 0)
                                                        @php
                                                            $style = 'grey';
                                                        @endphp
                                                    @else
                                                        @php
                                                            $style = 'green';
                                                        @endphp
                                                    @endif
                                                    <tr bgcolor="{{ $style }}">
                                                        <x-check-box-td :value="$value" :user="$user" />


                                                        <td>
                                                            <strong>Ad Id: </strong>
                                                            {{ $value->property->ad_id }} <br>
                                                            <strong>Title: </strong>
                                                            {{ $value->property->title }}

                                                        </td>
                                                        <td>
                                                            <Strong>Name:</Strong>
                                                            {{ $value->name }} <br>
                                                            <strong>Email:</strong>
                                                            {{ $value->email }} <br>

                                                            <Strong>Phone:</Strong>
                                                            {{ $value->phone }}
                                                        </td>



                                                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                                                        <td>
                                                            <a target="blank"
                                                                href="{{ route('boost-request.show', $value->id) }}">


                                                                @if ($value->status == 1)
                                                                    <span style="color: green">Approved</span>
                                                                @else
                                                                    <span style="color:red;">Pending</span>
                                                                @endif

                                                            </a>

                                                            <br>


                                                            <a href="{{ route('boost-request.edit', $value->id) }}"><i
                                                                    class="fa fa-eye"></i></a>

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

                            {{-- <div class="tab-pane @if (session()->get('errors'))  active show  @endif" id="addUser">
                            <div class="body mt-2">

                                {!! Form::open(['route' => 'boost-request.store', 'method' => 'post']) !!}

                                    @csrf
                                    @include('admin.boost-request.form')
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="{{route('boost-request.index')}}">
                                            Close
                                        </a>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('user::common.users.links') --}}
@endsection
