<?php
include 'partials/header.php';
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$query = "SELECT  * FROM   PERSON WHERE PersonID = '$id' ";
$person = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($person, SQLSRV_FETCH_ASSOC);

?>
<section class="form__section d-flex justify-content-center align-items-center">
    <div class="container form__seaction-container d-flex justify-content-center flex-column m-auto">
        <h2 class="mt-5 text-center">Edit Person</h2>
        <form  method="post" enctype="multipart/form-data" class="d-flex m-auto flex-column gap-2 w-100 justify-content-center align-items-center">
            <input type="hidden" name="id" value="<?= $row['PersonID'] ?>">
            <div class="d-flex gap-1 flex-column w-50">
                <span class="w-100">First Name</span>
                <input class="w-100" type="text" name="fname" placeholder="First Name" value="<?= $row['FName'] ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Last Name</span>
                <input class="w-100" type="text" name="lname" placeholder="Last Name" value="<?= $row['LName'] ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Mid Name</span>
                <input class="w-100" type="text" name="mname" placeholder="Mid Name" value="<?= $row['Minit'] ?>">
            </div>
            <div class="d-flex gap-1 w-50 m-2 align-items-center gap-2 flex-row">
                <span class="checkmark"></span>Female
                <input type="radio" name="sex" value="F">
                <span class="checkmark"></span>Male
                <input type="radio" name="sex" value="M">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Update Person</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (isset($_POST['fname'])) {
                $fname = $_POST['fname'];
            }
            if (isset($_POST['lname'])) {
                $lname = $_POST['lname'];
            }
            if (isset($_POST['mname'])) {
                $mname = $_POST['mname'];
            }
            if (isset($_POST['sex'])) {
                $sex = $_POST['sex'];
            }
            if (!$fname || !$lname || !$mname || !$sex) {
                echo "Du lieu khong duoc phep de trong";
            }
            else {
                $query = "UPDATE PERSON SET LName='$lname', FName='$fname', Minit='$mname', Sex='$sex' WHERE PersonID = '$id';";
                $persons = sqlsrv_query($conn, $query);
                header("Location: manage_person.php");
            }
        }
        ?>
    </div>
</section>

<?php
    include 'partials/footer.php';
?>