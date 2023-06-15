<div id="usersdetails" class="usersdetails">
  <style>
    .usersdetails{
  display: none;
}
.usershow{
  display: block;
}




.usersdetails{
  display: none;
}
.usershow{
  display: block;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th,
td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: lightsteelblue;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

#delete-btn {
  background-color: red;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 5px;
  cursor: pointer;
}

#delete-btn:hover {
  background-color: #C34A2C;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 5px;
  cursor: pointer;
}

.heading {
  text-transform: uppercase;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 18% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  text-align: center;
  font-size: 20px;
  border-radius: 10px;
}

.deletemodalbtns1 {
  border: none;
  background-color: lightgray;
  border-radius: 5px;
  padding: 5px 30px;
  font-size: 16px;
  cursor: pointer;
  margin-right: 25px;
}

.deletemodalbtns2 {
  border: none;
  background-color: lightgray;
  border-radius: 5px;
  padding: 5px 30px;
  font-size: 16px;
  cursor: pointer;
  margin-left: 25px;
}

  </style>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sound";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete'])) {
  $id = $_POST['id'];

  $sql = "DELETE FROM signin WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die('Failed to delete user: ' . mysqli_error($conn));
  }

  // header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

$sql = "SELECT * FROM signin";
$users = mysqli_query($conn, $sql);

?>



  <div class="table">
  <table>
    <thead>
      <tr>
        <th class="heading">ID</th>
        <th class="heading">Name</th>
        <th class="heading">Username</th>
        <th class="heading">Email</th>
      </tr>
    </thead>
    <tbody>

      <?php while ($row = mysqli_fetch_assoc($users)) { ?>
        <tr id="user_<?php echo $row['id']; ?>">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td>
            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <!-- <button id="delete-btn" type="button" onclick="openModal(<?php echo $row['id']; ?>)">Delete</button> -->
            </form>
          </td>
        </tr>
      <?php } ?>
    

      <div id="deleteModal" class="modal">
        <div class="modal-content">
          <p>Are you sure you want to delete this user?</p>
          <div class="modal-buttons">
            <form method="POST" id="deleteForm">
              <input type="hidden" name="id" value="">
              <button type="submit" class="deletemodalbtns1" name="delete">Yes</button>
              <button type="button" class="deletemodalbtns2" onclick="closeModal()">No</button>
            </form>
          </div>
        </div>
      </div>

    </tbody>
  </table>
  </div>
</div>


<script>
  function openModal(id) {
    var deleteForm = document.getElementById('deleteForm');
    deleteForm.elements.id.value = id;
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.style.display = 'block';
  }

  function closeModal() {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.style.display = 'none';
  }



  
</script>