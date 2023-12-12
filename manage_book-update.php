<?php
include 'partials/header.php';
?>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$query = "SELECT  * FROM  BOOK WHERE BOOKID = '$id' ";
$book = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($book, SQLSRV_FETCH_ASSOC);

?>
<section class="form__section d-flex justify-content-center align-items-center">
    <div class="container form__seaction-container d-flex justify-content-center flex-column m-auto">
        <h2 class="mt-5 text-center">Edit Book</h2>
        <form method="post" enctype="multipart/form-data" class="d-flex m-auto flex-column gap-2 w-100 justify-content-center align-items-center">
            <input type="hidden" name="id" value="<?= $row['BOOKID'] ?>">
            <div class="d-flex gap-1 flex-column w-50">
                <span class="w-100">Title</span>
                <input class="w-100" type="text" name="title" placeholder="First Name" value="<?= $row['Title'] ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Category</span>
                <input class="w-100" type="text" name="category" placeholder="Last Name" value="<?= $row['Category'] ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Publisher Name</span>
                <input class="w-100" type="text" name="pname" placeholder="Mid Name" value="<?= $row['Publishername'] ?>">
            </div>
            <div class="d-flex gap-1 flex-column  w-50">
                <span class="w-100">Number of copy</span>
                <input class="w-100" type="number" name="numcopy" placeholder="Mid Name" value="<?= $row['numofcopies'] ?>">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Update Book</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (isset($_POST['title'])) {
                $title = $_POST['title'];
            }
            if (isset($_POST['category'])) {
                $category = $_POST['category'];
            }
            if (isset($_POST['numcopy'])) {
                $numcopy = $_POST['numcopy'];
            }
            if (isset($_POST['pname'])) {
                $pname = $_POST['pname'];
            }
            if (!$title || !$category || !$numcopy || !$pname) {
                echo "Du lieu khong duoc phep de trong";
            } else {
                $query = "UPDATE BOOK SET title='$title', Category='$category', numofcopies=$numcopy, Publishername='$pname' WHERE BOOKID = '$id';";
                
                $books = sqlsrv_query($conn, $query);
                header("Location: manage_book.php");
            }
        }
        ?>
    </div>
</section>

<?php
include 'partials/footer.php';
?>