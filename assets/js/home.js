const getUrl = window.location;
const baseUrl = getUrl.protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[0];

let collapseStatus = false;

let limit = 3;
let start = 10;
let loadCounter = 1;
let action = 'inactive';

var validateEmail = function($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test($email);
};

var loadHistory = function(limit, start) {
	$.get(
		baseUrl + 'API/getHistorySupply',
		{
			limit: limit,
			start: start,
			counter: loadCounter
		},
		function(resp) {
			console.log(resp);

			if (resp.button) {
				let $loadContainer = $('<div>').addClass('col-12 d-flex justify-content-center btn-container');
				let $btnLoadMore = $('<a>').addClass('w-25 btn-load-more').text('Tampilkan Lebih Banyak').attr({
					onclick: 'manualLoad()'
				});

				$btnLoadMore.appendTo($loadContainer);
				$('#autoloadHolder').append($loadContainer);
			} else {
				$.each(resp.data, function(index, val) {
					let $mobileHolder = $('<div>').addClass('d-none col-md-4 wow fadeInUp').data('wow-delay', '0.2s');
					let $mobileHistoryHolder = $('<div>').addClass('histori-col');
					let $mobileImageHolder = $('<div>').addClass('img mb-4');
					let $mobileAnchorHolder = $('<a>').attr('href', baseUrl + 'history/detail?id=' + val.PARENT);
					let $mobileImageSource = $('<img>')
						.attr({
							src: baseUrl + 'assets/img/histori-suplai/' + val.IMAGE,
							alt: val.DESCRIPTION
						})
						.addClass('img-fluid');
					let $mobileTextHolder = $('<p>').text(val.DESCRIPTION).addClass('title text-capitalize');

					let $desktopHolder = $('<div>')
						.addClass('d-md-block col-md-4 wow fadeInUp my-4')
						.data('wow-delay', '0.2s');
					let $desktopHistoryHolder = $('<div>').addClass('histori-col h-100');
					let $desktopImageHolder = $('<div>').addClass('img mb-4');
					let $desktopAnchorHolder = $('<a>').attr('href', baseUrl + 'history/detail?id=' + val.PARENT);
					let $desktopImageSource = $('<img>')
						.attr({
							src: baseUrl + 'assets/img/histori-suplai/' + val.IMAGE,
							alt: val.DESCRIPTION
						})
						.addClass('img-fluid');
					let $desktopTextHolder = $('<p>').text(val.DESCRIPTION).addClass('title text-capitalize');

					$mobileImageSource.appendTo($mobileAnchorHolder);
					$mobileAnchorHolder.appendTo($mobileImageHolder);
					$mobileImageHolder.appendTo($mobileHistoryHolder);
					$mobileTextHolder.appendTo($mobileHistoryHolder);
					$mobileHistoryHolder.appendTo($mobileHolder);

					$desktopImageSource.appendTo($desktopAnchorHolder);
					$desktopAnchorHolder.appendTo($desktopImageHolder);
					$desktopImageHolder.appendTo($desktopHistoryHolder);
					$desktopTextHolder.appendTo($desktopHistoryHolder);
					$desktopHistoryHolder.appendTo($desktopHolder);

					$('#autoloadHolder').append($desktopHolder);
				});
			}

			action = 'inactive';
		}
	);
};

var manualLoad = function() {
	start = start + limit;

	$('.btn-container').remove();

	$.get(
		baseUrl + 'API/getHistorySupply',
		{
			limit: limit,
			start: start,
			counter: loadCounter
		},
		function(resp) {
			$.each(resp.data, function(index, val) {
				let $mobileHolder = $('<div>').addClass('d-none col-md-4 wow fadeInUp').data('wow-delay', '0.2s');
				let $mobileHistoryHolder = $('<div>').addClass('histori-col');
				let $mobileImageHolder = $('<div>').addClass('img mb-4');
				let $mobileAnchorHolder = $('<a>').attr('href', baseUrl + 'history/detail?id=' + val.PARENT);
				let $mobileImageSource = $('<img>')
					.attr({
						src: baseUrl + 'assets/img/histori-suplai/' + val.IMAGE,
						alt: val.DESCRIPTION
					})
					.addClass('img-fluid');
				let $mobileTextHolder = $('<p>').text(val.DESCRIPTION).addClass('title text-capitalize');

				let $desktopHolder = $('<div>')
					.addClass('d-md-block col-md-4 wow fadeInUp my-4')
					.data('wow-delay', '0.2s');
				let $desktopHistoryHolder = $('<div>').addClass('histori-col h-100');
				let $desktopImageHolder = $('<div>').addClass('img mb-4');
				let $desktopAnchorHolder = $('<a>').attr('href', baseUrl + 'history/detail?id=' + val.PARENT);
				let $desktopImageSource = $('<img>')
					.attr({
						src: baseUrl + 'assets/img/histori-suplai/' + val.IMAGE,
						alt: val.DESCRIPTION
					})
					.addClass('img-fluid');
				let $desktopTextHolder = $('<p>').text(val.DESCRIPTION).addClass('title text-capitalize');

				$mobileImageSource.appendTo($mobileAnchorHolder);
				$mobileAnchorHolder.appendTo($mobileImageHolder);
				$mobileImageHolder.appendTo($mobileHistoryHolder);
				$mobileTextHolder.appendTo($mobileHistoryHolder);
				$mobileHistoryHolder.appendTo($mobileHolder);

				$desktopImageSource.appendTo($desktopAnchorHolder);
				$desktopAnchorHolder.appendTo($desktopImageHolder);
				$desktopImageHolder.appendTo($desktopHistoryHolder);
				$desktopTextHolder.appendTo($desktopHistoryHolder);
				$desktopHistoryHolder.appendTo($desktopHolder);

				$('#autoloadHolder').append($desktopHolder);
			});

			let $loadContainer = $('<div>').addClass('col-12 d-flex justify-content-center btn-container');
			let $btnLoadMore = $('<a>').addClass('w-25 btn-load-more').text('Tampilkan Lebih Banyak').attr({
				onclick: 'manualLoad()'
			});

			$btnLoadMore.appendTo($loadContainer);
			$('#autoloadHolder').append($loadContainer);
		}
	);
};

/* Autoload Content */
$(window).scroll(function() {
	if (loadCounter < 3) {
		if ($(window).scrollTop() + $(window).height() > $('#autoloadTrigger').height() && action == 'inactive') {
			console.log('run now');
			action = 'active';
			start = start + limit;
			loadCounter++;
			setTimeout(function() {
				loadHistory(limit, start, loadCounter);
			}, 1000);
		}
	} else {
	}
});
/* End of Autoload */

$('.row-images').each(function() {
	var $this = $(this);
	$this.on('click', function() {
		var image = $('.detail-main-images');
		//HARUS DIASIGN KE LOCAL VARIABLE BIAR BERUBAH
		var source = $(this).data('picture');
		image.fadeOut('fast', function() {
			image.attr('src', source);
			image.fadeIn('fast');
		});
	});
});

$('.product-link').click(function(ex) {
	let productTitle = $(this).data('title');
	Swal.fire({
		title: 'Kirimkan pertanyaan anda tentang ' + productTitle,
		html:
			'<input id="textName" class="swal2-input" placeholder="Nama anda">' +
			'<input id="textEmail" class="swal2-input" placeholder="Email anda">' +
			'<textarea id="textQuestion" class="swal2-textarea" placeholder="Pertanyaan anda">',
		showCancelButton: true,
		confirmButtonText: 'Kirim pesan',
		cancelButtonText: 'Batalkan',
		showLoaderOnConfirm: true,
		preConfirm: () => {
			if ($('#textName').val().length === 0) {
				Swal.showValidationMessage('Nama tidak boleh kosong');
			} else if ($('#textEmail').val().length === 0) {
				Swal.showValidationMessage('Alamat email tidak boleh kosong');
			} else if ($('#textQuestion').val().length === 0) {
				Swal.showValidationMessage('Pertanyaan tidak boleh kosong');
			} else if (!validateEmail($('#textEmail').val())) {
				Swal.showValidationMessage('Alamat email tidak sesuai format');
			} else {
				return $.post(
					baseUrl + 'API/postMessagetoEmail',
					{
						subject: $('#textName').val() + ' mengirimkan pesan tentang ' + productTitle + ' kepada anda',
						message: $('#textQuestion').val(),
						email: $('#textEmail').val(),
						name: $('#textName').val()
					},
					function(resp) {
						if (!resp.ok) {
							Swal.fire({
								title: 'Pesan gagal dikirim',
								icon: 'error',
								html: 'Pesan anda <b>gagal dikirim</b>, ' + 'silahkan coba lagi ',
								showCloseButton: false,
								showCancelButton: false
							});
						} else {
							Swal.fire({
								title: 'Pesan berhasil dikirim',
								icon: 'success',
								html: 'Pesan anda <b>berhasil dikirim</b>, ' + 'mohon menunggu respon dari kami',
								showCloseButton: false,
								showCancelButton: false
							});
						}
						return resp;
					}
				);
			}
		}
	});
});

$('#readMoreButton').click(function() {
	if (!collapseStatus) {
		$('.collapseExample').collapse('show');
		collapseStatus = true;
	} else if (collapseStatus) {
		$('.collapseExample').collapse('hide');
		collapseStatus = false;
	}
});

$('#contactForm').submit(function(ex) {
	ex.preventDefault();

	let name = $('#name').val();
	let email = $('#email').val();
	let subject = $('#subject').val();
	let message = $('#message').val();

	if (name.length != 0 && email.length != 0 && subject.length != 0 && message.length != 0) {
		$.post(baseUrl + 'API/postMessagetoEmail', $('#contactForm').serialize(), function(ex) {
			// console.log(ex);
			if (ex.status == 200) {
				swal({
					title: 'Berhasil Kirim Pesan',
					text: 'Pesan telah berhasil dikirim',
					icon: 'success'
				});
				$('.swal-button-container').addClass('d-none');

				$('#name').empty();
				$('#email').empty();
				$('#subject').empty();
				$('#message').empty();
			} else {
				swal({
					title: 'Gagal Mengirim Pesan',
					text: 'Pesan anda belum terkirim, silahkan coba lagi',
					icon: 'error'
				});
				$('.swal-button-container').addClass('d-none');
			}
		});
	} else {
		// alert('masih ada yang kosong');
	}
});
