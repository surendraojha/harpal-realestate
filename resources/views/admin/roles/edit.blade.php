@extends('admin.layouts.main')
@section('title')
Edit Role
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit Role</h2>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit
                                Role</a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane  active show" id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('role.update',$role->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Role Name</span>
                                                    </div>
                                                    <input type="text" name="name" class="form-control show-tick @error('name')
                                            is-invalid @enderror" placeholder="Role Name *"
                                                        value="{{old('name',$role->name)}}" required="">
                                                </div>

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

                                        Update Permissions
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
                                                                    name="permission_id[]" value="{{$v->id}}"
                                                                    @if(in_array($v->id,$role_permission))
                                                                checked
                                                                @endif
                                                                >
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
                                                @php
                                                // dd($settings)
                                                @endphp
                                                @foreach($settings as $s)
                                                @if($s->link=='user/settings')
                                                <td>
                                                    <label class="fancy-checkbox">

                                                        <input class="checkbox-tick" type="checkbox" name="settings"
                                                            value="{{$s->id}}" @if(in_array($s->id,$role_permission))
                                                        checked
                                                        @endif
                                                        >
                                                        <span></span>

                                                    </label>

                                                    @endif
                                                </td>
                                                {{-- put post --}}
                                                @if($loop->last)
                                                    <input type="hidden" name="post_settings" value="{{ $s->id }}">
                                                @endif

                                                @endforeach
                                            </table>
                                        </div>

                                        <input type="hidden" name="id" value="{{$role->id}}">

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update</button>

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
