<?php
require("inc/fonk.php"); 
?>
<!doctype html>
<html lang="tr">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<head>
    <meta charset="UTF-8">
    <title>INVOICES</title>
</head>
<body>
<br>
<div class="container">
    <div class="col-md-8">
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>Invoice Date</th>
                <th>NO</th>
                <th>Supply</th>
                <th>Comment</th>
                <th colspan="2" class="text-center">Funtions</th>
            </tr>
            </thead>
            <tbody>
           
                <?php
            
            $sorgu = $baglanti->query("select * from invoice");
             while ($sonuc = $sorgu->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $sonuc["o_indate"] ?></td>
                    <td><?php echo $sonuc["o_no"] ?></td>
                    <td><?php echo $sonuc["o_supdate"] ?></td>
                    <td><?php echo $sonuc["o_comment"] ?></td>
                    <td class="text-center">
                        <a class="islem" href='duzenle.php?id=<?php echo $sonuc["id"] ?>'>
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="islem" href='sil.php?id=<?php echo $sonuc["id"] ?>'>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <a class="btn btn-primary" href="Ekle.php">New Add</a>
    </div>
</div>
</body>
</html>