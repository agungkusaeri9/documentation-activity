@if (session('success'))
<script>
    toastr.success('{{ session('success') }}', 'Sukses !')
</script>
@endif
@if (session('error'))
<script>
    toastr.error('{{ session('error') }}', 'Gagal !')
</script>
@endif