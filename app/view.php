<?php
include_once('_header.php');
include('Class/UploadClass.php');
include('Class/PersonClass.php');

$upload = new Upload("picture");
$person = new Person();

$person->setName($_POST['name']);
$person->setSurname($_POST['surname']);
$person->setAddress($_POST['address']);
$person->setComments($_POST['comments']);
$person->setPicture($upload->getPath());


?>
<div class="col-3 card">
    <img class="card-img-top" src="<?= $person->getPicture() ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $person->getName() . ' ' . $person->getSurname() ?></h5>
        <p class="card-text"><?= $person->getComments(); ?></p>
    </div>
    <div class="card-footer">
        <small class="text-muted"><?= $person->getAddress(); ?></small>
    </div>
</div>
<?php include_once('_footer.php') ?>