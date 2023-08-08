
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                {!! Form::text('label',null,['placeholder' => 'Title',
                'class'=>'form-control']) !!}


            </div>
        </div>




        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Link</span>
                </div>
                {!! Form::text('link',null,['placeholder' => 'Url',
                'class'=>'form-control']) !!}


            </div>
        </div>


    {{-- parent --}}

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Parent</span>
                </div>

                {!! Form::select('parent', $parent, null, ['placeholder' => 'Select
                Parent (optional)', 'onChange'=>"checkChild(this.id,'second-parent','appened-menu')",
                'class'=>'form-control','id'=>'first-parent']) !!}
            </div>
        </div>



        {{-- level 2 --}}
        <div class="form-group" id="parent-2" style="display: none">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Parent</span>
                </div>
                {!! Form::select('level_2', [], null, ['placeholder' => 'Select
                Parent (optional)', 'onChange'=>"checkChild(this.id,'third-parent','third-div')",
                'class'=>'form-control','id'=>'second-parent']) !!}
            </div>
        </div>


        {{-- level 3 --}}
        <div class="form-group" id="parent-3" style="display: none">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Parent</span>
                </div>

                {!! Form::select('level_3', [], null, ['placeholder' => 'Select
                Parent (optional)', 'onChange'=>"checkChild(this.id)",
                'class'=>'form-control','id'=>'third-parent']) !!}
            </div>
        </div>



     {{-- parent --}}
        <div class="form-group">
            <div class="input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>

                {!! Form::text('sort', null, ['placeholder' => 'Display Order',
                'class'=>'form-control']) !!}
            </div>
    </div>


    @if(@$information)
        @php
            $depth= $information->depth;
        @endphp
    @endif
    <input type="hidden" name="depth" value="{{$depth}}">



</div>
