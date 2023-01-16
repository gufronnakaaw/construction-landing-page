// global variable
const file_label = document.querySelector("#file-label");
const preview = document.querySelector("#preview");
const small_preview = document.querySelector("#small-preview");
let cropper;

$("#table-galleries").DataTable();

function showModal(modal, url) {
	$(modal).modal("show");
	preview.src = url;
}

// client pic save
const gallery_pic = document.querySelector("#gallery_pic");

if (gallery_pic) {
	gallery_pic.addEventListener("change", function (e) {
		const file = e.target.files[0];

		file_label.innerHTML = file.name;

		showModal("#modal-preview-galleries", URL.createObjectURL(file));

		$("#modal-preview-galleries")
			.on("shown.bs.modal", function () {
				cropper = new Cropper(preview, {
					aspectRatio: 16 / 9,
					viewMode: 3,
					preview: small_preview,
				});
			})
			.on("hidden.bs.modal", function () {
				cropper.destroy();
				cropper = null;
			});
	});

	document.querySelector("#btn-done").addEventListener("click", function () {
		const input = document.querySelector("input[name=gallery_pic]");
		input.value = cropper.getCroppedCanvas().toDataURL("image/png");
		$("#modal-preview-galleries").modal("hide");
	});
}

// service pic update
const gallery_pic_update = document.querySelector("#gallery_pic_update");

if (gallery_pic_update) {
	gallery_pic_update.addEventListener("change", function (e) {
		const file = e.target.files[0];

		file_label.innerHTML = file.name;

		showModal("#modal-preview-update-galleries", URL.createObjectURL(file));

		$("#modal-preview-update-galleries")
			.on("shown.bs.modal", function () {
				cropper = new Cropper(preview, {
					aspectRatio: 16 / 9,
					viewMode: 3,
					preview: small_preview,
				});
			})
			.on("hidden.bs.modal", function () {
				cropper.destroy();
				cropper = null;
			});
	});

	document.querySelector("#btn-done").addEventListener("click", function () {
		const input = document.querySelector("input[name=gallery_pic_update]");
		input.value = cropper.getCroppedCanvas().toDataURL("image/png");
		$("#modal-preview-update-galleries").modal("hide");
	});
}
