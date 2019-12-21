const flashDataNilai = $('.flash-data-nilai').data('datanilai');

if (flashDataNilai) {
	Swal.fire({
		title: 'Data Nilai ',
		text: 'Berhasil ' + flashDataNilai,
		type: 'success'
	});
}


// tombol-hapus
$('.hapusnilai').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data nilai akan dihapus",
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
