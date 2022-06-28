@extends('layouts.master')
@section('content')
    <div class="container-fluid content">
        <div class="row mt-2">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>Admin Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div id="newCustomer" data-bs-toggle="modal" data-bs-target="#myModal" class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $new }}</h3>
                        <p>New Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <span class="small-box-footer"> More info
                        <i class="fas fa-arrow-circle-right"></i>
                    </span>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalCustomers }}</h3>
                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-group"></i>
                    </div>
                    <a href="{{ route('customers.index') }}" class="small-box-footer">More info
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalOrders }}</h3>
                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{ route('orders.index') }}" class="small-box-footer">More info
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center">
            <h1 class="">Location of customers</h1>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Division</th>
                        <th>District</th>
                        <th>Thana</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
	    if (!empty($customer)) {
		foreach ($customer as $divId => $divInfo) {
		    if ((isset($_GET['array']) && $_GET['array'] == $divId) || empty($_GET)) {
			?>
                    <tr>
                        <td rowspan="{{ !empty($rowspanArr['div'][$divId]) ? $rowspanArr['div'][$divId] : 1 }}">
                            <a style="text-decoration: none; color: black" href="">
                                {{ !empty($divInfo['division_name']) ? $divInfo['division_name'] : 0 }}
                            </a>
                        </td>
                        <?php
			    if (!empty($divInfo['district'])) {
				$i = 0;
				foreach ($divInfo['district'] as $disId => $disInfo) {
				    if ($i > 0) {
					?>
                    <tr>
                        <?php } ?>

                        <td
                            rowspan="{{ !empty($rowspanArr['dis'][$divId][$disId]) ? $rowspanArr['dis'][$divId][$disId] : 1 }}">
                            <a style="text-decoration: none; color: black" href="">
                                {{ !empty($disInfo['district_name']) ? $disInfo['district_name'] : 0 }}
                            </a>
                        </td>
                        <?php
				    if (!empty($disInfo['thana'])) {
					$j = 0;
					foreach ($disInfo['thana'] as $thId => $thInfo) {
					    if ($j > 0) {
						?>
                    <tr>
                        <?php } ?>

                        <td
                            rowspan="{{ !empty($rowspanArr['th'][$divId][$disId][$thId]) ? $rowspanArr['th'][$divId][$disId][$thId] : 1 }}">
                            {{ !empty($thInfo['thana_name']) ? $thInfo['thana_name'] : 0 }}
                        </td>
                        <?php
					    if (!empty($thInfo['user'])) {
						$k = 0;
						foreach ($thInfo['user'] as $uId => $uInfo) {
						    if ($k > 0) {
							?>
                    <tr>
                        <?php
						    }
						    $uName = $uInfo['first_name'] . ' ' . $uInfo['last_name'];
						    ?>
                        <td>{{ !empty($uName) ? $uName : 0 }} </td>
                        <?php if ($k < $rowspanArr['th'][$divId][$disId][$thId] - 1) { ?>
                    </tr>
                    <?php
						}
						$k++;
					    }
					}
					if ($j < $rowspanArr['dis'][$divId][$disId] - 1) {
					    ?>
                    </tr>
                    <?php
					}
					$j++;
				    }
				}
				if ($i < $rowspanArr['div'][$divId] - 1) {
				    ?>
                    </tr>
                    <?php
				}
				$i++;
			    }
			}
			?>
                    </tr>
                    <?php
		    }
		}
	    }
	    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New customers</h4>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal"></button>-->
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p id="modalBody"></p>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
     $(document).ready(function() {
        $(document).on('click', '#newCustomer', function() {
                var id = $(this).attr('data-id');
                //   window.alert(id);    
                $.ajax({
                    url: "{{ url('/new-customer-modal') }}",
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
                        $('#modalBody').html(res.html);
                    }
                });
            });
        });
    </script>
@endsection
