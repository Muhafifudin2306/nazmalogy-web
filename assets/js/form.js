// Open and close form
function openFormInfo() {
  document.getElementById("display__info__content").style.display = "none";
  document.getElementById("edit__info__content").style.display = "inline";
  document.getElementById("edit__button__info").style.display = "none";
  document.getElementById("show__button__info").style.display = "inline";
}
function closeFormInfo() {
  document.getElementById("display__info__content").style.display = "inline";
  document.getElementById("edit__info__content").style.display = "none";
  document.getElementById("edit__button__info").style.display = "inline";
  document.getElementById("show__button__info").style.display = "none";
}
function openFormProfile() {
  document.getElementById("show__form__profile").style.display = "inline";
  document.getElementById("close__form__profile").style.display = "none";
}
function closeFormProfile() {
  document.getElementById("show__form__profile").style.display = "none";
  document.getElementById("close__form__profile").style.display = "inline";
}
