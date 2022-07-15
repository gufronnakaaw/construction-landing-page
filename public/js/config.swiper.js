const swiper = new Swiper(".swiper", {
	// Optional parameters
	direction: "horizontal",
	loop: false,
	slidesPerView: 3,
	autoplay: {
		delay: 1800,
	},
	spaceBetween: 10,
	pagination: {
		el: ".swiper-pagination",
	},
});
