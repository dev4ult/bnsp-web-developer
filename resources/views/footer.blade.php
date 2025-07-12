@if (session()->get('error'))
<script>
    Swal.fire({
        icon: 'error',
        text: "{{ session()->get('error') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@if (session()->get('success'))
<script>
    Swal.fire({
        icon: 'success',
        text: "{{ session()->get('success') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

</body>

</html>