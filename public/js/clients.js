// global variable
const file_label = document.querySelector("#file-label");
const preview = document.querySelector("#preview");
const small_preview = document.querySelector("#small-preview");
let cropper;

$("#table-clients").DataTable();

function showModal(modal, url) {
	$(modal).modal("show");
	preview.src = url;
}

// client pic save
const client_pic = document.querySelector("#client_pic");

if (client_pic) {
	client_pic.addEventListener("change", function (e) {
		const file = e.target.files[0];

		file_label.innerHTML = file.name;

		showModal("#modal-preview-clients", URL.createObjectURL(file));

		$("#modal-preview-clients")
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
		const input = document.querySelector("input[name=client_pic]");
		input.value = cropper.getCroppedCanvas().toDataURL("image/png");
		$("#modal-preview-clients").modal("hide");
	});
}

// client pic update
const client_pic_update = document.querySelector("#client_pic_update");

if (client_pic_update) {
	client_pic_update.addEventListener("change", function (e) {
		const file = e.target.files[0];

		file_label.innerHTML = file.name;

		showModal("#modal-preview-update-clients", URL.createObjectURL(file));

		$("#modal-preview-update-clients")
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
		const input = document.querySelector("input[name=client_pic_update]");
		input.value = cropper.getCroppedCanvas().toDataURL("image/png");
		$("#modal-preview-update-clients").modal("hide");
	});
}
