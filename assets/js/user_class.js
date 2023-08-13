let card__course = document.getElementById("gallery__course");
let arrow__right = document.getElementById("right__gallery");
let course__counts = document.getElementsByClassName("gallery-card-lg").length;
let counter__to__left = 1;
let counter__to__right = course__counts;
let counter__margin = 0;

//Slide left per 300px
function slide__right() {
	if (counter__to__left < course__counts) {
		card__course.style.marginLeft = --counter__margin * 300 + "px";
		card__course.style.transition = "all 1s ease-in-out";
		counter__to__left++;
		counter__to__right--;
	}
	//left button gone when it reaches the end of the card
	if (counter__to__left == course__counts) {
		arrow__right.style.opacity = "0";
	}
}

// Slide right per 300px and show left button
function slide__left() {
	if (counter__to__right < course__counts) {
		arrow__right.style.opacity = "1";
		card__course.style.marginLeft = ++counter__margin * 300 + "px";
		card__course.style.transition = "all 1s ease-in-out";
		counter__to__right++;
		counter__to__left--;
	}
}
//Like Function
function unlikeFunction(clicked_id) {
	document.getElementById(clicked_id).className =
		"position-absolute bx bx-bookmark like_icon";
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

	document.getElementById(clicked_id - 1).remove();
}

// function likedFunction(clicked_id) {
//   document.getElementById(clicked_id).className =
//     "position-absolute bx bx-bookmark like_icon";
//   document.getElementById(clicked_id).id = --clicked_id;
//   Swal.fire({
//     position: "top-end",
//     icon: "success",
//     title: "Kelas telah Terhapus",
//     showConfirmButton: false,
//     timer: 1000,
//   });
//   document
//     .getElementById(clicked_id)
//     .setAttribute("onClick", "likeFunction(this.id)");
// }
