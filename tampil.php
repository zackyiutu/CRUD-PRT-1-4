<?php
include 'database.php';
$db = new Database();
?>
<h1>CRUD OOP PHP</h1>
<h2>WWW.MALASNGODING.COM</h2>
<h3>Data User</h3>

<a href="input.php">Input Data</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Usia</th>
        <th>Opsi</th>
    </tr>
    <?php
    $no = 1;
    $data = $db->tampil_data();
    if (!empty($data)) {
        foreach ($data as $x) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $x['nama']; ?></td>
                <td><?php echo $x['alamat']; ?></td>
                <td><?php echo $x['usia']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $x['id']; ?>">Edit</a>
                    <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='5'>Data tidak tersedia</td></tr>";
    }
    ?>
</table>
