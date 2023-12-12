<?php
include 'partials/header.php';
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$query = "EXEC DELETE_USER @UserID = '$id'";


$users = sqlsrv_query($conn, $query);
header("Location: manage_user.php");
?>

<?php
include 'partials/footer.php';
?>