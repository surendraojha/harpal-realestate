@extends('admin.layouts.main')

@section('title')
    Send Mail To Subscriber
@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>
                        Send Mail To Subscriber
                    </h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search -->

            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link @if(!session()->get('errors')) active show @endif" data-toggle="tab" href="#Users">
                           Send Mail To Subscriber
                        </a></li>
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane  @if(!session()->get('errors')) active show @endif" id="Users">
                            <div class="table-responsive">



                            <form action="{{ route('send.email.post') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                @foreach ($subscriber as $value)
                                    <input type="hidden" name="id[]" value="{{ $value }}">
                                @endforeach

                                <table class="table table-hover table-custom spacing8">
                                    <tbody>
                                        <tr>
                                            <th>
                                                Title
                                            </th>

                                            <td>
                                                <input class="form-control" type="text" name="title" id="" required>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>
                                                Message
                                            </th>


                                            <td>
                                                <textarea class="form-control" name="message" cols="30" rows="10" required>{{ old('message') }}</textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Attachment</th>
                                            <td>
                                                <input type="file" name="attachment">
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>


                                <button type="submit" class="btn btn-success">Send</button>

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
