// Make Items in timeline appear based on viewport
// https://webdesign.tutsplus.com/tutorials/building-a-vertical-timeline-with-css-and-a-touch-of-javascript--cms-26528
// https://www.w3schools.com/howto/howto_css_timeline.asp
(function () {
	"use strict";

	// define variables
	var items = document.querySelectorAll(".timeline__container");

	// check if an element is in viewport
	// old: http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
	// https://stackoverflow.com/questions/487073/how-to-check-if-element-is-visible-after-scrolling
	function isScrolledIntoView(elem) {
		var docViewTop = $(window).scrollTop();
		var docViewBottom = docViewTop + $(window).height();
		var elemTop = $(elem).offset().top;
		var elemBottom = elemTop + $(elem).height();

		return elemTop + 150 <= docViewBottom && elemBottom - 150 >= docViewTop;
	}
	function callbackFunc() {
		for (var i = 0; i < items.length; i++) {
			if (isScrolledIntoView(items[i])) {
				items[i].classList.add("in-view");
			}
		}
	}

	// listen for events
	window.addEventListener("load", callbackFunc);
	window.addEventListener("resize", callbackFunc);
	window.addEventListener("scroll", callbackFunc);
	// Added manually
	window.addEventListener("click", callbackFunc);
})();

const stationenKarten = document.querySelectorAll(".timeline__container");
const resetCardEffects = document.querySelectorAll(".stationenWechseln");

resetCardEffects.forEach((el) =>
	el.addEventListener("click", () => {
		stationenKarten.forEach(function (el) {
			el.classList.remove("in-view");
		});
	})
);

// Design der Timeline Karten anpassen: Auf kleinen Bildschirmen ist es eine card-plain, auf grossen Bildschirmen eine normale card.
$(document).ready(function () {
	if ($(window).width() >= 992) {
		$(".card--WahlRigiBahn").removeClass("card-plain");
	}
	if ($(window).width() < 992) {
		$(".card--WahlRigiBahn").addClass("card-plain");
	}
});

$(window).resize(function () {
	if ($(window).width() >= 992) {
		$(".card--WahlRigiBahn").removeClass("card-plain");
	}
	if ($(window).width() < 992) {
		$(".card--WahlRigiBahn").addClass("card-plain");
	}
});

// Card Flip Über Rigi
$(".fact-card").on("click", function () {
	$(this).toggleClass("flipped");
});
