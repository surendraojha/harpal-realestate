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
                        <form action="{{ route('user.index') }}" method="get">
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
                            <li class="nav-item"><a class="nav-link @if (session()->get('errors')) active show @endif"
                                    data-toggle="tab" href="#addUser">Add {{ $module }}
                                </a></li>
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  @if (!session()->get('errors')) active show @endif" id="Users">
                                <div class="table-responsive">
                                    {{-- <form method="post">
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"
                                        formaction="{{ route('user.delete') }}" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                    <table class="table table-hover table-custom spacing8" id="myTable">
                                        <thead>
                                            <tr>
                                                {{-- <th>
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" id="check_all">
                                                        <span>#</span>
                                                    </label>
                                                </th> --}}
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Requested Role</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $status = [
                                                    '0' => 'Pending',
                                                    '1' => 'Approved',
                                                ];
                                            @endphp

                                            @foreach ($informations as $value)
                                                <tr>


                                                    <form action="{{ route('user-upgrade.update', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- <td>

                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick checkitem" type="checkbox"
                                                            name="id[]" value="{{ $value->id }}">
                                                        <span></span>
                                                    </label>
                                                </td> --}}

                                                        <td>{{ $value->user->name }}</td>
                                                        <td>{{ $value->user->email }}</td>

                                                        <td>{{ $value->previous_role }}</td>
                                                        <td>{{ $value->role }}</td>
                                                        <td>


                                                            <select name="status" class="form-control">
                                                                @foreach ($status as $key => $v)
                                                                    <option value="{{ $key }}"
                                                                        @if ($value->status == $key) selected @endif>
                                                                        {{ $v }}</option>
                                                                @endforeach

                                                            </select>
                                                           
                                                        </td>
                                                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>

                                                        <td>
                                                            <button type="submit">Change</button>
                                                        </td>
                                                    </form>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>

                                    <x-pagination :informations="$informations" />
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
