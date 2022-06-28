<?php

$st1 = $status == '1' ? 'Active' : 'Deactive';
$st2 = $status == '1' ? 'Deactive' : 'Active';

echo '<button id= "changeStatus" class="btn btn-sm btn-warning" data-status="{{ $status }}" data-id="{{ $id }}">' . $st2 . '</button>';
?>
