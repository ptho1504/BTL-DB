<?php
include 'partials/header.php';
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['c_id'])) {
    $c_id = $_POST['c_id'];
}
echo $id. " ";
echo $c_id;
$query = "SELECT  * FROM   PERSON WHERE PersonID = '$id' ";
$person = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($person, SQLSRV_FETCH_ASSOC);

?>
<section class="form__section d-flex justify-content-center align-items-center">
    <div class="container form__seaction-container d-flex justify-content-center flex-column m-auto">
        <h2 class="mt-5 text-center">Register</h2>
        <form  method="post" enctype="multipart/form-data" class="d-flex m-auto flex-column gap-2 w-100 justify-content-center align-items-center">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="c_id" value="<?= $c_id ?>">
            <div class="d-flex gap-1 flex-column w-50">
                <span class="w-100">Your ID</span>
                <input class="w-100" type="text" name="borrowID" placeholder="Your ID">
            </div>

            <button class="btn btn-primary" type="submit" name="submit">Update Person</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (isset($_POST['borrowID'])) {
                $borrowID = $_POST['borrowID'];
            }
            
            if (!$borrowID) {
                echo "Du lieu khong duoc phep de trong";
            }
            else {
                $query = "UPDATE BOOK_COPY (PhyBookID,CopyID) SET Availibility = 'False' WHERE PhyBookID = '$id' AND CopyID = '$c_id';";
                $persons = sqlsrv_query($conn, $query);
                // $query = "INSERT INTO BORROWER (BorrowerID, Restricted,MaxBorrowNo,StaffID) VALUES('$borrowID', '$id','$c_id','PHM0000126'); ";
                
                $query = "INSERT INTO BORROW_BOOK (BorrowerID, PhyBookID,CopyID,StaffID) VALUES('$borrowID', '$id','$c_id','PHM0000126'); ";
                $persons = sqlsrv_query($conn, $query);
                header("Location: manage_copy.php");
            }
        }
        ?>
    </div>
</section>

<?php
    include 'partials/footer.php';
?>