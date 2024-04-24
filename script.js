$(document).ready(function() {
    $("#form").submit(function(event) {
      event.preventDefault(); // Mencegah form dari submit default
  
      if ($("#nama").val() === "" || $("#email").val() === "" || $("#subject").val() === "" || $("#pesan").val() === "") {
        $("#alert-message").addClass("alert-danger").removeClass("alert-success").show();
        $("#alert-message-content").text("Semua kolom harus diisi!");
        return;
      }
  
      // Proses submit form ke server
      $.ajax({
        url: "simpan.php",
        method: "POST",
        data: $(this).serialize(),
        success: function(response) {
          if (response === "success") {
            $("#alert-message").addClass("alert-success").removeClass("alert-danger").show();
            $("#alert-message-content").text("Pesan Anda berhasil dikirim!");
            // Kosongkan form
            $("#form")[0].reset();
          } else {
            $("#alert-message").addClass("alert-danger").removeClass("alert-success").show();
            $("#alert-message-content").text("Gagal mengirim pesan. Coba lagi!");
          }
        },
        error: function() {
          $("#alert-message").addClass("alert-danger").removeClass("alert-success").show();
          $("#alert-message-content").text("Gagal mengirim pesan. Coba lagi!");
        }
      });
    });
  });