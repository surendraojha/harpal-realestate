<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                {!! Form::text('name',null,['placeholder' => 'Full Name',
                'class'=>'form-control']) !!}


            </div>
        </div>
    </div>



    {{-- Email --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                {!! Form::text('email',null,['placeholder' => 'Email',
                'class'=>'form-control']) !!}


            </div>
        </div>
    </div>


    @if(! @$information)
    {{-- Password --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                {!! Form::password('password',['placeholder' => 'Password *',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    {{-- password confirmation --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Confirm Password</span>
                </div>
                {!! Form::password('password_confirmation',['placeholder' => 'Confirm Password',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    @endif

    {{-- status --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Role</span>
                </div>

                @php
                    $roles = [
                        'user'=>'user',
                        'superadmin'=>'superadmin',
                        'editor'=>'editor'
                    ]
                @endphp
                {!! Form::select('role',$roles,null,['placeholder' => 'Select Role',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>


      {{-- status --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>

                @php
                    $status = [
                        '1'=>'Active',
                        '0'=>'InActive'
                    ]
                @endphp
                {!! Form::select('status',$status,null,['placeholder' => 'Select Role',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</div>
