<?php
require("inc/fonk.php"); //veri tabanı bağlantısı gerçekleştiriliyor


//formda kaydet butonuna basılıp basılmadığını kontrol ediyoruz.
if (isset($_POST['kaydet'])) {

    $id = $_GET["id"];

    
    //fatura  bilgileri veritabaına yazılıyor
    $sonuc = $baglanti->query(sprintf("UPDATE invoice SET o_no='%s', o_indate='%s', o_supdate='%s', o_comment='%s' WHERE  id=$id", ($_POST['no']), ($_POST['idate']), ($_POST['sdate']), ($_POST['comment'])));


   
    $baglanti->close(); //bağlantımızı sonlandırıyoruz
    header("location:index.php"); // index.php sayfasına geri dönüyoruz.
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Invoice</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
<body>
<form name="invoice" method="post" action=""> <!--Formumuzu oluşturuyoruz. -->
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <h1>Edit Invoice</h1>
            </div>
            <div class="col-md-4 text-center">

                <input id="kaydet" name="kaydet" type="submit" value="Save" class="btn btn-success"/>
                <a href="index.php" id="iptal" class="btn btn-danger">Cancel</a>
               
            </div>
        </div>
        <div class="col-md-12">
            
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#kisiselBilgitab" aria-controls="kisiselBilgitab" data-toggle="tab">Invoice Info</a>
                </li>
                
            </ul>
            
            <div class="tab-content">
                
                <div role="tabpanel" class="tab-pane active" id="kisiselBilgitab">
                    <br/>
                    <?php
                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];

                        $sorgu = $baglanti->query("select * from invoice where id=$id");
                        $sonuc = $sorgu->fetch_assoc();
                    } else
                        header("location:index.php");
                    ?>

                    <div class="col-md-6">
                        <table class="table-condensed">
                            <tr>
                                <td>NO</td>
                                <td><input type="text" name="no" id="no" value="<?php echo $sonuc['o_no'] ?>"
                                           class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Invoice Date</td>
                                <td><input type="date" name="idate" id="idate" value="<?php echo $sonuc['o_indate'] ?>"
                                           class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Supply Date</td>
                                <td><input type="date" name="sdate" id="sdate" value="<?php echo $sonuc['o_supdate'] ?>"
                                           class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Comment:</td>
                                <td><input type="text" name="comment" id="comment" value="<?php echo $sonuc['o_comment'] ?>"
                                           class="form-control"/></td>
                            </tr>

                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>
</html>
