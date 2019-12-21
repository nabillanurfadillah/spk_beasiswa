const flashDataAlternatif = $('.flash-data-alternatif').data('flashdataalternatif');

if (flashDataAlternatif) {
	Swal.fire({
		title: 'Data Alternatif ',
		text: 'Berhasil ' + flashDataAlternatif,
		type: 'success'
	});
}

// tombol-hapus
$('.tombolhapusa').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data alternatif akan dihapus",
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
