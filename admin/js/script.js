function addInput() {
  document.querySelector("#editPassword").innerHTML = `
        <div class="form-group">
        <label for="post_category">Password</label>
        <input type="password" class="form-control" name="user_password" value="" />
        </div>`;
}

$(document).ready(function() {
  ClassicEditor.create(document.querySelector("#body")).catch(error => {
    console.error(error);
  });

  $("#selectAllBoxes").click(function(event) {
    if (this.checked) {
      $(".checkBoxes").each(function() {
        this.checked = true;
      });
    } else {
      $(".checkBoxes").each(function() {
        this.checked = false;
      });
    }
  });

  var div_box = "<div id='load-screen'><div id='loading'></div></div>";
  $("body").prepend(div_box);

  $("#load-screen")
    .delay(0.01)
    .fadeOut(600, function() {
      $(this).remove();
    });
});
