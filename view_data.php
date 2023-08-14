<?php
$link_data = '?page=admin';
// $link_update = '?page=update_admin';

$username = '';
$password = '';

if (isset($_POST['save'])) {
  $error = '';
  $id = $_POST['id'];
  $action = $_POST['action'];
  $username = $_POST['username'];
  $fullname = $_POST['full_name'];

  if ($action == 'view') {
    $q = mysqli_query($con, "select * from admin where id_admin='" . $id . "'");
    $r = mysqli_fetch_array($q);
    $username_tmp = $r['username'];
    if (mysqli_num_rows(mysqli_query($con, "select * from admin where username='" . $username . "' and username<>'" . $username_tmp . "'")) > 0) {
      $error = 'Username sudah ada';
    } else {
      $q = "update admin set username='" . $username . "' where id_admin='" . $id . "'";
      mysqli_query($con, $q);
      exit("<script>location.href='" . $link_data . "';</script>");
    }
  }
} else {
  if (empty($_GET['action'])) {
    $action = 'add';
  } else {
    $action = $_GET['action'];
  }
  if ($action == 'view') {
    $id = $_GET['id'];
    $q = mysqli_query($con, "select * from admin where id_admin='" . $id . "'");
    $r = mysqli_fetch_array($q);
    $username = $r['username'];
    $fullname = $r['full_name'];
  }
}
?>
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Data <?= $username ?></h3>
  </div>
  <form class="form-horizontal" action="" method="post">
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <input name="action" type="hidden" value="<?php echo $action; ?>">
    <div class="box-body">
      <?php
      if (!empty($error)) {
        echo '<div class="alert bg-danger" role="alert">' . $error . '</div>';
      }
      ?>
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-4">
          <input name="username" id="username" class="form-control" type="text" value="<?= $username; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-4">
          <input name="fullname" id="fullname" class="form-control" type="text" value="<?= $fullname; ?>">
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="text-center col-sm-4">
        <a href="<?= $link_data; ?>" class="btn btn-success">Kembali</a>
      </div>
    </div>
  </form>
</div>