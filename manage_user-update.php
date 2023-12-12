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

$query = "SELECT  * FROM   USER_table WHERE UserID = '$id' ";
$user = sqlsrv_query($conn, $query);
$_row = sqlsrv_fetch_array($user, SQLSRV_FETCH_ASSOC);
?>
<section class="form__section d-flex justify-content-center align-items-center">
    <div class="container form__seaction-container d-flex justify-content-center flex-column m-auto">
        <h2 class="mt-5 text-center">Edit User</h2>
        <form method="post" enctype="multipart/form-data" class="d-flex m-auto flex-column gap-2 w-100 justify-content-center align-items-center">
            <input type="hidden" name="id" value="<?= $row['PersonID'] ?>">
            <div class="d-flex gap-1 flex-column w-50">
                <span class="w-100">First Name</span>
                <input class="w-100" type="text" name="fname" placeholder="First Name" value="<?= $row['FName'] ?>" required>
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Last Name</span>
                <input class="w-100" type="text" name="lname" placeholder="Last Name" value="<?= $row['LName'] ?>" required>
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Mid Name</span>
                <input class="w-100" type="text" name="mname" placeholder="Mid Name" value="<?= $row['Minit'] ?>" required>
            </div>
            <div class="d-flex gap-1 w-50 m-2 align-items-center gap-2 flex-row">
                <span class="checkmark"></span>Female
                <input type="radio" name="sex" value="F" checked>
                <span class="checkmark"></span>Male
                <input type="radio" name="sex" value="M">
            </div>
            <div class="d-flex gap-1 flex-column w-50">
                <span class="w-100">Date of Birth</span>
                <input class="w-100" type="text" name="dob" placeholder="First Name" value="<?= $_row["DateofBirth"]->format("Y-m-d") ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Phone Number</span>
                <input class="w-100" type="text" name="phone" placeholder="Last Name" value="<?= $_row['Phone'] ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Email</span>
                <input class="w-100" type="email" name="email" placeholder="Mid Name" value="<?= $_row['Email'] ?>" required>
            </div>

            <button class="btn btn-primary" type="submit" name="submit">Update User</button>
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
            if (isset($_POST['dob'])) {
                $dob = $_POST['dob'];
            }
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
            }
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            if (!$fname || !$lname || !$mname || !$sex || !$dob || !$phone || !$email) {
                echo "Du lieu khong duoc phep de trong";
            } else {
                $query = "exec UPDATE_USER @Lname='$lname', @Fname='$fname', @Minit='$mname',@Dob='$dob',@Phone='$phone',@Email='$email', @Sex='$sex', @UserID ='$id';"; 
                
                
                $users = sqlsrv_query($conn, $query);
                header("Location: manage_user.php");
            }
        }
        ?>
    </div>
</section>

<?php
include 'partials/footer.php';
?>