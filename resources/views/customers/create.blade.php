@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add customer</h2>
            <div class="input-group justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="shadow-lg p-5 bg-light m-5" method="post" action="{{ route('customers.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.f')</label>
                            <input class="form-control" type="text" name="fname" value="">
                        </div>
                        <div class="col">
                            <label class="input-group">@lang('label.name.l')</label>
                            <input class="form-control" type="text" name="lname" value="">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.u')</label>
                            <input class="form-control" type="text" name="username" value="">
                        </div>
                        <div class="col">
                            <label class="input-group">@lang('label.pass')</label>
                            <input class="form-control" type="password" name="password" value="">
                        </div>
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
                    <div id="district-container">
                        <select class="form-select my-2" id="district" name="district_id">
                            <option value="">-Please select district-</option>
                        </select>
                    </div>
                    <div id="thana-container">
                        <select class="form-select my-2" id="thana" name="thana_id">
                            <option value="">-Please select thana-</option>
                        </select>
                    </div>
                    <div id="address-container">
                        <textarea class="form-control my-2" name="address" rows="5" cols="50" placeholder="Write your address..."></textarea>
                    </div>
                    <br />
                    <label class="input-group">@lang('label.status')</label>
                    <select class="form-select" name="status">
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    </select>
                    <br />
                    <label class="input-group">@lang('label.photo')</label>
                    <input class="form-control" type="file" name="image">
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
