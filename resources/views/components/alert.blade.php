<div class="row">
    <div class="col-12">
        @if (Session::has('status'))
        <script>
            Swal.fire(
                'Berhasil!',
                'Data nasabah berhasil disimpan',
                'success'
            )
        </script>
    @endif
    @if (Session::has('status'))
        <div class="alert alert-success">
           {{ Session::get('status') }}
        </div>
    @endif
    </div>
</div>
