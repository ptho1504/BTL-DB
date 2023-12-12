<?php
include 'partials/header.php';
?>

<?php
if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
}

$query = "SELECT  COUNT(*) as row_count FROM USER_table WHERE Phone = '$phone';";
$result  = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
$number_of_result = $row['row_count'];


$query = "SELECT  * FROM USER_table WHERE  Phone = '$phone';";
$persons = sqlsrv_query($conn, $query);
?>
<section class="empty__page">
    <div class="d-flex flex-column px-5 my-2">
        <h1 class="text-center">Quản lý</h1>
        <form class="d-flex px-5" role="search" method="get" action="manage_person-logic.php">
            <input name="fname" class="form-control me-2" type="search" placeholder="Search by phone" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#UserID</th>
                    <th scope="col">DateofBirth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = sqlsrv_fetch_array($persons, SQLSRV_FETCH_ASSOC)) {
                ?>
                    <tr>
                        <th scope="row"><?= $row["UserID"] ?></th>
                        <td><?= $row["DateofBirth"]->format("Y-m-d") ?></td>
                        <td><?= $row["Phone"] ?></td>
                        <td><?= $row["Email"] ?></td>
                        <td class="d-flex p-1 gap-1">
                            <form action="manage_user-update.php" method="post" class="w-50">
                                <input type="hidden" name="id" value="<?= $row["UserID"] ?>">
                                <button type="submit" class="btn btn-success w-100 update-person">
                                    SỬA
                                </button>
                            </form>
                            <div class="w-50">
                                <button type="button" class="btn btn-danger w-100 delete-person" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="modal" data-personid="<?= $personId ?>">
                                    XÓA
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        if ($number_of_result == 0) {
            echo "<p>Không tìm thấy kết quả trả về</p>";
        }
        ?>



    </div>

</section>

<?php
include 'partials/footer.php';
?>