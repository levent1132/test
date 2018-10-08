<?php
require("inc/fonk.php"); //veri tabanı bağlantısı gerçekleştiriliyor
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Invoice</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
<body>
<form name="invoice" method="post" action=""> <!--Formumuzu oluşturuyoruz. -->
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <h1>Edd Invoice</h1>
            </div>
            <div class="col-md-4 text-center">
                <input id="kaydet" name="kaydet" type="submit" value="Save" class="btn btn-success"/>
                <a href="index.php" id="iptal" class="btn btn-danger">Cancel</a>
                <!-- Kaydetme ve iptal butonlarımızı ekliyoruz. -->
            </div>
        </div>
        <div class="col-md-12">

            <!-- Tab ların menü kısmı, burada içeriklerin olduğu div ler ile id lerin aynı olması lazım -->
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#kisiselBilgitab" aria-controls="kisiselBilgitab"
                                                          data-toggle="tab">New Invoice Info</a></li>
               
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Fatura aldığımız div-->
                <div role="tabpanel" class="tab-pane active" id="kisiselBilgitab">
                    <br/>
                    <div class="col-md-6">
                        <table class="table-condensed">
                            <tr>
                                <td>NO:</td>
                                <td><input type="text" name="no" id="no" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Invoice Date:</td>
                                <td><input type="date" name="idate" id="idate" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Supply Date:</td>
                                <td><input type="date" name="sdate" id="sdate" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Comment:</td>
                                <td><input type="text" name="comment" id="comment" class="form-control"/></td>
                            </tr>
                        </table>
                    </div>

                </div>
              
            </div>
        </div>
    </div>
</form>


<?php
//formda kaydet butonuna basılıp basılmadığını kontrol ediyoruz.
if (isset($_POST['kaydet'])) {

    //fatura bilgileri veritabaına yazılıyor
    $sonuc = $baglanti->query(sprintf("INSERT INTO invoice (o_no, o_indate,o_supdate,o_comment) VALUES ('%s','%s','%s','%s')", ($_POST['no']), ($_POST['idate']), ($_POST['sdate']), ($_POST['comment'])));

    

    $baglanti->close(); //bağlantımızı sonlandırıyoruz
    header("location:index.php"); // index.php sayfasına geri dönüyoruz.
}
?>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>
