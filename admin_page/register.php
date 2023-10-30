<?php
session_start();
include 'koneksi.php';


if (isset($_POST['register'])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                    alert('Berhasil menambahkan user baru');
                </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .file-upload {
            background-color: #ffffff;
            width: 500px;
            margin: 0 auto;
            padding: 20px;
        }



        .file-upload-btn:hover {
            background: white;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #0d6efd;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #0d6efd;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color:  #0044aa;
            padding: 60px 0;
        }

        .drag-text h3:hover{
            color: #fff;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-floating mb-3 ">
                                            <input class="form-control" id="nama" type="text" placeholder="Nama"
                                                name="nama" />
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="alamat" type="text" placeholder="alamat"
                                                name="alamat" />
                                            <label for="alamat">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select form-select-lg mb-3" id="jenis_kelamin" type="text"
                                                placeholder="jenis_kelamin" name="jenis_kelamin" />
                                                <option selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="jenis_kelamin">Jenis_kelamin</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text"
                                                placeholder="name@example.com" name="username" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="row">
                                            <div class="form-floating mb-3 col">
                                                <input class="form-control" id="inputPassword" type="password"
                                                    placeholder="Password" name="password" />
                                                <label for="inputPassword" style="margin-left:12px">Password</label>
                                            </div>
                                            <div class="form-floating mb-3 col">
                                                <input class="form-control" id="inputPassword2" type="password"
                                                    placeholder="Password" name="password2" />
                                                <label for="inputPassword2" style="margin-left:12px">Konfirmasi
                                                    Password</label>
                                            </div>
                                        </div>
                                        <script class="jsbin"
                                            src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                        <div class="file-upload" name="gambar">
                                            <!-- <button class="file-upload-btn" type="button"
                                                    onclick="$('.file-upload-input').trigger( 'click' )">Add
                                                    Image</button> -->

                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" type='file' onchange="readURL(this);"
                                                    accept="user/gambar/" name="gambar"/>
                                                <div class="drag-text">
                                                    <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="user/gambar" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()"
                                                        class="remove-image">Remove <span class="image-title">Uploaded
                                                            Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {

                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        $('.image-upload-wrap').hide();

                                                        $('.file-upload-image').attr('src', e.target.result);
                                                        $('.file-upload-content').show();

                                                        $('.image-title').html(input.files[0].name);
                                                    };

                                                    reader.readAsDataURL(input.files[0]);

                                                } else {
                                                    removeUpload();
                                                }
                                            }

                                            function removeUpload() {
                                                $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                                                $('.file-upload-content').hide();
                                                $('.image-upload-wrap').show();
                                            }
                                            $('.image-upload-wrap').bind('dragover', function () {
                                                $('.image-upload-wrap').addClass('image-dropping');
                                            });
                                        </script>
                                        <div class="d-flex align-items-right justify-content-between mt-2 mb-0">
                                            <button type="submit" name="register"
                                                class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have account? login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-5">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Arka 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
<?php
include 'koneksi.php';

function registrasi($data)
{
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = strtolower(stripslashes($_POST['username']));
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    





    // cek username sudah ada atau belum
    include 'koneksi.php';
    $hasil = mysqli_query($koneksi, "select * from data_user where username='$username'");

    if (mysqli_fetch_assoc($hasil)) {
        echo "<script>
                    alert('Username ini sudah di pakai');
                </script>";
        return false;
    }

    // cek konfirmasi pasword
    if ($password !== $password2) {
        echo "<script>
                    alert('Password tidak sesuai');
                </script>";
        return false;
    }

    include 'koneksi.php';
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert ke database
    $rand = rand();
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ekstensi =  array('png','jpg','jpeg','gif');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
        if ($ukuran < 1044070) {
            $gambar = $rand . '_' . $filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'user/gambar/' . $rand . '_' . $filename);
            mysqli_query($koneksi, "insert into data_user values('', '$nama', '$alamat', '$jenis_kelamin', '$gambar', '$username', '$password')");
            echo "<script>
                    alert('Berhasil menambahkan user baru');
                </script>";
            header("location:login.php");
            return mysqli_affected_rows($koneksi);
        } else {
            header("location:index.php?alert=salah ukuran");
        }
    }
}


?>