@if ($newCustomers)
    @php
     $i = 0;   
    @endphp
    @foreach ($newCustomers as $row)
        @php
            $name = $row['fname'] . ' ' . $row['lname'];
            echo ++$i.' - '. $name . '<br />';
        @endphp
    @endforeach
@else
    @php
        echo 'No modal found.';
    @endphp
@endif
