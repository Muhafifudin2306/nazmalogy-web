document.addEventListener("DOMContentLoaded", function (event) {
	const showNavbar = (toggleId, navId, bodyId, headerId) => {
		const toggle = document.getElementById(toggleId),
			nav = document.getElementById(navId),
			bodypd = document.getElementById(bodyId),
			headerpd = document.getElementById(headerId);

		// Validate that all variables exist
		if (toggle && nav && bodypd && headerpd) {
			toggle.addEventListener("click", () => {
				// shows navbar
				nav.classList.toggle("shows");
				// change icon
				toggle.classList.toggle("bx-x");
				// add padding to body
				bodypd.classList.toggle("body-pd");
				// add padding to header
				headerpd.classList.toggle("body-pd");
			});
		}
	};

	showNavbar("header-toggle", "nav-bar", "body-pd", "header");

	/*===== LINK ACTIVE =====*/
	const linkColor = document.querySelectorAll(".nav_link");

	function colorLink() {
		if (linkColor) {
			linkColor.forEach((l) => l.classList.remove("active"));
			this.classList.add("active");
		}
	}
	linkColor.forEach((l) => l.addEventListener("click", colorLink));

	// Your code to run since DOM is loaded and ready
});

// var myLink = document.querySelector('a[href="#"]');
// myLink.addEventListener("click", function (e) {
//   e.preventDefault();
// });

//   Search
function searchToggle(obj, evt) {
	var container = $(obj).closest(".search-wrapper");
	if (!container.hasClass("actived")) {
		container.addClass("actived");
		evt.preventDefault();
	} else if (
		container.hasClass("actived") &&
		$(obj).closest(".input-holder").length == 0
	) {
		container.removeClass("actived");
		// clear input
		container.find(".search-input").val("");
	}
}

// Logut Function
function logOutFunction() {
	Swal.fire({
		title: "<h3 class='text-dark'> " + "Apakah anda ingin logout?" + "</h3>",
		text: "Aksi ini akan menutup sesi anda!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#2c2f75",
		cancelButtonColor: "#d33",
		confirmButtonText: "Logout!",
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire(
				"<h3 class='text-dark'> " + "Logout Sukses!" + "</h3>",
				"Anda telah keluar",
				"success"
			).then((result) => {
				if (result.isConfirmed) {
					window.location.href = "https://afifudin.site/auth/logout";
				}
			});
		}
	});
}

//Like Function
function likeFunction(clicked_id) {
	document.getElementById(clicked_id).className =
		"position-absolute bx bxs-bookmark like_icon";
	document.getElementById(clicked_id).id = ++clicked_id;
	Swal.fire({
		toast: true,
		position: "top-right",
		iconColor: "white",
		customClass: {
			popup: "colored-toast",
		},
		showConfirmButton: false,
		timer: 1500,
		timerProgressBar: true,
		icon: "success",
		title: "Kelas Tersimpan",
	});

	document
		.getElementById(clicked_id)
		.setAttribute("onClick", "likedFunction(this.id)");
}

function likedFunction(clicked_id) {
	document.getElementById(clicked_id).className =
		"position-absolute bx bx-bookmark like_icon";
	document.getElementById(clicked_id).id = --clicked_id;
	Swal.fire({
		toast: true,
		position: "top-right",
		iconColor: "white",
		customClass: {
			popup: "colored-toast",
		},
		showConfirmButton: false,
		timer: 1500,
		timerProgressBar: true,
		icon: "info",
		title: "Kelas Dihapus dari Wishlist",
	});
	document
		.getElementById(clicked_id)
		.setAttribute("onClick", "likeFunction(this.id)");
}

// Pagination
$(function () {
	var button = $(".button");

	function switchToNext() {
		var _this = $(this);

		if (_this.hasClass("active")) return false;
		else {
			$(".button.active").removeClass("active");
			_this.addClass("active");
		}
	}

	button.on("click", switchToNext);
});

// Tabin detail course
function openCity(cityName) {
	var i;
	var x = document.getElementsByClassName("city");
	var y = document.getElementsByClassName("tab-up");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
		for (j = 0; j < y.length; j++) {
			y[j].style.border = "none";
		}
	}
	document.getElementById(cityName).style.display = "block";
	document.getElementById(cityName + "1").style.borderBottom =
		"2px solid #2c2f75";
}

//Show Password
function showPassword() {
	let x = document.getElementById("passwordInput");

	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}
