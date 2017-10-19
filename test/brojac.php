<?

class brojac {
function brojac ($od,$do,$korak){ /*klasa brojac imat će
konstruktorsku funkciju koja ce inicijalizirati varijable od
do korak broj*/
$this->od=$od; /*možemo vidjeti $this varijablu. Ona služi
za dohvaćanje varijabli unutar istog objekta*/
$this->do=$do;
$this->korak=$korak;
$this->broj=$this->od;
}
var $izvrsen=0; /*definirat ćemo jednu varijablu izvršeno
koja ce nam vraćati broj izvrsenja petlje*/
function radi(){ /*definirat ćemo funkciju radi koja će
brojati*/
while($this->broj+$this->korak<=$this->do){
$this->izvrsen++;
$this->mat(); /*pozivamo drugu funkciju (metodu) klase -
nije nuzno tako komplicirati stvari ovo je radi primjera */
$this->ispisi(); /*pozivamo drugu funkciju (metodu) klase
kako bismo ispisali svaki izvršeni broj*/
}
}
function ispisi(){
echo $this->broj.",";
}
function mat(){
$this->broj=$this->broj+$this->korak;
}
}
$brojac1 = new brojac(0,84,2); /*Da bismo koristili ovu
klasu moramo kreirati instancu objekta*/
$brojac1->radi();/*Nakon toga pozvati ćemo metodu radi()*/

?>