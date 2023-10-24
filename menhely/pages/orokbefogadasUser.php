<h1>Az örökbefogadás kezdete</h1>
<?php
$userid= $_SESSION ['user']['userid'];
$allatid= filter_input(INPUT_GET, "allatid") ;
$allat=$db->getKivalasztottAllat($allatid);
if (filter_input(INPUT_POST, "orokbefogadas", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $allatid= filter_input(INPUT_POST, "allatid", FILTER_VALIDATE_INT);
    $userid= filter_input(INPUT_POST, "userid", FILTER_VALIDATE_INT);
    echo 'rögzítés';
}
var_dump($_SESSION);
echo '<p>Valóban szeretné a '.$allat['allat_neve'].' nevű állatunkat örökbe fogadni?</p>';
//- INSERT INTO `orokbefogadas` (`allatid`, `userid`) VALUES ('3', '1');
if ($db->setOrokbefogadas($allatid, $_SESSION ['user']['userid'])) {
    header('location: index.php?menu=home');
} else {
    echo 'Sikertelen rögzítés';
}
?>
<form method="POST">
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
    <input type="hidden" name="allatid" value="<?php echo $allatid; ?>">
<button type="submit" class="btn btn-danger" name="orokbefogadas" value="1">Igen</button>
<a href="index.php?menu=home" class="btn btn-light">Mégsem</a>
</form>