<?

$dimenzija=8;
//pojašnjenje BOJA => BROJ REDAKA, BROJ STUPACA, ŠIRINA SKUPINE
$skupine=array(
'orange'=>array(7,10,50),
'red'=>array(4,10,50),
//'green'=>array(5,22,100),
//'grey'=>array(6,10,50),
);

$BrojStudenataNaRoku=76;
$BrojGrupa=1;

//-------------------DIV SOBA
echo "<div style='float:left;width:50%;border:2px solid #ccc;height:100%;
background:#eee;'>";

foreach($skupine as $boja=>$podaci){ $odmakY=0;

$x=$podaci[0]; $y=$podaci[1]; $sirina=$podaci[2]; $koeficijent=50/$sirina;

$sirinaStolice=6*$koeficijent; $visinaStolice=$dimenzija;


//-------------------DIV SKUPINA
echo "<div style='float:left;width:{$sirina}%;height:30%;'>
<div style='position:relative;float:left;width:100%;height:100%;'>";


for($i=1;$i<=$x;$i++){ $odmakY+=$dimenzija+2; $Brojac1++;

for($j=1;$j<=$y;$j++) { $odmakX+=$dimenzija*$koeficijent; $Brojac2++;

if($Brojac1%2 and $Brojac2%2){$StudentSjediTu++;}
elseif( ($Brojac1+1)%2 and ($Brojac2+1)%2 ){$StudentSjediTu++;}

$SumaStudenata+=$StudentSjediTu;

//if($Brojac2%2){$StudentSjediTu++;}
echo "<div style='float:left;width:;height:$visinaStolice%;position:absolute;
background:$boja;left:{$odmakX}%;top:{$odmakY}%;'>
<a style='color:#fff;font-size:50%;' href='?soba=$_GET[soba]&stolica={$redak}-{$stolica}'>";

if($StudentSjediTu) echo "$SumaStudenata";
echo "</a></div>";
$StudentSjediTu='';
                      }
$odmakX=0;
                    }
$NemaMjesta=$BrojStudenataNaRoku-$SumaStudenata;                    
                    

//if($_GET[stolica]=="$redak-$stolica"){echo "<form method='post'>";
//echo "<input name='stolica' value='$redak-$stolica'>";
//echo "</form>";}

//-------------------DIV SKUPINA KRAJ
echo "</div></div>";

}

echo "$NemaMjesta studenata ne moze se rasporediti";

//-------------------DIV SOBA KRAJ
echo "</div>";

?>
