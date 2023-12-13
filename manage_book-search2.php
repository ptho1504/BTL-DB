<?php
include 'partials/header.php';
?>

<?php
if (isset($_GET['category'])) {
    $category = $_GET['category'];
}

/*
$query = "SELECT  COUNT(*) as row_count FROM PERSON WHERE FName LIKE '%$fname';";
$result  = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
$number_of_result = $row['row_count'];

*/

$query = "exec SelectBookv2 @category = '$category' ";
$books = sqlsrv_query($conn, $query);
?>
<section class="empty__page">
    <div class="d-flex flex-column px-5 my-2">
        <h1 class="text-center">Quản lý số bản copy theo danh mục</h1>
        <!-- <form class="d-flex px-5" role="search" method="get" action="manage_person-logic.php">
            <input name="fname" class="form-control me-2" type="search" placeholder="Search first name" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Title</th>
                    <th scope="col">Number of copy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = sqlsrv_fetch_array($books, SQLSRV_FETCH_ASSOC)) {
                    // $bookId = $row["BOOKID"];
                ?>
                    <tr>
                        <td><?= $row["Title"] ?></td>
                        <td><?= $row["COPY_COUNT"] ?></td>

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