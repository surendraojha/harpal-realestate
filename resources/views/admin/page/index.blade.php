@extends('admin.layouts.main')

@section('title')
    Pages
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                {{-- search --}}

                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('page.index') }}" method="get">
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
                                    data-toggle="tab" href="#Users">Pages
                                </a></li>
                            <li class="nav-item"><a class="nav-link @if (session()->get('errors')) active show @endif"
                                    data-toggle="tab" href="#addUser">Add Page

                                </a></li>
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf


                                        @php
                                            $route = route('page.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />

                                        <table class="table table-hover table-custom spacing8">
                                            <thead>
                                                <tr>
                                                    <x-check-box-th :user="$user" />

                                                    <th>Photo</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($informations as $value)
                                                    <tr>
                                                        <x-check-box-td :value="$value" :user="$user" />


                                                        <td>
                                                            <img height="35px" width="35px"
                                                                src="{{ asset('uploads/' . $value->photo) }}"
                                                                alt="No Photo">
                                                        </td>
                                                        <td>
                                                            {{ $value->title }}
                                                        </td>



                                                        <td>
                                                            @if ($value->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>


                                                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                                                        <td>

                                                            <a href="{{ route('page.edit', $value->id) }}"> <i
                                                                    class="icon-pencil"></i> </a>
                                                            </a>

                                                            <a target="_blank"
                                                                href="{{ route('front.page', $value->slug) }}"> <i
                                                                    class="fa fa-eye"></i> </a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </form>

                                    {{-- {!! $informations->render() !!} --}}
                                </div>
                            </div>

                            {{-- create form --}}


                            <div class="tab-pane @if (session()->get('errors')) active show @endif" id="addUser">
                                <div class="body mt-2">

                                    <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @include('admin.page.form')
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <a class="btn btn-secondary" href="{{ route('page.index') }}">
                                                Close
                                            </a>
                                        </div>
                                    </form>
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
