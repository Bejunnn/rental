<?php
include('../../koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM permintaan_opt");
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
session_start();
if (!isset($_SESSION['sebagai'])) {
    header("Location: ../index.php");
}

if (isset($_SESSION['sebagai'])) {
    if ($_SESSION['sebagai'] == 'ga') {
        header('Location: ga.php');
        exit;
    } elseif ($_SESSION['sebagai'] == 'karyawan') {
        header("Location: karyawan.php");
        exit;
    } elseif ($_SESSION['sebagai'] == 'admin_hr') {
        header("Location: admin_hr.php");
        exit;
    }
}
?>
<html>

<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Data Akomodasi</h2>
        <div class="data-tables datatable-dark">

            <table class="table table-bordered" id="mauexport" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Kota Tujuan</th>
                        <th>Kendaraan</th>
                        <th>Pengeluaran</th>
                        <th>Status Pengeluaran</th>
                        <th>Status Perjalanan</th>
                    </tr>
                </thead>
                <?php
                $no = '1';
                foreach ($rows as $data) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_pemesan']; ?></td>
                            <td><?= $data['kota_tujuan']; ?></td>
                            <td><?= $data['kendaraan']; ?></td>
                            <td><?= $data['pengeluaran']; ?></td>
                            <td><?= $data['status_pengeluaran']; ?></td>
                            <td><?= $data['status_perjalanan']; ?></td>
                        </tr>
                    <?php
                }
                    ?>
                    </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>