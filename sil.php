<?php
if($_GET["id"]) {
    require("inc/fonk.php"); //veri tabanı bağlantısını sağlıyoruz

    //Get ile gelen id integer türüne pars edip değişkende tutuyoruz
    $ogrid = (int)$_GET["id"];

    //fatura bilgisini siliyoruz
    $baglanti->query("DELETE FROM invoice WHERE  id=$ogrid");

    //index sayfamıza geri dönüyoruz.
    header("location:index.php");
    
}
//Eğer get ile veri gelmemişse index sayfasına dönüyoruz
header("location:index.php");