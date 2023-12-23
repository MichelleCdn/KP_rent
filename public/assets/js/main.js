$(document).ready(function () {
    function logout(e) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }

    $('.btn-hapus').on('click', function (e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: "Anda Yakin?",
            text: "Data yang telah dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Data!"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete').attr('action', link);
                $('#form-delete').submit();
            }
        });
    });

    $('.btn-modal').on('click', function (e) {
        e.preventDefault();

        const link   = $(this).data('route');
        const title  = $(this).data('title');
        const method = $(this).data('method');
        const target = $(this).data('bs-target');

        // reset form

        const modal = $(document).find(target).find('form');
        modal.trigger('reset');
        modal.find('textarea').html("");

        // change modal's title
        $(document).find(target + "Label").text(title);

        // change modal's form link & method
        $(document).find(target).find('form').attr('action', link);
        $(document).find(target).find('form').find('input[name="_method"]').val(method);

    });

    $('.btn-edit').on('click', function (e) {
        e.preventDefault();

        let item = $(this).data('item');
        console.log("🚀 ~ file: main.js:48 ~ item:", item)

        const target = $(this).data('bs-target');
        const modal = $(document).find(target);

        Object.entries(item).forEach(([key, val]) => {
            modal.find('input[name="'+key+'"]').val(val);
            modal.find('select[name="'+key+'"]').val(val);
            modal.find('textarea[name="'+key+'"]').html(val);
        });


    });

});
