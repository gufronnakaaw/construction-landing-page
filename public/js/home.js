// fsLightbox.props.type = "image";

document.addEventListener("DOMContentLoaded", () => {
	// Get all "navbar-burger" elements
	const $navbarBurgers = Array.prototype.slice.call(
		document.querySelectorAll(".navbar-burger"),
		0
	);

	// Add a click event on each of them
	$navbarBurgers.forEach((el) => {
		el.addEventListener("click", () => {
			// Get the target from the "data-target" attribute
			const target = el.dataset.target;
			console.log(target);
			const $target = document.getElementById(target);

			// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
			el.classList.toggle("is-active");
			$target.classList.toggle("is-active");
		});
	});
});

$(".whatsapp").floatingWhatsApp({
	phone: "081287624008",
	popupMessage:
		"Anda dapat mengirim pesan melalui whatsapp ini untuk konsultasi.",
	showPopup: true,
	zIndex: 999,
	size: "60px",
});
