@if (!empty($modal))
		@php
			$name = $modal["fname"] . " " . $modal["lname"];
		@endphp
		@if ($modal['gender'] == 1)
			@php
				$gender = 'Male';
			@endphp
		@else
			@php
				$gender = 'Female';
			@endphp
		@endif

		@php
			$address = $modal["address"];
		@endphp

		{{-- get division name --}}
		@if ($modal['division_id'] == 0) 
			@php
				$division = "--Division not selected--";
			@endphp
		@else 
			@php
				$division = $modal->division->name;
			@endphp
		@endif

		{{-- get district name --}}
		@if ($modal['district_id'] == 0)
			@php
				$district = "--District not selected--";
			@endphp
		@else
			@php
				$district = $modal->district->name;
			@endphp
		@endif

		{{-- get thana name --}}
		@if ($modal['thana_id'] == 0)
			@php
				$thana = "--Thana not selected--";
			@endphp
		@else
			@php
				$thana = $modal->thana->name;
			@endphp
		@endif
		{{ "Name: " . $name }}<br/>
		{{ "Gender: " . $gender }}<br/>
		{{"Address: " . $address . ", " . $thana . ", " . $district . ", " . $division }}
@else
	{{ "No data found." }}
@endif
