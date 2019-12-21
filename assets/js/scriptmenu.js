const flashDataMenu = $('.flash-data-menu').data('flashdatamenu');

if (flashDataMenu) {
	Swal.fire({
		title: 'Data Menu ',
		text: 'Berhasil ' + flashDataMenu,
		type: 'success'
	});
}

// tombol-hapus
$('.hapus-menu').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data menu akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
