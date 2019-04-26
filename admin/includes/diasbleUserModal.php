
<?php 
		require '../admin/includes/config.php';
								
	
?>
		
	
<!--Disable Modal -->
<div class="modal fade" id="disableUser" tabindex="-1" role="dialog" aria-labelledby="disableUser" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title text-default" id="disableUser">Disabling User</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
        <form role="form" method = "post" enctype = "multipart/form-data">
        		<fieldset>
								
							<div class="form-group">
								<center><label><b>Firstname Lastname</b></label></center>
							</div>
								
							<hr>
							<button class="btn btn-sm btn-danger pull-right " name = "disableUser"><i class="fa fa-close"></i> Disable</button>
								
            </fieldset>	
        </form>
		</div>
	 
    </div>
  </div>
</div>