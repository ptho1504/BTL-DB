<?php
include 'partials/header.php';
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$query = "DELETE PERSON where PersonID = '$id' ;";


$persons = sqlsrv_query($conn, $query);
header("Location: manage_person.php");
?>

<?php
include 'partials/footer.php';
?>