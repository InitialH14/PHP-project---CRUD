<!DOCTYPE html>
<html lang="en">

<?php
require 'konektor1.php';

if(isset($_POST["submit"])) {
    $email1 = $_POST["email"];
    $password_input = md5($_POST["password"]);
    $hasil = mysqli_query($conn, "SELECT * FROM data_akses WHERE email='$email1' AND password1='$password_input'");
    $isTrue = "black";
    $salah = false;

    if($hasil != null) {
        $row_count = mysqli_num_rows($hasil);

        if($row_count > 0) {
            header("location: ./src/home.php");
        } else {
            $isTrue = "red";
            $salah = true;
        }
    } else {
        echo "Query failed: ".mysqli_error($conn);
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .px-5 {
            padding-left: 6rem !important;
            padding-right: 6rem !important;
        }

        .salah {
            border-color:
                <?php echo $isTrue ?>
            ;
        }
    </style>
</head>

<body>
    <div class="d-inline-flex w-100 vh-100">
        <div class="w-50 h-100">
            <div class="w-100 h-10 p-4">
                <img src="./image/unnes-2.png" alt="logo unnes" width="80" height="110" />
            </div>
            <div class="w-100 px-5 py-4">
                <h2>Selamat Datang di Laman Sistem Informasi Projek Akhir</h2>
                <p>Harap masukkan data yang benar</p>


                <form class="mt-5" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control salah" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="ex: nama@students.unnes.ac.id">
                        <!-- <?php
                        // echo $isTrue ? "<p style='color: red'>*Mohon isi dengan benar</p>" : '';
                        // ?> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control salah" id="password1">
                        <!-- <?php
                        // echo $isTrue ? "<p style='color: red'>*Mohon isi dengan benar</p>" : '';
                        // ?> -->
                        <div class="mt-3">
                            <input type="checkbox" onclick="showPassword()" class="me-2" id="inputGroup-sizing-lg">Show
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Login</button>

                </form>
            </div>
        </div>
        <div class="w-50 h-100">
            <img src="./image/study.jpg" alt="belajar" style="width: 50vw; height: 75vh; margin-top: 8vw;">
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        function showPassword() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</html>