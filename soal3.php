<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container">
        <h1>Table Person</h1>
        <?php
        $s_nama = '';
        $s_alamat = '';
        if (isset($_POST['search'])) {
            $s_nama = $_POST['nama'];
            $s_alamat = $_POST['alamat'];
        }


        ?>


        <form method="POST" action="">
            <div class="row my-3">
                <div calss="col-3">
                    <input name="search_nama" class="form-control mr-sm-2" type="search" placeholder="Cari Nama" aria-label="Search">
                </div>
                <div class="col-3">
                    <input name="search_alamat" class="form-control mr-sm-2" type="search" placeholder="Cari Alamat" aria-label="Search">
                </div>
                <button name="search" class=" btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Hobi</th>
                </tr>
            </thead>

            <?php
            include 'koneksi.php';
            $search_nama = '%' . $s_nama . '%';
            $search_alamat = '%' . $s_alamat . '%';
            $no = 1;
            $query = "SELECT * FROM person WHERE nama LIKE ? AND (nama LIKE ? OR alamat LIKE ?) ORDER BY id DESC";
            $dewan1 = $db1->prepare($query);
            $dewan1->bind_param('ssssss', $search_nama, $search_alamat);
            $dewan1->execute();
            $res1 = $dewan1->get_result();

            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $id = $row['id'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $alamat; ?></td>

                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan='7'>Tidak ada data ditemukan</td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>