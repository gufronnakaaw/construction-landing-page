const swiper = new Swiper(".swiper", {
	// Optional parameters
	direction: "horizontal",
	loop: false,
	slidesPerView: 3,
	autoplay: {
		delay: 1500,
	},
	spaceBetween: 10,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	breakpoints: {
		480: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
	},
});
