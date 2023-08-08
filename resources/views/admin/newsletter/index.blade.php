@extends('admin.layouts.main')

@section('title')
    Newsletter Subscriber
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2> Newsletter Subscriber
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <!-- search -->

                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('newsletter.index') }}" method="get">
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
                                    data-toggle="tab" href="#Users">
                                    Newsletter Subscriber
                                </a></li>
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        @csrf

                                        @php
                                            $route = route('newsletter.delete');
                                        @endphp

                                        <x-delete-button :user="$user" :route="$route" />

                                        <table class="table table-hover table-custom spacing8">
                                            <thead>
                                                <tr>
                                                    <x-check-box-th :user="$user" />

                                                    <th>Email </th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($informations as $value)
                                                    <tr>
                                                        <x-check-box-td :value="$value" :user="$user" />


                                                        <td>
                                                            {{ $value->email }}
                                                        </td>


                                                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>

                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </form>



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
