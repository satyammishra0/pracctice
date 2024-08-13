// overlapping circle

var body = document.getElementsByTagName("body")[0];

// add onclick of the body
body.addEventListener("click", function (e) {
  // Creating on the div
  var div = document.createElement("div");
  div.classList.add("active");

  // positioning it on the basis of the current cursor location and subtracting it with 50px
  div.style.left = e.pageX - 50 + "px";
  div.style.top = e.pageY - 50 + "px";

  // Getting all the existing circles on page
  var existingCircle = document.querySelectorAll(".active");

  // Adding current circle to body
  body.appendChild(div);

  // looping through all the circles
  existingCircle.forEach(function (circle) {
    // passing to the function and checking the possobility
    //   div -> currentlyMadeCircle circle-> existing circle which we got in this loop
    if (isOverlapping(div, circle)) {
      // if gets true make colour green
      div.style.background = "green";
    }
  });
});

function isOverlapping(div, circle) {
  // getBoundingClinetRect gives all the details of the respective div or element
  let rect1 = div.getBoundingClientRect();
  let rect2 = circle.getBoundingClientRect();

  // gets the center point of the using formula
  var diffX = Math.pow(
    rect2.left + rect2.width / 2 - (rect1.left + rect1.width / 2),
    2
  );
  var diffY = Math.pow(
    rect2.top + rect2.height / 2 - (rect1.top + rect1.height / 2),
    2
  );

  // calcuting distance between them using formula

  var distance = Math.sqrt(diffX + diffY);

  // if distance is greater than 100 then return true which means is overlapping as the total width will be 100 and it shws that it overlaps
  return distance < 100;
}
