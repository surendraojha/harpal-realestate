<div class="row clearfix">


    {{-- Meta Title --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Title</span>
                </div>
                {!! Form::text('meta_title',null,['placeholder' => 'Meta Title',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    {{-- Meta Keyword --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Keyword</span>
                </div>
                {!! Form::text('meta_keyword',null,['placeholder' => 'Meta Keyword',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>


    {{-- Meta module --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Module</span>
                </div>

                @if(@$information)
                <x-module-list :information="$information"/>

                @else
                <x-module-list/>

                @endif
            </div>
        </div>
    </div>

    {{-- Meta Description --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Meta Description</span>
                </div>
                {!! Form::textarea('meta_description',null,['placeholder' => 'Meta Description',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>


    {{-- Meta Photo --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo',['class'=>'form-control',"accept"=>"image/*"]) !!}
            </div>
        </div>

        @if(@$information)
        <div class="form-group">
            <img height="300px" src="{{asset('uploads/'.@$information->photo)}}" alt="">
        </div>
        @endif
    </div>

</div>
