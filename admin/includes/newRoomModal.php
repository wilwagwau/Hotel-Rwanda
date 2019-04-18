
<!--PHP Script that adds a new room -->
<?php 
		require '../admin/includes/config.php';
								
			if (isset($_POST['addRoom']))
			{
				$room_type=$_POST['room_type'];
				$room_label=$_POST['room_label'];
				$room_rate=$_POST['room_rate'];
				$room_status=$_POST['room_status'];

				$query = $conn->query("SELECT * FROM tbl_rooms WHERE room_type = '$room_type' && room_label = '$room_label' ") or die (mysql_error());
				$count = $query->num_rows;

					if ($count  > 0)
					{ 
?>
		<script>alert("This Room alredy Exist");</script>
		<!-- <script>swal('Sorry..!', 'The National ID <?php echo $count['national_id']?> already exist', 'warning');</script>"; -->
	<?php
					}
					else
					{
						$user = $conn->query("insert into tbl_rooms(room_type, room_label, room_rate,room_status) VALUES('$room_type', '$room_label','$room_rate','$room_status')");
						//$result = $user->fecth_array();
	?>
						<script>alert('You added a new room successfully.');</script>
	<?php
					}
			} 
	?>
 
<!-- Modal -->
<div class="modal fade" id="newRoomModalCenter" tabindex="-1" role="dialog" aria-labelledby="newRoomModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-info" id="newRoomModalCenterTitle">ADD NEW ROOM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form role="form" method = "post" enctype = "multipart/form-data">
        <fieldset>

          
          <div class="form-group">	
            <img src="../images/rooms/room_default.jpg" style="margin-left: 0px; width: 80px; height: 80px; margin-top: 10px; border: 1px solid lightblue; border-radius: 50%;"/><br><br>
            <input type="file" class="form-control-file">
					</div>
          <hr>	
          
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label>Room Type</label>
                  <select class = "form-control" name = "room_type" required>
										<option></option>
										<option>Mini Suite</option>
										<option>Junior Suite</option>
										<option>Master Suite</option>
									</select>
							</div>
							<div class="col">
								<label>Room Label</label>
									<input type="text" class="form-control" name="room_label" placeholder="Enter label" required>
							</div>
						</div>
					</div>
			
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label>Room Rate</label>
                  <input type="number" class="form-control" name="room_rate" placeholder="Enter the price" required>
							</div>
							<div class="col">
								<label>Room Status</label>
                <select class = "form-control" name = "room_status" required>
										<option></option>
										<option>0</option>
										<option>1</option>
									</select>
							</div>
						</div>
					</div>
					
					<button class="btn btn-lg btn-outline-success btn-block " name = "addRoom">Create <i class="fa fa-check"></i></button>
								
        </fieldset>	
      </form>

    </div>
  </div>
</div>