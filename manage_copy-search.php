<?php
include 'partials/header.php';
?>

<?php
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}



$query = "exec SelectNameBorrower @BookTitle = '$title';";
$result  = sqlsrv_query($conn, $query);

?>
<section class="empty__page">
    <div class="d-flex flex-column px-5 my-2">
        <h1 class="text-center">Quản lý</h1>
        <!-- <form class="d-flex px-5" role="search" method="get" action="manage_person-logic.php">
            <input name="fname" class="form-control me-2" type="search" placeholder="Search first name" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mid init</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    // $personId = $row["PersonID"];
                ?>
                    <tr>
                        <!-- <th scope="row"><?= $row["PersonID"] ?></th> -->
                        <td><?= $row["LName"] ?></td>
                        <td><?= $row["Minit"] ?></td>
                        <td><?= $row["FName"] ?></td>
                        <td><?= $row["Sex"] ?></td>
                        <td><?= $row["phone"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td class="d-flex p-1 gap-1">
                            <!-- <form action="manage_person-update.php" method="post" class="w-50">
                                <input type="hidden" name="id" value="<?= $row["PersonID"] ?>">
                                <button type="submit" class="btn btn-success w-100 update-person">
                                    SỬA
                                </button>
                            </form>
                            <div class="w-50">
                                <button type="button" class="btn btn-danger w-100 delete-person" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="modal" data-personid="<?= $personId ?>">
                                    XÓA
                                </button>
                            </div> -->
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- <?php
        if ($number_of_result == 0) {
            echo "<p>Không tìm thấy kết quả trả về</p>";
        }
        ?> -->



    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Bạn muốn xóa người dùng này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Từ chối</button>
                    <form action="manage_person-delete.php" method="post">

                        <input type="hidden" name="id" id="deletePersonId" value="">
                        <button type="submit" class="btn btn-danger">Đồng ý</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).on('click', '.delete-person', function() {
        var personId = $(this).data('personid');
        $('#deletePersonId').val(personId);
    });
</script>

<?php
include 'partials/footer.php';
?>