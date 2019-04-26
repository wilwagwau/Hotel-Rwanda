

<!--PHP Script that adds a new user -->
<?php 
	require '../admin/includes/config.php';
							
	if (isset($_POST['enableUser']))
	{
		$query = $conn->query("SELECT * FROM tbl_users WHERE 'user_id' LIKE ' ") or die (mysql_error());
		$count = $query->fetch_array();
		$user = $conn->query("UPDATE tbl_users SET status = 'inactive' WHERE trasaction_id LIKE $_REQUEST[transaction_id]");
	}
?>
	<!--<script>alert("ID Number Already Exist");</script>-->
		
	
<!--New User Modal -->
<div class="modal fade" id="enableUser" tabindex="-1" role="dialog" aria-labelledby="enableUser" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title text-default" id="enableUser">Enabling User</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
            <form role="form" method = "post" enctype = "multipart/form-data">
                <fieldset>
								
					<div class="form-group">
						<center><label><b></b></label></center>
					</div>
								
							<hr>
					<button class="btn btn-sm btn-info pull-right " name = "enableUser"><i class="fa fa-check-circle"></i> Enable</button>
								
                </fieldset>	
            </form>
		</div>
	 
    </div>
  </div>
</div>