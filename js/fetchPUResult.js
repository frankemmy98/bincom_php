function selectPollingUnit() {
  let x = document.getElementById("polling_unit_result").value;

  $.ajax({
    url: "pollingUnitResults.php",
    method: "POST",
    data: {
      id: x,
    },
    success: function (data) {
      $("#display_PU_result").html(data);
    },
  });
}
