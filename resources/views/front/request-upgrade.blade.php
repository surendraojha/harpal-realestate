@extends('front.layouts.profile')


@section('title', 'Profile')

@section('content')
    <div class="ContactForm moreDetailSignup">
        <form class="row" action="{{ route('user-upgrade.post') }}" method="POST" enctype="multipart/form-data">
            @csrf



            <div class="col-12">
                <h6 class="text-center mb-3">
                    Request Upgrade
                </h6>

            </div>





            @php
                $roles = [
                    'user' => 'User',
                    'agent' => 'Agent',
                    'agency' => 'Agency',
                ];
            @endphp

            <div class="col-md-3">
                <div class="form-floating customForm">
                    <select name="role" class="form-select form-control {{ $errors->has('role') ? ' is-invalid' : '' }}"
                        required>


                        <option value="" disabled selected>Select role</option>

                        @foreach ($roles as $key => $value)
                            @if (auth()->user()->role != $key)
                                <option value="{{ $key }}"
                                    {{ old('role', strtolower(auth()->user()->role)) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endif
                        @endforeach


                    </select>
                    <label for="pNumber">
                        Request Upgrade
                    </label>
                    @error('role')
                        <span class="invalid-feedback" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>



            <div class="customForm">
                <button type="submit" class="colorBtn ms-0">
                    Update <i class="fas fa-arrow-right ps-2"></i>
                </button>
            </div>
        </form>

        @if ($data->isNotEmpty())
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Request History
                    </h6>


                    <table class="table table-striped">
                        <thead>
                            <th>Previous Role</th>
                            <th>Requested Role</th>
                            <th>Status</th>
                            <th>Requested At</th>

                        </thead>

                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ ucwords($value->previous_role) }}</td>
                                    <td>{{ ucwords($value->role) }}</td>
                                    <td>{{ $value->status ? 'Approved' : 'Pending' }}</td>
                                    <td>{{ date('Y-m-d', strtotime($value->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @endif
    </div>
@endsection
