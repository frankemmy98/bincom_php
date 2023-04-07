function selectLGA() {
  let x = document.getElementById("lga_result").value;

  $.ajax({
    url: "lgaResults.php",
    method: "POST",
    data: {
      id: x,
    },
    success: function (data) {
      $("#display_LGA_result").html(data);
    },
  });
}
