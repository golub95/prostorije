<?


echo "<form method='post' action='k2-12.php'>
<input type='$BrojStudenataNaRoku'  name='broj1' placeholder='Upisite broj studenata.'>
<input type='$BrojGrupa'  name='broj2' placeholder='Upisite broj grupa.'>

<input type='submit'>
</form>";


$dimenzija=9;
//pojašnjenje BOJA => BROJ REDAKA, BROJ STUPACA, ŠIRINA SKUPINE
$struktura_ucionice=array(
'#ddd'=>array(5,10,50),
'#ccc'=>array(4,10,50),
//'green'=>array(5,22,100),
//'grey'=>array(6,10,50),
);



//-------------------DIV SOBA
echo "<div style='float:left;margin-right:4%;width:50%;border:2px solid #ccc;height:80%;
background:#eee;'>";
$BrojPraznihMjesta=1;

foreach($struktura_ucionice as $boja=>$podaci){ $odmakY=0;  $Brojac1=''; 



$x=$podaci[0]; $y=$podaci[1]; $sirina=$podaci[2]; $koeficijent=50/$sirina;


$sirinaStolice=6*$koeficijent; $visinaStolice=$dimenzija;


//-------------------DIV SKUPINA
echo "<div style='float:left;width:{$sirina}%;margin-top:10%;height:70%;'>
<div style='position:relative;float:left;width:100%;height:100%;'>";




for($i=1;$i<=$x;$i++){ $odmakY+=$dimenzija+2; $Brojac1++; 

for($j=1;$j<=$y;$j++) { $odmakX+=$dimenzija*$koeficijent; $Brojac2++;

$neparnosjedalo=($Brojac2)%2;
$parnosjedalo=($Brojac2+1)%2;
$parnired=($Brojac1+1)%2;
$neparnired=($Brojac1)%2;

$BrojStudenataNaRoku = $_POST['broj1'];
$BrojGrupa = $_POST['broj2'];


//raspored stolica
if ($BrojStudenataNaRoku==''){$StudentSjediTu++;}

//raspored sjedenja za jednu grupe
if($BrojGrupa==1){ 
if($neparnired and $neparnosjedalo) {$StudentSjediTu++;}
elseif( $parnired and $parnosjedalo ){$StudentSjediTu++;}


}

//raspored sjedenja za dvije grupe
if($BrojGrupa==2) { 
if($neparnired and $neparnosjedalo ){$StudentSjediTu++;}
if($neparnired and $parnosjedalo) {$StudentSjediTu++;} }

//raspored sjedenja tri grupe
if($BrojGrupa==3 ) { 
if($neparnired and $neparnosjedalo or $parnosjedalo or $Brojac1==1 or $Brojac1==$BrojRedovaSuma and $BrojRedovaSuma%2 ){$StudentSjediTu++;}
elseif( $parnired and $parnosjedalo ){$StudentSjediTu++;}
}


$SumaStudenata+=$StudentSjediTu;


//boja grupa
if($StudentSjediTu!=''){
if($BrojGrupa==1){ $bojaGrupe="background:blue;"; }
if($SumaStudenata>$BrojStudenataNaRoku){$bojaGrupe="background:gray";}
if($BrojGrupa==2){if ($neparnosjedalo){$bojaGrupe="background:blue;";}else{$bojaGrupe="background:green; ";}
if($SumaStudenata>$BrojStudenataNaRoku){$bojaGrupe="background:gray";}
}

if($BrojGrupa==3){
if($parnired==0){$bojaGrupe="background:blue;";} //grupaA
if($parnired==0 and $parnosjedalo) {$bojaGrupe="background:green;";} //grupaB
if($neparnired==0 and $parnosjedalo) {$bojaGrupe="background:red;";} //grupaC
if($SumaStudenata>$BrojStudenataNaRoku){$bojaGrupe="background:gray";}

}
}

echo "<div style='float:left;width:$sirinaStolice%;height:$visinaStolice%;position:absolute;
background:$boja;left:{$odmakX}%;top:{$odmakY}%;$bojaGrupe'>
<a style='color:#fff;font-size:50%;' href='?soba=$_GET[soba]&stolica={$redak}-{$stolica}'>";
if($StudentSjediTu){
if($SumaStudenata<=$BrojStudenataNaRoku){ echo "$SumaStudenata";}
elseif($SumaStudenata>$BrojStudenataNaRoku){ echo "$BrojPraznihMjesta";$BrojPraznihMjesta++;}
}
echo "</a></div>";




$StudentSjediTu=$bojaGrupe='';
                      }
                     
                      
$odmakX=0;
                    }
                   

if($_GET[stolica]=="$redak-$stolica"){echo "<form method='post'>";
echo "<input name='stolica' value='$redak-$stolica'>";
echo "</form>";}

//-------------------DIV SKUPINA KRAJ
echo "</div></div>";

}
$NemaMjesta=$BrojStudenataNaRoku-$SumaStudenata;


if ($BrojStudenataNaRoku<$SumaStudenata)
{
   echo "Broj slobodnih mjesta: ";
   echo abs($NemaMjesta) ;}
else {                   
echo "$NemaMjesta studenata ne moze se rasporediti.<br/>";}


echo "<br/>Broj sjedecih mjesta: $SumaStudenata.<br/>";
//-------------------DIV SOBA KRAJ
echo "</div>";



?>