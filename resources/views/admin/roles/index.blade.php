@extends('admin.layouts.main')
@section('title')
Roles
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Roles</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!-- for search -->
            {{-- @include('user::search.role-search') --}}
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link @if(!session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#Users">Roles</a></li>
                        <li class="nav-item"><a class="nav-link @if(session()->get('errors')) active show @endif"
                                data-toggle="tab" href="#addUser">Add Roles</a></li>
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane @if(!session()->get('errors')) active show @endif" id="Users">
                            <!-- display data -->
                            <div class="table-responsive">
                                <form method="post">
                                    @csrf
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Do you really want to delete this role?')"
                                        formaction="{{ route('role.delete') }}" type="submit">
                                         <i class="fa fa-trash"></i>
                                    </button>
                                    <table class="table table-hover table-custom spacing8">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" id="check_all">
                                                        <span>#</span>
                                                    </label>
                                                </th>
                                                <th class="w60">Name</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>

                                                <th>Created Date</th>
                                                <th class="w100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($informations as $value)
                                            <tr>
                                                <td>

                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick checkitem" type="checkbox"
                                                            name="id[]" value="{{ $value->id }}">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">{{$value->name}}</h6>
                                                </td>

                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td>

                                                    {{date('d M, Y',strtotime($value->created_at))}}

                                                </td>
                                                <td>





                                                    <a href="{{route('role.edit',$value->id)}}">
                                                        <i class="icon-pencil"></i>

                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </form>

                                {!! $informations->render() !!}

                            </div>
                        </div>
                        <div class="tab-pane @if(session()->get('errors')) active show @endif" id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('role.store')}}" method="post">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Role Name</span>
                                                    </div>
                                                    <input type="text" name="name" class="form-control show-tick @error('name')
                                            is-invalid @enderror" placeholder="Role Name *" required=""
                                                        value="{{old('name')}}">


                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <hr>
                                            Assign Module Permissions
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Add</th>
                                                            <th>View</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        @foreach($permissions as $value)
                                                        <tr>

                                                            <th>
                                                                {{$value->module}}
                                                            </th>

                                                            {{-- permissions --}}

                                                            @php
                                                            $permission =
                                                            \App\Models\Permission::where('module',$value->module)->get();
                                                            @endphp

                                                            @foreach ($permission as $v)
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox"
                                                                        name="permission_id[]" value="{{$v->id}}">
                                                                    <span></span>
                                                                </label>
                                                            </td>

                                                            @endforeach



                                                        </tr>

                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>

                                            <hr>
                                            Assign Other Permissions
                                            <hr>

                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <td>Company Profile</td>

                                                    @foreach($settings as $s)
                                                    @if($s->link=='user/settings')
                                                    <td>
                                                        <label class="fancy-checkbox">

                                                            <input class="checkbox-tick" type="checkbox" name="settings"
                                                                value="{{$s->id}}">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    @endif

                                                    {{-- put post --}}
                                                    @if($loop->last)
                                                    <input type="hidden" name="post_settings" value="{{ $s->id }}">
                                                    @endif

                                                    @endforeach

                                                </table>




                                            </div>

                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <a href="{{route('role.index')}}" class="btn btn-secondary">
                                                CLOSE
                                            </a>
                                        </div>
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


@endsection
