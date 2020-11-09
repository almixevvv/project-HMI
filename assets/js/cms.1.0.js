/* OPEN SUPPLY HISTORY IMAGE */
$('.history-popup').on('click', function() {
	// alert('woi');
	let imageSource = $(this).data('image');
	$('#imagepreview').attr('src', baseUrl + 'assets/img/histori-suplai/' + imageSource);
	$('#imagemodal').modal('show');
});

/* OPEN CHANGE PASSWORD MODAL */
$('#modalChangePassword').on('click', function() {
	$('#changePassword').modal('show');
	$('#submitPassword').prop('disabled', true);
});

/* FORM PASSWORD VALIDATION */
$('#formPassword').on('change paste keyup blur', function() {
	if ($(this).val().length == 0) {
		$(this).parent().addClass('has-error has-feedback');
		$('#passHelp').css('display', 'block');
		$('#submitPassword').prop('disabled', true);
	} else {
		$(this).parent().removeClass('has-error has-feedback');
		$('#passHelp').css('display', 'none');
	}
});

$('#formConfirmPassword').on('change paste keyup blur', function() {
	let pass = $('#formPassword').val();

	if (pass == $(this).val()) {
		$(this).parent().removeClass('has-error has-feedback');
		$('#confirmHelp').css('display', 'none');
		$('#submitPassword').prop('disabled', false);
	} else {
		$(this).parent().addClass('has-error has-feedback');
		$('#confirmHelp').css('display', 'block');
		$('#submitPassword').prop('disabled', true);
	}
});

/* SUBMIT CHANGE PASSWORD FORM */
$('#submitPassword').click(function() {
	let password = $('#formPassword').val();

	$.post(
		baseUrl + 'API/updatePassword',
		{
			pass: password
		},
		function(ex) {
			if (ex.code) {
				swal({
					title: 'Berhasil',
					text: 'Password berhasil dirubah',
					icon: 'success',
					buttons: {
						confirm: {
							className: 'btn btn-success'
						}
					}
				}).then((result) => {
					if (result) {
						window.location.replace(baseUrl + 'cms/dashboard');
					} else {
						swal.close();
					}
				});
			} else {
				swal({
					title: 'Gagal',
					text: 'Password tidak berhasil dirubah',
					icon: 'error'
				});
			}
		}
	);
});

/* SHOW MESSAGE POPUP */
$('.message-popup').on('click', function() {
	let senderName = $(this).data('sender');
	let senderEmail = $(this).data('email');
	let senderID = $(this).data('recid');
	let senderMessage = $(this).data('message');

	$('#emailName').val(senderName);
	$('#emailSender').val(senderEmail);
	$('#emailMessage').text(senderMessage);

	$('#messageModal').modal('show');

	$.post(
		baseUrl + 'API/updateMessageStatus',
		{
			id: senderID
		},
		function(ex) {
			// console.log(ex);
		}
	);
});

Dropzone.autoDiscover = false;
let fileName = new Array();
let fileType = new Array();

let editFileName = new Array();
let editFileType = new Array();

var docName = new Array();
var docType = new Array();

var sjName = new Array();
var sjType = new Array();

var inName = new Array();
var inType = new Array();

var validateData = function(container) {
	if (container.val().length == 0) {
		container.parent().addClass('has-error has-feedback');
		container.siblings('.form-err').css('display', 'block');

		return false;
	} else {
		container.parent().removeClass('has-error has-feedback');
		container.siblings('.form-err').css('display', 'none');

		return true;
	}
};

var validateImage = function() {
	if (fileName.length == 0) {
		$('.dropzone').css('border', '2px dashed rgb(242 89 97) !important');
		$('#imageHelp').parent().addClass('has-error has-feedback');
		$('#imageHelp').css('display', 'block');

		return false;
	} else {
		$('.dropzone').css('border', '2px dashed rgba(0, 0, 0, 0.13) !important');
		$('#imageHelp').css('display', 'none');

		return true;
	}
};

var validateDocument = function() {
	if (docName.length == 0) {
		$('.dropzone').css('border', '2px dashed rgb(242 89 97) !important');
		$('#imageHelp').parent().addClass('has-error has-feedback');
		$('#imageHelp').css('display', 'block');

		return false;
	} else {
		$('.dropzone').css('border', '2px dashed rgba(0, 0, 0, 0.13) !important');
		$('#imageHelp').css('display', 'none');

		return true;
	}
};

$('#supplyDetail').on('change paste keyup blur', function() {
	validateData($(this));
});

$('#supplyName').on('change paste keyup blur', function() {
	validateData($(this));
});

$('#editName').on('change paste keyup blur', function() {
	validateData($(this));
});

$('#salesCreatePO').on('change paste keyup blur', function() {
	validateData($(this));
});

$('#editName').on('change paste keyup blur', function() {
	validateData($(this));
});

$('#salesPO').on('change paste keyup blur', function() {
	validateData($(this));
});

var swalFireDelete = function(id) {
	$.post(
		baseUrl + 'API/deleteSupplyData',
		{
			id: id
		},
		function(ex) {
			swal({
				title: 'Berhasil',
				text: 'Data telah dihapus',
				icon: 'success',
				buttons: {
					confirm: {
						className: 'btn btn-success'
					}
				}
			}).then((result) => {
				if (result) {
					window.location.replace(baseUrl + 'cms/history');
				} else {
					swal.close();
				}
			});
		}
	);
};

var initDropzone = function() {
	$('.dropzone').each(function() {
		let dropzoneControl = $(this)[0].dropzone;
		if (dropzoneControl) {
			dropzoneControl.destroy();
		}
	});
};

var deleteData = function(id) {
	swal({
		title: 'Hapus Data',
		text: 'Apakah anda yakin akan menghapus data?',
		icon: 'warning',
		buttons: {
			confirm: {
				text: 'Yakin',
				className: 'btn btn-success'
			},
			cancel: {
				visible: true,
				text: 'Batal',
				className: 'btn btn-danger'
			}
		}
	}).then((result) => {
		if (result) {
			swalFireDelete(id);
		} else {
			swal.close();
		}
	});
};

var reloadPage = function() {
	location.reload();

	return true;
};

var editModal = function(id) {
	initDropzone();

	$('#editRowModal').modal({
		show: true
	});

	var imageList;

	$.get(
		baseUrl + 'API/getSupplyDetail',
		{
			id: id
		},
		function(ex) {
			$('#editID').val(ex.data.IMAGE_PARENT);
			$('#editName').val(ex.data.NAME);
			$('#editDetail').val(ex.data.DESCRIPTION);

			$('#dz-existing').dropzone({
				url: baseUrl + '/API/postSupplyImage',
				paramName: 'imgUpload',
				acceptedFiles: 'image/*',
				addRemoveLinks: true,
				autoProcessQueue: true,
				dictFallbackMessage: 'Browser tidak mendukung untuk upload file',
				dictFileTooBig: 'Upload gagal, file terlalu besar',
				dictInvalidFileType: 'Tipe file tidak sesuai format',
				dictCancelUpload: 'Batalkan Upload',
				dictRemoveFile: 'Hapus file',
				clickable: true,
				init: function() {
					var myDropzone = this;

					$.each(ex.image, function(index, value) {
						var mockFile = {
							name: value.IMAGE,
							size: 12345,
							accepted: true,
							kind: 'image'
						};

						myDropzone.files.push(mockFile);
						myDropzone.emit('addedfile', mockFile);
						myDropzone.emit('thumbnail', mockFile, baseUrl + '/assets/img/histori-suplai/' + value.IMAGE);
						myDropzone.emit('complete', mockFile);
					});

					myDropzone.on('thumbnail', function(file) {
						console.log('created');
					});
				},
				success: function(file, resp) {
					editFileName.push(resp.upload_data.file_name);
					editFileType.push(resp.upload_data.file_type);
				},
				removedfile: function(file) {
					swal({
						title: 'Hapus Data',
						text: 'Apakah anda yakin akan menghapus data?',
						icon: 'warning',
						buttons: {
							confirm: {
								text: 'Yakin',
								className: 'btn btn-success'
							},
							cancel: {
								visible: true,
								text: 'Batal',
								className: 'btn btn-danger'
							}
						}
					}).then((result) => {
						if (result) {
							$.post(
								baseUrl + '/API/deleteIntroFiles',
								{
									images: file.name
								},
								function(resp) {
									if (resp.code === 200) {
										swal({
											title: 'Hapus Data',
											text: 'Proses hapus data berhasil',
											icon: 'success',
											buttons: {
												confirm: {
													text: 'Kembali',
													className: 'btn btn-success'
												}
											}
										}).then((result) => {
											if (result) {
												window.location.replace(baseUrl + 'cms/history');
											}
										});
									} else {
										swal({
											title: 'Hapus Data',
											text: 'Proses hapus data gagal, silahkan coba kembali',
											icon: 'error',
											buttons: {
												confirm: {
													text: 'Kembali',
													className: 'btn btn-success'
												},
												cancel: {
													visible: true,
													text: 'Batal',
													className: 'btn btn-danger'
												}
											}
										});
									}
								}
							);

							var _ref;
							return (_ref = file.previewElement) != null
								? _ref.parentNode.removeChild(file.previewElement)
								: void 0;
						} else {
							swal.close();
						}
					});
				}
			});

			$('.dz-details').on('click', function() {
				let parent = $(this);
				let imageContainer = parent.siblings('.dz-image');
				let imageSrc = imageContainer.children('img').attr('src');

				window.open(imageSrc, '_blank');
			});

			$('#formUpdate').submit(function(ex) {
				ex.preventDefault();

				let formData = $('#formUpdate input').serialize();

				// console.log(editFileName);
				// console.log(editFileType);

				if (validateData($('#editName')) && validateData($('#editDetail'))) {
					$.post(
						baseUrl + 'API/updateSupplyData',
						formData + '&fileName=' + editFileName.toString() + '&fileType=' + editFileType.toString(),
						function(ex) {
							if (ex.code === 200) {
								swal({
									title: 'Update Data',
									text: 'Proses update data berhasil',
									icon: 'success',
									buttons: {
										confirm: {
											text: 'Kembali',
											className: 'btn btn-success'
										}
									}
								}).then((result) => {
									if (result) {
										window.location.replace(baseUrl + 'cms/history');
									}
								});
							} else {
								swal({
									title: 'Update Data',
									text: 'Proses update data gagal, silahkan coba kembali',
									icon: 'error',
									buttons: {
										confirm: {
											text: 'Kembali',
											className: 'btn btn-success'
										},
										cancel: {
											visible: true,
											text: 'Batal',
											className: 'btn btn-danger'
										}
									}
								});
							}
						}
					);
				} else {
					swal({
						title: 'Error!',
						text: 'Terjadi kesalahan dalam update data, harap coba lagi',
						icon: 'error',
						buttons: {
							confirm: {
								className: 'btn btn-success'
							},
							cancel: {
								visible: true,
								className: 'btn btn-danger'
							}
						}
					});
				}
			});
		}
	);
};

$('#add-row tbody').on('click', '.btn-edit-so', function() {
	$('#updateSalesModal').modal('show');

	let e = $(this);
	let sjFile = $('#fileSJ').attr('href');
	let inFile = $('#fileInv').attr('href');

	$('#editPO').val(e.data('sono'));
	$('#editDatePO').val(e.data('sodate'));
	$('#editSJPO').val(e.data('sjdate'));

	$('#dz-invoice').dropzone({
		url: baseUrl + '/API/postSalesDocument',
		paramName: 'docUpload',
		addRemoveLinks: true,
		autoProcessQueue: true,
		maxFiles: 1,
		dictMaxFilesExceeded: 'File yang bisa di upload hanya boleh 1',
		dictFallbackMessage: 'Browser tidak mendukung untuk upload file',
		dictFileTooBig: 'Upload gagal, file terlalu besar',
		dictInvalidFileType: 'Tipe file tidak sesuai format',
		dictCancelUpload: 'Batalkan Upload',
		dictRemoveFile: 'Hapus file',
		maxfilesexceeded: function(file) {
			this.removeAllFiles();
			this.addFile(file);
		},
		success: function(file, resp) {
			// console.log(resp);
			inName.push(resp.upload_data.file_name);
			inType.push(resp.upload_data.file_type);
		},
		removedfile: function(file) {
			swal({
				title: 'Hapus Data',
				text: 'Apakah anda yakin akan menghapus data?',
				icon: 'warning',
				buttons: {
					confirm: {
						text: 'Yakin',
						className: 'btn btn-success'
					},
					cancel: {
						visible: true,
						text: 'Batal',
						className: 'btn btn-danger'
					}
				}
			}).then((result) => {
				if (result) {
					$.post(
						baseUrl + '/API/deleteDropzoneFiles',
						{
							images: file.name
						},
						function(resp) {
							if (resp.code === 200) {
								swal({
									title: 'Hapus Data',
									text: 'Proses hapus data berhasil',
									icon: 'success',
									buttons: {
										confirm: {
											text: 'Kembali',
											className: 'btn btn-success'
										}
									}
								}).then((result) => {
									if (result) {
										window.location.replace(baseUrl + 'cms/sales');
									}
								});
							} else {
								swal({
									title: 'Hapus Data',
									text: 'Proses hapus data gagal, silahkan coba kembali',
									icon: 'error',
									buttons: {
										confirm: {
											text: 'Kembali',
											className: 'btn btn-success'
										},
										cancel: {
											visible: true,
											text: 'Batal',
											className: 'btn btn-danger'
										}
									}
								});
							}
						}
					);

					var _ref;
					return (_ref = file.previewElement) != null
						? _ref.parentNode.removeChild(file.previewElement)
						: void 0;
				} else {
					swal.close();
				}
			});
		}
	});

	$('#dz-SJ').dropzone({
		url: baseUrl + '/API/postSalesDocument',
		paramName: 'docUpload',
		addRemoveLinks: true,
		autoProcessQueue: true,
		maxFiles: 1,
		dictMaxFilesExceeded: 'File yang bisa di upload hanya boleh 1',
		dictFallbackMessage: 'Browser tidak mendukung untuk upload file',
		dictFileTooBig: 'Upload gagal, file terlalu besar',
		dictInvalidFileType: 'Tipe file tidak sesuai format',
		dictCancelUpload: 'Batalkan Upload',
		dictRemoveFile: 'Hapus file',
		maxfilesexceeded: function(file) {
			this.removeAllFiles();
			this.addFile(file);
		},
		success: function(file, resp) {
			// console.log(resp);
			sjName.push(resp.upload_data.file_name);
			sjType.push(resp.upload_data.file_type);
		},
		removedfile: function(file) {
			$.post(
				baseUrl + '/API/deleteDropzoneFiles',
				{
					images: file.name
				},
				function(resp) {
					console.log(resp);
				}
			);

			var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
		}
	});

	$('#formUpdateSO').submit(function(ex) {
		ex.preventDefault();

		let formData = $('#formUpdateSO input').serialize();

		$.post(
			baseUrl + 'API/updateSOData',
			formData +
				'&suratJalan=' +
				sjName.toString() +
				'&invoice=' +
				inName.toString() +
				'&suratJalanType=' +
				sjType.toString() +
				'&invoiceType=' +
				inName.toString(),
			function(ex) {
				if (ex.code === 200) {
					swal({
						title: 'Update Data',
						text: 'Proses tambah SO berhasil',
						icon: 'success',
						buttons: {
							confirm: {
								text: 'Kembali',
								className: 'btn btn-success'
							}
						}
					}).then((result) => {
						if (result) {
							window.location.replace(baseUrl + 'cms/sales');
						}
					});
				} else {
					swal({
						title: 'Update Data',
						text: 'Proses tambah SO gagal, silahkan coba kembali',
						icon: 'error',
						buttons: {
							confirm: {
								text: 'Kembali',
								className: 'btn btn-success'
							},
							cancel: {
								visible: true,
								text: 'Batal',
								className: 'btn btn-danger'
							}
						}
					});
				}
			}
		);
	});

	$('.dz-details').on('click', function() {
		let parent = $(this);
		let imageContainer = parent.siblings('.dz-image');
		let imageSrc = imageContainer.children('img').attr('src');

		window.open(imageSrc, '_blank');
	});
});

$('#addSalesModal').on('shown.bs.modal', function() {
	$('#dz-document').dropzone({
		url: baseUrl + '/API/postSalesDocument',
		paramName: 'docUpload',
		addRemoveLinks: true,
		autoProcessQueue: true,
		maxFiles: 1,
		dictMaxFilesExceeded: 'File yang bisa di upload hanya boleh 1',
		dictFallbackMessage: 'Browser tidak mendukung untuk upload file',
		dictFileTooBig: 'Upload gagal, file terlalu besar',
		dictInvalidFileType: 'Tipe file tidak sesuai format',
		dictCancelUpload: 'Batalkan Upload',
		dictRemoveFile: 'Hapus file',
		maxfilesexceeded: function(file) {
			this.removeAllFiles();
			this.addFile(file);
		},
		success: function(file, resp) {
			// console.log(resp);
			docName.push(resp.upload_data.file_name);
			docType.push(resp.upload_data.file_type);
		},
		removedfile: function(file) {
			$.post(
				baseUrl + '/API/deleteDropzoneFiles',
				{
					images: file.name
				},
				function(resp) {
					console.log(resp);
				}
			);

			var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
		}
	});

	$('#formAddSO').submit(function(ex) {
		ex.preventDefault();

		let formData = $('#formAddSO input').serialize();

		if (validateData($('#salesPO')) && validateData($('#salesCreatePO')) && validateDocument()) {
			console.log('aman');
			$.post(
				baseUrl + 'API/postSOData',
				formData + '&fileName=' + docName.toString() + '&fileType=' + docType.toString(),
				function(ex) {
					if (ex.code === 200) {
						swal({
							title: 'Update Data',
							text: 'Proses tambah SO berhasil',
							icon: 'success',
							buttons: {
								confirm: {
									text: 'Kembali',
									className: 'btn btn-success'
								}
							}
						}).then((result) => {
							if (result) {
								window.location.replace(baseUrl + 'cms/sales');
							}
						});
					} else {
						swal({
							title: 'Update Data',
							text: 'Proses tambah SO gagal, silahkan coba kembali',
							icon: 'error',
							buttons: {
								confirm: {
									text: 'Kembali',
									className: 'btn btn-success'
								},
								cancel: {
									visible: true,
									text: 'Batal',
									className: 'btn btn-danger'
								}
							}
						});
					}
				}
			);
		} else {
			swal({
				title: 'Error!',
				text: 'Terjadi kesalahan saat input Sales Order, harap coba lagi',
				icon: 'error',
				buttons: {
					confirm: {
						className: 'btn btn-success'
					},
					cancel: {
						visible: true,
						className: 'btn btn-danger'
					}
				}
			});
		}
	});
});

$('#addRowModal').on('shown.bs.modal', function() {
	// console.log('kebuka');
	$('#dz-upload').dropzone({
		url: baseUrl + '/API/postSupplyImage',
		paramName: 'imgUpload',
		acceptedFiles: 'image/*',
		addRemoveLinks: true,
		autoProcessQueue: true,
		dictFallbackMessage: 'Browser tidak mendukung untuk upload file',
		dictFileTooBig: 'Upload gagal, file terlalu besar',
		dictInvalidFileType: 'Tipe file tidak sesuai format',
		dictCancelUpload: 'Batalkan Upload',
		dictRemoveFile: 'Hapus file',
		maxfilesexceeded: function(file) {
			this.removeAllFiles();
			this.addFile(file);
		},
		success: function(file, resp) {
			console.log(resp);
			fileName.push(resp.upload_data.file_name);
			fileType.push(resp.upload_data.file_type);
		},
		removedfile: function(file) {
			$.post(
				baseUrl + '/API/deleteIntroFiles',
				{
					images: file.name
				},
				function(resp) {
					// console.log(resp);
				}
			);

			var _ref;
			return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
		}
	});

	$('#formHistory').submit(function(ex) {
		ex.preventDefault();

		let formData = $('#formHistory input').serialize();

		if (validateData($('#supplyDetail')) && validateData($('#supplyName')) && validateImage()) {
			console.log('clear proses');
			$.post(
				baseUrl + 'API/updateSupplyData',
				formData + '&fileName=' + fileName.toString() + '&fileType=' + fileType.toString(),
				function(ex) {
					console.log(ex);
					if (ex.code == '200') {
						swal({
							title: 'Berhasil',
							text: 'Data berhasil ditambahkan',
							icon: 'success',
							buttons: {
								confirm: {
									className: 'btn btn-success'
								},
								cancel: {
									visible: true,
									className: 'btn btn-danger'
								}
							}
						}).then((result) => {
							if (result) {
								window.location.replace(baseUrl + 'cms/history');
							} else {
								swal.close();
							}
						});
					} else {
						swal({
							title: 'Error!',
							text: 'Terjadi kesalahan dalam input data, harap coba lagi',
							icon: 'error',
							buttons: {
								confirm: {
									className: 'btn btn-success'
								},
								cancel: {
									visible: true,
									className: 'btn btn-danger'
								}
							}
						});
					}
				}
			);
		} else {
			swal({
				title: 'Error!',
				text: 'Terjadi kesalahan dalam input data, harap coba lagi',
				icon: 'error',
				buttons: {
					confirm: {
						className: 'btn btn-success'
					},
					cancel: {
						visible: true,
						className: 'btn btn-danger'
					}
				}
			});
		}
	});
});

$('#btnLogout').click(function(ex) {
	swal({
		title: 'Logout dari sistem',
		text: 'Apa anda yakin ingin keluar dari sistem?',
		icon: 'warning',
		buttons: {
			confirm: {
				className: 'btn btn-success'
			},
			cancel: {
				visible: true,
				className: 'btn btn-danger'
			}
		}
	}).then((result) => {
		if (result) {
			window.location.replace(baseUrl + 'CMS/logout');
		} else {
			swal.close();
		}
	});
});
