//   tabs in  blogs-page
function showTab(tabNumber) {
  // Hide all tab contents
  var tabContents = document.getElementsByClassName("tab-contents");
  for (var i = 0; i < tabContents.length; i++) {
    tabContents[i].classList.remove("active");
  }

  // Remove 'active' class from all buttons
  var tabButtons = document.getElementsByClassName("btn-block");
  for (var i = 0; i < tabButtons.length; i++) {
    tabButtons[i].classList.remove("active");
  }

  // Show the selected tab content
  document.getElementById("tab" + tabNumber).classList.add("active");

  // Mark the clicked button as active
  document.getElementById("tab" + tabNumber + "btn").classList.add("active");
}

// loader code

document.addEventListener("DOMContentLoaded", function () {
  // Display the loader initially

  document.getElementById("loader").style.display = "block";
  // Simulate a delay of 3 seconds for the home page to load
  setTimeout(function () {
    // Hide the loader after 3 seconds
    document.getElementById("loader").style.display = "none";
    // Display the page content
    document.getElementById("page-content").style.visibility = "visible";
  }, 2000);
});




