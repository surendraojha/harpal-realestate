@extends('admin.layouts.main')

@section('title')
     {{$module}}
@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>  {{$module}}</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search -->
            {{-- <div class="col-12">
                <div class="card">
                    <form action="{{route('category.index')}}" method="get">
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
            </div> --}}


            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link @if(!session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#Users">{{$module}} list
                            </a></li>
                        <li class="nav-item"><a class="nav-link @if(session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#addUser">Add {{$module}}
                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane  @if(!session()->get('errors')) active show @endif" id="Users">
                            <div class="table-responsive">
                                <form method="post">
                                    @csrf


                                        @php
                                            $route = route('testimonial.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />

                                    <table class="table table-hover table-custom spacing8" id="myTable">
                                        <thead>
                                            <tr>


                                                <x-check-box-th :user="$user"/>


                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Activity</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($informations as $index=>$value)

                                            <tr>


                                                <x-check-box-td :value="$value" :user="$user"/>


                                                <td>
                                                    <x-backend-page-number :index="$index"/>
                                                </td>

                                                <td>{{$value->name}}</td>
                                                <td>{{$value->activity}}</td>
                                                <td>{{$value->rating}}</td>

                                                <td>
                                                    @if($value->status==1)
                                                        Approved
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>
                                                <td>{{date('d M, Y',strtotime($value->created_at))}}</td>
                                                <td>
                                                    <a href="{{route('testimonial.edit',$value->id)}}"> <i
                                                            class="icon-pencil"></i> </a>
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

                        <div class="tab-pane @if(session()->get('errors'))  active show  @endif" id="addUser">
                            <div class="body mt-2">

                                {!! Form::open(['route' => 'testimonial.store', 'method' => 'post' ,'files'=>true]) !!}

                                    @csrf
                                    @include('admin.testimonial.form')
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="{{route('testimonial.index')}}">
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


@section('script')
     @php
        $id = 'message';
        $outputId='output';
    @endphp

<x-character-count :id="$id" :outputId="$outputId"/>
@endsection
