$('#loginForm').submit(function(ex) {
	ex.preventDefault();

	let data = $('#loginForm').serialize();
	$.post(baseUrl + 'API/CMSLogin', data, function(ex) {
		// console.log(ex);
		if (ex.message == 'wrong_password') {
			swal({
				title: 'Login Gagal',
				text: 'Password salah, mohon diperiksa kembali',
				type: 'warning'
			});
		} else if (ex.message == 'no_user') {
			swal({
				title: 'Login Gagal',
				text: 'Nama pengguna tidak ditemukan, mohon diperiksa kembali',
				type: 'warning'
			});
		} else {
			swal({
				title: 'Login Berhasil!',
				text: 'Selamat datang, ' + ex.user,
				type: 'success',
				buttons: {
					confirm: {
						className: 'btn btn-success'
					}
				}
			}).then((result) => {
				if (result) {
					window.location.replace(baseUrl + 'cms/dashboard');
				}
			});
		}
	});
});
