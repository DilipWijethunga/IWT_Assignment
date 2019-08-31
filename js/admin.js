function snack(message, type, color) {
  var snacksContainer = document.getElementById("snacks");

  var snackElmnt = document.createElement("div");

  snackElmnt.setAttribute("class", "snack hidden " + color);
  snackElmnt.innerHTML =
    message +
    '<div class="form-buttons-right">' +
    (type == "confirm"
      ? "<button onclick=\"snack( 'You have successfully completed your message.','message','green' );hideSnack(event)\" class=\"snack-button red\">Yes</button>"
      : "") +
    '<button onclick="hideSnack(event)" class="snack-button green">Cancel</button>' +
    "</div>";

  snacksContainer.appendChild(snackElmnt);

  snackElmnt.setAttribute("class", "snack " + color);
}

function hideSnack(e) {
  e.target.parentElement.parentElement.remove();
}

function showOverlay(mode) {
  var popup = document.getElementById("popup");

  popup.setAttribute("class", "overlay");

  imageInput = document.getElementById('productImage').parentElement;

  if(mode!='Search'){
    imageInput.setAttribute('class','form-control form-control-image');
  } else {
    imageInput.setAttribute('class','hidden');
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
  
  hideOverlay();

  return false;
}
