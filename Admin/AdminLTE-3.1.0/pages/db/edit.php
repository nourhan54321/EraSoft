<?php
session_start();
require_once('../../build/config/conf.php');

// Assume you have a working database connection
$conn = mysqli_connect('localhost','root','','clinic');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assume you have a pagination_data array set in your session
if (!isset($_SESSION['pagination_data'])) {
    $_SESSION['pagination_data'] = array();
}

// Set pagination data (e.g., from a database query)
$_SESSION['pagination_data']['result'] = mysqli_query($conn, "SELECT * FROM doctors");
$_SESSION['pagination_data']['total_pages'] = ceil(mysqli_num_rows($_SESSION['pagination_data']['result']) / 10); // adjust the limit as needed
$_SESSION['pagination_data']['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

// Limit the result set for the current page
$limit = 1; // adjust the limit as needed
$offset = ($_SESSION['pagination_data']['page'] - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM doctors LIMIT $offset, $limit");
?>
<!-- <table id="datatable" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>age</th>
      <th>Department</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $row['Id'] ?></td>
      <td><?= $row['Name'] ?></td>
      <td><?= $row['age'] ?></td>
      <td><?= $row['department'] ?></td>
      <td><button><a href='#'>EDIT</a></button></td>
    </tr>
    <?php endwhile ?>
  </tbody>
</table> -->

<div class="pagination">
  <!-- Previous page link -->
  <a href="edit.php?page=<?= $_SESSION['pagination_data']['page'] - 1 ?>" class="prev <?= ($_SESSION['pagination_data']['page'] == 1) ? 'disabled' : '' ?>">Previous</a>

  <!-- Page numbers -->
  <?php for ($i = 1; $i <= $_SESSION['pagination_data']['total_pages']; $i++): ?>
 
  <a href="edit.php?page=<?= $i ?>" class="<?= ($i == $_SESSION['pagination_data']['page']) ? 'active' : '' ?>"><?= $i ?></a>
  <?php endfor ?>

  <!-- Next page link -->
  <a href="edit.php?page=<?= $_SESSION['pagination_data']['page'] + 1 ?>" class="next <?= ($_SESSION['pagination_data']['page'] == $_SESSION['pagination_data']['total_pages']) ? 'disabled' : '' ?>">Next</a>
</div>

<!-- Rest of the HTML code remains the same -->