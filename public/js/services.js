// global variable
const file_label = document.querySelector("#file-label");
const preview = document.querySelector("#preview");
const small_preview = document.querySelector("#small-preview");
let cropper;

$("#table-services").DataTable();

function showModal(modal, url) {
	$(modal).modal("show");
	preview.src = url;
}

// client pic save
const service_pic = document.querySelector("#service_pic");

if (service_pic) {
	service_pic.addEventListener("change", function (e) {
		const file = e.target.files[0];

		file_label.innerHTML = file.name;

		showModal("#modal-preview-services", URL.createObjectURL(file));

		$("#modal-preview-services")
			.on("shown.bs.modal", function () {
				cropper = new Cropper(preview, {
					aspectRatio: 1 / 1,
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
		const input = document.querySelector("input[name=service_pic]");
		input.value = cropper.getCroppedCanvas().toDataURL("image/png");
		$("#modal-preview-services").modal("hide");
	});
}

// service pic update
const service_pic_update = document.querySelector("#service_pic_update");

if (service_pic_update) {
	service_pic_update.addEventListener("change", function (e) {
		const file = e.target.files[0];

		file_label.innerHTML = file.name;

		showModal("#modal-preview-update-services", URL.createObjectURL(file));

		$("#modal-preview-update-services")
			.on("shown.bs.modal", function () {
				cropper = new Cropper(preview, {
					aspectRatio: 1 / 1,
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
		const input = document.querySelector("input[name=service_pic_update]");
		input.value = cropper.getCroppedCanvas().toDataURL("image/png");
		$("#modal-preview-update-services").modal("hide");
	});
}
