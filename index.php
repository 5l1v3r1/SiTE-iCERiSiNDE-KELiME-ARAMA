<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>ARAMA BOTU</title>
    <link rel="stylesheet" href="css/duzen.css" type="text/css" />
</head>
<body>
<div id="veriListesi">

<div id="aramaFormu">
        <form action="" method="POST">
        <input type="text" name="sitearama" id="s" onblur="if (value =='') {value = 'Ne aramıştınız?'}" onfocus="if (value == 'Ne aramıştınız?') {value =''}" type="text" value="Ne aramıştınız?" />
        <button type="submit">Ara</button>
        </form>
</div>
<?php 

$link        ="http://birsite.com/dusecek-domain-paylasimlari-hakkinda.html";
//html alanlarını bölerek ilerle
$bolbaslik        ='@<h1 class="entry-title">(.*?)</h1>@si';
$bolkategori      ='@<span class="categories-links">(.*?)</span>@si';
$boletiket        ='@span class="tags-links">(.*?)</span>@si';
$bolmakale        ='@<div class="entry-content">(.*?)</div>@si';
$bolyorum         ='@<div class="comment-content">(.*?)</div>@si';
$bolkisi          ='@<b class="fn">(.*?)</b>@si';

$botara=file_get_contents($link);
preg_match_all($bolbaslik, $botara, $baslik);
preg_match_all($bolkategori, $botara, $kategori);
preg_match_all($boletiket, $botara, $etiket);
preg_match_all($bolmakale, $botara, $makale);
preg_match_all($bolyorum, $botara, $yorum);
preg_match_all($bolkisi, $botara, $kisi);

 //strip_tag:html verilerini temizler
$sayfabaslik=strip_tags($baslik[0][0]);
$sayfakategori=strip_tags($kategori[0][0]);
$sayfaetiket=strip_tags($etiket[1][0]);
$sayfamakale=strip_tags($makale[1][0]);
$sayfayorum=strip_tags($yorum[1][0]);
$yorumyapankisi=strip_tags($kisi[1][0]);
echo "<b>BASLIK</b>";
    echo "</br>".$sayfabaslik."</br>";
echo "<b>KATEGORİ</b>";
    echo "</br>".$sayfakategori."</br>";
echo "<b>ETİKET</b>";
    echo "</br>".$sayfaetiket."</br>";
echo "<b>MAKALE</b>";
    echo "</br>".$sayfamakale."</br>";
echo "<b>YORUMLAR</b>";
    echo "</br>".$sayfayorum."</br>";
echo "<b>YORUM YAPAN KİSİ</b>";
    echo "</br>".$yorumyapankisi."</br>";

echo "<hr>";
echo "<hr>";
if($_POST)
{
    $ara=$_POST['sitearama'];

    if (stristr($sayfabaslik, $ara))
    {
         echo "<b><font color='#0000FF'>Aradığınız Kelime Başlığında Bulundu</b></font></br>";
         echo $sayfabaslik;
    }
    if (stristr($sayfakategori, $ara))
    {
        echo "<b><font color='#0000FF'>Aradığınız Kelime Kategorilerde Bulundu</b></font></br>";
         echo $sayfakategori;
    }
    if (stristr($sayfaetiket, $ara))
    {
         echo "<b><font color='#0000FF'>Aradığınız Kelime Etiketlerde Bulundu</b></font></br>";
         echo $sayfaetiket;
    }
    if (stristr($sayfamakale, $ara))
    {
         echo "<b><font color='#0000FF'>Aradığınız Kelime Makalede Bulundu</b></font></br>";
         echo $sayfamakale;
    }
    if (stristr($sayfayorum, $ara))
    {
         echo "<b><font color='#0000FF'>Aradığınız Kelime Yorumda Bulundu</b></font></br>";
         echo $sayfayorum;
    }
    if (stristr($yorumyapankisi, $ara))
    {
         echo "<b><font color='#0000FF'>Aradığınız Kelime Yorum Yapan Kişilerde Bulundu</b></font></br>";
         echo $yorumyapankisi;
    }
}

 ?>

</div>
</body>
</html>