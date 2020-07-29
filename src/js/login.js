$(document).ready(function() {
  $("#passwordIc").click(function() {
    if ($("#password_cus").attr("type") == "text") {
      $("#password_cus").attr("type", "password");
      $("#passwordIc").removeClass("fa-eye");
      $("#passwordIc").addClass("fa-eye-slash");
    } else {
      $("#password_cus").attr("type", "text");
      $("#passwordIc").removeClass("fa-eye-slash");
      $("#passwordIc").addClass("fa-eye");
    }
  });

  $("#emp").click(function() {
    $("#full").show();
    $("#emp").hide();
  });
  $("#full").click(function() {
    $("#emp").show();
    $("#full").hide();
  });
});
