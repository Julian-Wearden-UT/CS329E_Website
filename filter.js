// // Filterable Divs
$(function () {
  $("#All").prop("checked", true);
  $(".filterbtn").click(function () {
    const filterClass = this.value;
    if ($(this).prop("checked") == true) {
      currFilters.push(filterClass);
      // Remove 'All' filter unless it's what's clicked
      if ((filterClass !== "store-feature") && (currFilters.includes("store-feature"))) {
        currFilters.splice(currFilters.indexOf("store-feature"), 1);
        $("#All").prop("checked", false);
      }
      else if (filterClass == "store-feature") {
        currFilters = [];
        currFilters.push(filterClass);
        $(".filterbtn").prop("checked", false);
        $("#All").prop("checked", true);
      }
      // Check if a subcategory all is clicked
      if (filterClass == "all") {
        let subcats = filterMap[filterClass];
        for (const cat of subcats) {
          if (currFilters.includes(cat)) {
            currFilters.splice(currFilters.indexOf(cat), 1);
            $("#" + cat[0].toUpperCase() + cat.slice(1)).prop("checked", false);
          }
        }
      }
    }
    else if ($(this).prop("checked") == false) {
      currFilters.splice(currFilters.indexOf(filterClass), 1);
      if (currFilters.length < 1) currFilters.push("store-feature");
    }
    filterSelection();
  });
  filterSelection();
});

var currFilters = ["store-feature"];
var filterMap = { "all": ["retail", "jewelry", "food", "art", "boutique", "cosmetics", "snacks", "drinks", "pets", "desserts", "toys"]};

function filterSelection() {
  var storeFeaturesArr, idx;
  storeFeaturesArr = document.getElementsByClassName("store-feature");
  for (idx = 0; idx < storeFeaturesArr.length; idx++) {

    // prematurely hide the element
    removeClass(storeFeaturesArr[idx], "show");

    // check if it should be shown
    const currClassStr = storeFeaturesArr[idx].className;
    let elementClassArr = currClassStr.split(' ');
    let filterMatch = false;
    elementClassArr.forEach((classTag) => {
      if (currFilters.includes(classTag)) filterMatch = true;
    });
    if (filterMatch) {
      addClass(storeFeaturesArr[idx], "show");
    }
  }
}

// Show filtered elements
function addClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function removeClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}