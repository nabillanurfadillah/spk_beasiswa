const flashDataSubMenu = $('.flash-data-sub-menu').data('flashdatasubmenu');

if (flashDataSubMenu) {
	Swal.fire({
		title: 'Data Sub Menu ',
		text: 'Berhasil ' + flashDataSubMenu,
		type: 'success'
	});
}

// tombol-hapus
$('.hapus-submenu').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data submenu akan dihapus",
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
