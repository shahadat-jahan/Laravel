@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add customer</h2>
            @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session()->get('failed') }}
                </div>
            @endif
            <div class="input-group justify-content-center">
                <form class="shadow-lg p-5 bg-light m-5" method="post" action="{{ route('customers.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.f')</label>
                            <input class="form-control" type="text" name="fname" value="">
                        </div>
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                        <div class="col">
                            <label class="input-group">@lang('label.name.l')</label>
                            <input class="form-control" type="text" name="lname" value="">
                        </div>
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.u')</label>
                            <input class="form-control" type="text" name="username" value="">
                        </div>
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        <div class="col">
                            <label class="input-group">@lang('label.pass')</label>
                            <input class="form-control" type="password" name="password" value="">
                        </div>
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-4">
                            <label class="input-group">@lang('label.gender')</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="1">Male
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="2">Female
                        </div>
                    </div>
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                    <br />
                    <br />
                    <label class="input-group">@lang('label.add')</label>
                    <div id="division-container">
                        <select class="form-select my-2" id="division" name="division_id"">
                            <option value="">-Please select division-</option>
                            {{-- get division --}}
                            @if ($divisions)
                                @foreach ($divisions as $row)
                                    @php
                                        $divisionId = $row['id'];
                                        $division = $row['name'];
                                    @endphp
                                    <option value={{ $divisionId }}>{{ $division }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="text-danger">{{ $errors->first('division_id') }}</span>
                    <div id="district-container">
                        <select class="form-select my-2" id="district" name="district_id">
                            <option value="">-Please select district-</option>
                        </select>
                    </div>
                    <span class="text-danger">{{ $errors->first('district_id') }}</span>
                    <div id="thana-container">
                        <select class="form-select my-2" id="thana" name="thana_id">
                            <option value="">-Please select thana-</option>
                        </select>
                    </div>
                    <span class="text-danger">{{ $errors->first('thana_id') }}</span>
                    <div id="address-container">
                        <textarea class="form-control my-2" name="address" rows="5" cols="50" placeholder="Write your address..."></textarea>
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                    <br />
                    <label class="input-group">@lang('label.status')</label>
                    <select class="form-select" name="status">
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                    <br />
                    <label class="input-group">@lang('label.photo')</label>
                    <input class="form-control" type="file" name="image">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="{{ route('customers.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#division").on('change', function() {
                var id = $(this).val();
                // window.alert(id);
                $.ajax({
                    url: "{{ url('/customers/get-district') }}",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id
                    },

                    success: function(res) {
                        $('#district').html(res.html);
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#district").on('change', function() {
                var id = $(this).val();
                // window.alert(id);
                $.ajax({
                    url: "{{ url('/customers/get-thana') }}",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id
                    },

                    success: function(res) {
                        $('#thana').html(res.html);
                    }
                });
            });
        });
    </script>
@endsection
