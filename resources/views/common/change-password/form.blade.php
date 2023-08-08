<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Change Password
                    </h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab"
                                href="#addUser">Change Password
                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                {!! Form::open(['route' => ['change.password'], 'method' => 'post']) !!}

                                @csrf

                                <div class="form-group">

                                    {{-- Old password --}}


                                    {!! Form::label('current_password', 'Current Password') !!}

                                    <input type="password" name="current_password"
                                        class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}    @if(Session::has('error')) is-invalid @endif
                                        ">



                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">

                                            {{ $message }}
                                        </span>
                                        <br>
                                    @enderror

                                </div>

                                {{-- New Password --}}
                                <div class="form-group">
                                    {!! Form::label('password', 'New Password') !!}


                                    <input type="password" name="password"
                                        class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">

                                            {{ $message }}
                                        </span>
                                        <br>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'Confirm Password') !!}

                                    <input type="password" name="password_confirmation"
                                        class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">

                                            {{ $message }}
                                        </span>
                                        <br>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Change Password
                                    </button>

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
