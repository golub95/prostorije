<?

$dimenzija=8;

//pojašnjenje BOJA => BROJ REDAKA, BROJ STUPACA, ŠIRINA SKUPINE
$struktura_ucionice=array(
'#ddd'=>array(5,10,50),
'#ccc'=>array(4,10,50),
//'green'=>array(5,22,100),
//'grey'=>array(6,10,50),

);

$BrojStudenataNaRoku=95;
$BrojGrupa=2;


//-------------------DIV SOBA
echo "<div style='float:left;width:50%;border:2px solid #ccc;height:100%;
background:#eee;'>";


foreach($struktura_ucionice as $boja=>$podaci)

{ $odmakY=0;  $Brojac1='';
        
$x=$podaci[0]; $y=$podaci[1]; $sirina=$podaci[2]; $koeficijent=50/$sirina; 

$BrojRedovaSuma+=$x; $BrojStupaca+=$y; 

$sirinaStolice=6*$koeficijent; $visinaStolice=$dimenzija;

//-------------------DIV SKUPINA
echo "<div style='float:left;width:{$sirina}%;height:30%;'>
<div style='position:relative;float:left;width:100%;height:100%;'>";




for($i=1;$i<=$x;$i++){ $odmakY+=$dimenzija+2; $Brojac1++;
for($j=1;$j<=$y;$j++) { $odmakX+=$dimenzija*$koeficijent; $Brojac2++; 

$neparnosjedalo=($Brojac2)%2;
$parnosjedalo=($Brojac2+1)%2;
$parnired=($Brojac1+1)%2;
$neparnired=($Brojac1)%2;

//raspored sjedenja do dvije grupe
if($BrojGrupa>=2 and $BrojStudenataNaRoku>=$Brojac2){ if($Brojac1%2 and $neparnosjedalo){$StudentSjediTu++;}
elseif( $parnired and $parnosjedalo ){$StudentSjediTu++;} }
//raspored sjedenja tri grupe
if($BrojGrupa==3 ){ 
if($neparnired and $neparnosjedalo or($Brojac1==1 or $Brojac1==$BrojRedovaSuma) ){$StudentSjediTu++;}
elseif( $parnired and $parnosjedalo ){$StudentSjediTu++;} 
}


$SumaStudenata+=$StudentSjediTu;

//boja grupa
if($StudentSjediTu!=''){
//if($BrojGrupa==1){ $bojaGrupe="background:orange;"; }
//if($BrojGrupa==2){if($Brojac2%2){$bojaGrupe="background:blue;";}else{$bojaGrupe="background:green;";} }

if($BrojGrupa==3){
//if((($Brojac1+2)%3)==0) {$bojaGrupe="background:blue;";} //grupaA
//if((($Brojac1+1)%3)==0) {$bojaGrupe="background:green;";} //grupaB
//if((($Brojac1+0)%3)==0  or ($Brojac1==1 and $parnosjedalo) ){$bojaGrupe="background:red;";} //grupaC
}
}

echo "<div style='float:left;width:$sirinaStolice%;height:$visinaStolice%;position:absolute;
background:$boja;left:{$odmakX}%;top:{$odmakY}%;$bojaGrupe'>
<a style='color:#fff;font-size:50%;' href='?soba=$_GET[soba]&stolica={$redak}-{$stolica}'>";
if($StudentSjediTu) echo "$SumaStudenata";
echo "</a></div>";
$StudentSjediTu=$bojaGrupe='';
                      }
$odmakX=0;
                    }
$NemaMjesta=$BrojStudenataNaRoku-$SumaStudenata;                    
                    

if($_GET[stolica]=="$redak-$stolica"){echo "<form method='post'>";
echo "<input name='stolica' value='$redak-$stolica'>";
echo "</form>";}

//-------------------DIV SKUPINA KRAJ
echo "</div></div>";

}


//echo "$NemaMjesta studenata ne moze se rasporediti.<br />
//Broj redova je $BrojRedovaSuma <br/> Broj stupaca je $BrojStupaca";


//-------------------DIV SOBA KRAJ
echo "</div>";

?>