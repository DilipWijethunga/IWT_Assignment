function snack(message, type, color,updatingId) {
  var snacksContainer = document.getElementById("snacks");

  var snackElmnt = document.createElement("div");

  snackElmnt.setAttribute("class", "snack hidden " + color);
  snackElmnt.innerHTML =
    message +
    '<div class="form-buttons-right">' +
    (type == "confirm"
      ? "<button onclick=\"window.location.href='delete_product.php?itemId="+updatingId+"'\" class=\"snack-button red\">Yes</button>"
      : "") +
    '<button onclick="hideSnack(event)" class="snack-button green">Cancel</button>' +
    "</div>";

  snacksContainer.appendChild(snackElmnt);

  snackElmnt.setAttribute("class", "snack " + color);
}

function hideSnack(e) {
  e.target.parentElement.parentElement.remove();
}

function showOverlay(mode,updatingId) {
  var popup = document.getElementById("popup");

  popup.setAttribute("class", "overlay");

  imageInput = document.getElementById("productImage");
  imageInputParent = imageInput.parentElement;

  document.getElementById('itemId').setAttribute('value',mode =='Update'?updatingId:'');

  if (mode != "Search") {
    imageInputParent.setAttribute("class", "form-control form-control-image");
    imageInput.required = true;
    document.getElementById('submitForm').setAttribute('method',"POST");

  } else {
    imageInputParent.setAttribute("class", "hidden");
    imageInput.required = false;
    document.getElementById('submitForm').setAttribute('method',"GET");
  }

  var elements = document.getElementsByClassName("mode");

  for (element of elements) {
    element.innerHTML = mode;
  }
}

function hideOverlay() {
  var popup = document.getElementById("popup");

  popup.setAttribute("class", "overlay hidden");
}

function submit(e) {
  e.preventDefault();

  snack("Successfully updated your record", "message", "green");

  hideOverlay();
}
