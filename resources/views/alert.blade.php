<script src="{{ asset('assets/coustom/js/toastr.min.js') }}"></script>
@if (Session::has('message'))
    <script>
        var type = "{{ Session::get('alert', 'info') }}"
        switch (type) {
            case 'info':
                toastr.ingfo("{{ Session::get('message') }}", 'Success!', {
                    timeOut: 2000
                });
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}", 'Success!', {
                    timeOut: 2000
                });
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}", 'Success!', {
                    timeOut: 2000
                });
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    </script>
@endif



<script src="{{ asset('admin/assets/sweetalert.min.js') }}"></script>

<script>
    $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: "Are you sure To Delete?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });
</script>

<script>
    $(document).on("click", "#deleteInactive", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: "Are you sure To Inactive?",
                text: "Once Inactive,",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });
</script>


<script>
    $(document).on("click", "#confirm", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: 'Are you sure to Confirm?',
                text: "Once Confirm, You will not be able to pending again?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });
</script>


<script>
    $(document).on("click", "#processing", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: 'Are you sure to Processing?',
                text: "Once Processing, You will not be able to pending again?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });
</script>


<script>
    $(document).on("click", "#delivered", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: 'Are you sure to Delivered?',
                text: "Once Delivered, You will not be able to pending again?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });
</script>


<script>
    $(document).on("click", "#approved", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: 'Are you sure to Approved?',
                text: "Return Order Approved",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });
</script>

<script>
    $(document).on("click", "#deleteactive", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
                title: "Are you sure To Active?",
                text: "Once Inactive,",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;

                } else {
                    swal("Your imaginary file is safe!");
                }

            });
    });

    // ----------- Message Alert ----------------------
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        icon: 'success',
        showConfirmButton: false,
        timer: 3000
    })
    if ($.isEmptyObject(data.error)) {

        Toast.fire({
            type: 'success',
            title: data.success,
        })
    } else {

        Toast.fire({
            type: 'error',
            title: data.error,
        })
    } //Message End
</script>
