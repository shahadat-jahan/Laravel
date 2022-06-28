<script>
    function showDistrict(id) {
        var xhttp;
        document.getElementById("district").innerHTML = '<option value= "">-Please select district-</option>';
        document.getElementById("thana").innerHTML = '<option value= "">-Please select thana-</option>';
        if (id == "") {
            return false;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("district").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "<?php echo e(route('customers.getDistrict','')); ?>" + "/" + id, true);
        xhttp.send();
    }

    function showThana(id) {
        var xhttp;
        document.getElementById("thana").innerHTML = '<option value= "">-Please select thana-</option>';
        if (id == "") {
            return false;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("thana").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "<?php echo e(route('customers.getThana','')); ?>" + "/" + id, true);
        xhttp.send();
    }

    function changeStatus(id, status) {
        window.alert("Do you want change status!");
        // console.log(id, status);
        if (id === 0) {
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cxngstatus" + id).innerHTML = this.responseText;
            }
        }
        xhttp.open("GET", "<?php echo e(url('/customers/chng-status/')); ?>/" + id + "/" + status + "/"0, true);
        xhttp.send();

        const xhttp1 = new XMLHttpRequest();
        xhttp1.onload = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cxngstatusBtn" + id).innerHTML = this.responseText;
            }
        }
        xhttp1.open("GET", "<?php echo e(url('/customers/chng-status/')); ?>/" + id + "/" + status + "/'1'", true);
        xhttp1.send();
    }

    function ConfirmDelete() {
        var x = confirm("Do you want to delete?");
        if (x)
            return true;
        else
            return false;
    }

    function showAddress(id) {
        if (id == "") {
            return false;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("modal_body").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "<?php echo e(route('customers.modal','')); ?>" + "/" + id, true);
        xhttp.send();
    }
</script>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/layouts/custom_js.blade.php ENDPATH**/ ?>