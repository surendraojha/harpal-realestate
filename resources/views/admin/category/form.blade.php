<div class="row clearfix">



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Title</span>
                </div>
                {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>




    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control']) !!}


            </div>


        </div>

        @if (@$information->photo)
            <img height="300px" src="{{ asset('category/' . @$information->photo) }}" alt="">
        @endif

    </div>


    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <label for="">Custom Fields</label>
            <table class="table table-responsive" id="fieldsTable">
                <thead>
                    <tr>
                        <th>Identifier</th>
                        <th>Label</th>
                        <th>Required</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $array = @$information->custom_fields?json_decode($information->custom_fields):[];
                    @endphp

                    @forelse ($array as $value)

                    <tr>
                        <td><input type="text" class="form-control" value="{{ $value->identifier }}" name="identifier[]"></td>
                        <td><input type="text" class="form-control" value="{{ $value->label }}" name="label[]"></td>
                        <td>

                            <select name="required[]" class="form-control">
                                <option value="0" @if($value->required==0) selected @endif>No</option>
                                <option value="1" @if($value->required==1) selected @endif>Yes</option>
                            </select>


                        </td>
                        <td><button class="removeRow">Remove</button></td>
                    </tr>
                    @empty
                    <tr>
                        <td><input type="text" class="form-control" name="identifier[]"></td>
                        <td><input type="text" class="form-control" name="label[]"></td>
                        <td>

                            <select name="required[]" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>


                        </td>
                        <td><button class="removeRow">Remove</button></td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

            <button type="button" id="addRow">Add Row</button>


        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Display Order</span>
                </div>
                {!! Form::number('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Title</span>
                </div>
                {!! Form::text('meta_title', null, ['placeholder' => 'Meta Title', 'class' => 'form-control']) !!}
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
                {!! Form::text('meta_keyword', null, ['placeholder' => 'Meta Keyword', 'class' => 'form-control']) !!}
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
                {!! Form::textarea('meta_description', null, ['placeholder' => 'Meta Description', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            $('#addRow').on('click', function() {
                var newRow = '<tr>' +
                    '<td><input type="text" class="form-control" name="identifier[]"></td>' +
                    '<td><input type="text" class="form-control" name="label[]"></td>' +

                    `<td><select name="required[]" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select></td>`+
                    '<td><button class="removeRow">Remove</button></td>' +
                    '</tr>';
                $('#fieldsTable tbody').append(newRow);
            });

            $('#fieldsTable').on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endpush
