<?php

$konek = mysqli_connect("localhost", "root", "", "kontak") or die("Koneksi Gagal");

if(isset($_POST["submit"])) {
  if(empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["pesan"])) {
    echo "<script>
            alert('Gagal, tidak boleh ada yang kosong');
            window.location.href = 'index.php';
          </script>";
    exit; 
  }
  
  $namakamu = $_POST["nama"];
  $emailkamu = $_POST["email"];
  $judulkamu = $_POST["subject"];
  $pesankamu = $_POST["pesan"];

  $query = "INSERT INTO form (nama, email, subject, pesan) VALUES ('$namakamu', '$emailkamu', '$judulkamu', '$pesankamu')";
  $result = mysqli_query($konek, $query);
  
  if($result) {
    echo "<script>
            alert('Pesan kamu berhasil dikirim, terima kasih atas feedbacknya!');
            window.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal mengirim pesan, coba lagi nanti!');
            window.location.href = 'index.php';
          </script>";
  }
  

  mysqli_close($konek);
} else {
  echo "Form tidak disubmit";
}
?>
