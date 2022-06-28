@if ($thanas)
    <option value="0">-Please select thana-</option>
    @foreach ($thanas as $row)
        @php
            $thanaId = $row['id'];
            $thana = $row['name'];
        @endphp
        <option value={{ $thanaId }}>{{ $thana }}</option>
    @endforeach
@else
    <option value="0">-Please select thana-</option>
@endif
