<?php
include 'partials/header.php';
?>
<?php
$query = "SELECT COUNT(*) AS row_count FROM BOOK";
$result  = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

$number_of_result = $row['row_count'];




$results_per_page = 20;
$number_of_page = ceil($number_of_result / $results_per_page);



if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = intval($_GET['page']);
}
$page_cur = $page;
$page_first_result = ($page - 1) * $results_per_page;

$query = "SELECT  * FROM   BOOK   ORDER BY BOOKID  OFFSET $page_first_result ROWS FETCH NEXT $results_per_page ROWS ONLY ";
$books = sqlsrv_query($conn, $query);



?>

<section class="empty__page">
    <div class="d-flex flex-column px-5 my-2 gap-1">
        <h1 class="text-center">Quản lý Sách</h1>
        <form class="d-flex px-5" role="search" method="get" action="manage_user-search1.php">
            <input name="fname" class="form-control me-2" type="search" placeholder="Search By Title" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <form class="d-flex px-5" role="search" method="get" action="manage_user-search2.php">
            <input name="fname" class="form-control me-2" type="search" placeholder="Search Copy By Category" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#BookID</th>
                    <th scope="col">Number of copy</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publishername</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = sqlsrv_fetch_array($books, SQLSRV_FETCH_ASSOC)) {
                    $bookId = $row["BOOKID"];
                ?>
                    <tr>

                        <th scope="row"><?= $row["BOOKID"] ?></th>
                        <td><?= $row["numofcopies"] ?></td>
                        <td><?= $row["Category"] ?></td>
                        <td><?= $row["Title"] ?></td>
                        <td><?= $row["Publishername"] ?></td>
                        <td class="d-flex p-1 gap-1">
                            <form action="manage_book-update.php" method="post" class="w-50">
                                <input type="hidden" name="id" value="<?= $row["BOOKID"] ?>">
                                <button type="submit" class="btn btn-success w-100 update-person">
                                    SỬA
                                </button>
                            </form>
                            <div class="w-50">
                                <!-- <button type="button" class="btn btn-danger w-100 delete-person" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="modal" data-personid="<?= $bookId ?>">
                                    XÓA
                                </button> -->
                            </div>
                        </td>
                    </tr>
                <?php

                }
                ?>

            </tbody>
        </table>


        <div class="d-flex justify-content-end mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link <?php if ($page_cur <= 1) {
                                                echo 'disabled';
                                            } ?>" href="manage_person.php?page=<?= $page_cur - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link active" href="manage_person.php?page=<?= $page_cur ?>">
                            <?= $page_cur ?>
                        </a>
                    </li>
                    <?php
                    if (($page_cur + 1) <= $number_of_page) {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="manage_person.php?page=<?= $page_cur + 1 ?>">
                                <?= $page_cur + 1 ?>
                            </a>
                        </li>
                    <?php
                    } ?>
                    <?php
                    if (($page_cur + 2) < $number_of_page) {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="manage_person.php?page=<?= $page_cur + 2 ?>">
                                <?= $page_cur + 2 ?>
                            </a>
                        </li>
                    <?php
                    } ?>
                    <li class="page-item">
                        <a class="page-link <?php if ($page_cur >= $number_of_page) {
                                                echo 'disabled';
                                            } ?>" href="manage_person.php?page=<?= $page_cur + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
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
                        <p class="text-danger">Bạn muốn xóa quyển sách này?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Từ chối</button>
                        <form action="manage_book-delete.php" method="post">

                            <input type="hidden" name="id" id="deletePersonId" value="">
                            <button type="submit" class="btn btn-danger">Đồng ý</button>
                        </form>
                    </div>
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