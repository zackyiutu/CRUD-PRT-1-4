<?php
include 'database.php';
$db = new Database();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $db->edit($id);
    if($data) {
?>

<h1>CRUD OOP PHP</h1>
<h2>WWW.MALASNGODING.COM</h2>
<h3>Edit Data User</h3>

<form action="proses.php?aksi=update" method="post">
    <?php foreach($data as $d) { ?>
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                <input type="text" name="nama" value="<?php echo $d['nama'] ?>">
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
        </tr>
        <tr>
            <td>Usia</td>
            <td><input type="text" name="usia" value="<?php echo $d['usia'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    <?php } ?>
</form>

<?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
