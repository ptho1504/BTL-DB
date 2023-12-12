<?php
include 'partials/header.php';
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$query = "DELETE BOOK where BOOKID = '$id' ;";


$persons = sqlsrv_query($conn, $query);
header("Location: manage_book.php");
?>

<?php
include 'partials/footer.php';
?>