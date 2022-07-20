@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Edit customer</h2>
            @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session()->get('failed') }}
                </div>
            @endif
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
                <form class="shadow-lg p-5 bg-light m-5" method="POST" action="{{ route('customers.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $customer->id ?? '' }}">
                    <div class="row">
                        <div class="col">
                            <label class="input-group">@lang('label.name.f')</label>
                            <input class="form-control" type="text" name="fname"
                                value="{{ $customer->fname ?? '' }}">
                        </div>
                        <div class="col">
                            <label class="input-group">@lang('label.name.l')</label>
                            <input class="form-control" type="text" name="lname"
                                value="{{ $customer->lname ?? '' }}">
                        </div>
                    </div>
                    <br />
                    <div>
                        <label class="input-group">@lang('label.name.u')</label>
                        <input class="form-control" type="text" name="username"
                            value="{{ $customer->username ?? '' }}">
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-4">
                            <label class="input-group">@lang('label.gender')</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" <?php
                            if (isset($customer->gender) && $customer->gender == '1') {
                                echo 'checked';
                            }
                            ?>
                                value="1">Male
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" <?php
                            if (isset($customer->gender) && $customer->gender == '2') {
                                echo 'checked';
                            }
                            ?>
                                value="2">Female
                        </div>
                    </div>
                    <br />
                    <br />

                    <div id="division-container">
                        <label class="input-group">@lang('label.add')</label>
                        <select class="form-select my-2" id="division" name="division_id"
                            onchange="showDistrict(this.value)">
                            <?php
                            //get division
                            if ($divisions) {
                                foreach ($divisions as $row) {
                                    $divisionId = $row['id'];
                                    $division = $row['name'];
                                    if (isset($customer->division) && $customer->division->id === $divisionId) {
                                        echo '<option value="' . $divisionId . '" SELECTED>' . $division . '</option>';
                                    } else {
                                        echo '<option value="' . $divisionId . '">' . $division . '</option>';
                                    }
                                }
                                // echo '<option value="0">-Please select division-</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div id="district-container">
                        <select class="form-select my-2" id="district" name="district_id" onchange="showThana(this.value)">
                            <?php
                            if (isset($customer->district)) {
                                echo '<option value="' . $customer->district->id . '" >' . $customer->district->name . '</option>';
                            } else {
                                echo '<option value="0">-Please select district-</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div id="thana-container">
                        <select class="form-select my-2" id="thana" name="thana_id">
                            <?php
                            if (isset($customer->thana)) {
                                echo '<option value="' . $customer->thana->id . '" >' . $customer->thana->name . '</option>';
                            } else {
                                echo '<option value="0">-Please select thana-</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div id="address-container">
                        <textarea class="form-control my-2" name="address" rows="5" cols="50" placeholder="Write your address...">{{ $customer->address ?? '' }}</textarea>
                    </div>
                    <br />
                    <br />
                    <label class="input-group">@lang('label.status')</label>
                    <select class="form-select" name="status">
                        <option <?php
                        if (isset($customer->status) && $customer->status == '1') {
                            echo 'selected';
                        }
                        ?> value="1">Active</option>
                        <option <?php
                        if (isset($customer->status) && $customer->status == '0') {
                            echo 'selected';
                        }
                        ?> value="0">Inactive</option>
                    </select>
                    <br />
                    <br />
                    <label class="input-group">@lang('label.photo')</label>
                    <input class="form-control" type="file" name="image">
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Update</button>
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
