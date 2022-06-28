@if ($districts)
    <option value="0">-Please select district-</option>
    @foreach ($districts as $row)
        @php
            $districtId = $row['id'];
            $district = $row['name'];
        @endphp
        <option value={{ $districtId }}>{{ $district }}</option>
    @endforeach
@else
    <option value="0">-Please select district-</option>
@endif
