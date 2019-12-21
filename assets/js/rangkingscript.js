const flashDataRangking = $('.flash-data-rangking').data('flashdatarangking');

if (flashDataRangking) {
	Swal.fire({
		title: 'Data Rangking ',
		text: 'Berhasil ' + flashDataRangking,
		type: 'success'
	});
}

// tombol-hapus
$('.tombol-hapusr').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data rangking akan dihapus",
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
