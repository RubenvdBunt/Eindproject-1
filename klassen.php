<?php
include ("includes/header.php");
if($_SESSION["BeheerderSession"] > 0){

}else if($_SESSION["DocentSession"] > 0) {
    header("Location: index.php");

}else if($_SESSION["StudentSession"] > 0) {
    header("Location: index.php");
}else{
    echo"Welkom!";
}
 ?>

      <section class="wrapper">
        <div class="container">
    			<br />

    			<h3 align="center">Klassen</a></h3><br />
    			<div align="right" style="margin-bottom:5px;">
    			<button type="button" name="add" id="add" class="btn btn-success btn-xs">Toevoegen</button>
    			</div>
    			<div class="table-responsive" id="user_data">

    			</div>
    			<br />
    		</div>

    		<div id="user_dialog" title="Add Data">
    			<form method="post" id="user_form">
    				<div class="form-group">
    					<label>Klasnaam:</label>
    					<input type="text" name="class_name" id="class_name" class="form-control" />
    					<span id="error_class_name" class="text-danger"></span>
    				</div>
    				<div class="form-group">
    					<label>Mentor:</label>
              <select name="teacher_name" id="teacher_name" class="form-control">
                <option value="0">Geen mentor</option>
                <?php
                  $mentor_query = "SELECT * FROM docent";
                  $mentor_statement = $connect->prepare($mentor_query);
              		$mentor_statement->execute();
              		$mentor_result = $mentor_statement->fetchAll();

                  foreach ($mentor_result as $value) {
                      echo "<option value='".$value['DocentID']."'>".$value['DocentVoornaam']." ".$value['DocentAchternaam']."</option>";
                  }
                ?>
              </select>
    				</div>
    				<div class="form-group">
    					<input type="hidden" name="action" id="action" value="insert" />
    					<input type="hidden" name="hidden_id" id="hidden_id" />
    					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
    				</div>
    			</form>
    		</div>

    		<div id="action_alert" title="Action">
    		</div>

    		<div id="delete_confirmation" title="Confirmation">
    		<p>Weet je zeker dat je het wilt verwijderen?</p>
    		</div>

        <?php
        include("includes/footer.php");
        ?>
      </section>
      <?php
      include_once "includes/script.php";
      ?>
    </section>
  </section>

    <script>
    $(document).ready(function(){

    	load_data();

    	function load_data()
    	{
    		$.ajax({
    			url:"fetch-klassen.php",
    			method:"POST",
    			success:function(data)
    			{
    				$('#user_data').html(data);
    			}
    		});
    	}

    	$("#user_dialog").dialog({
    		autoOpen:false,
    		width:400
    	});

    	$('#add').click(function(){
    		$('#user_dialog').attr('title', 'Add Data');
    		$('#action').val('insert');
    		$('#form_action').val('Insert');
    		$('#user_form')[0].reset();
    		$('#form_action').attr('disabled', false);
    		$("#user_dialog").dialog('open');
    	});

    	$('#user_form').on('submit', function(event){
    		event.preventDefault();
    		var error_class_name = '';
    		if($('#class_name').val() == '')
    		{
    			error_class_name = 'Voornaam is verplicht.';
    			$('#error_class_name').text(error_class_name);
    			$('#class_name').css('border-color', '#cc0000');
    		}
    		else
    		{
    			error_class_name = '';
    			$('#error_class_name').text(error_class_name);
    			$('#class_name').css('border-color', '');
    		}


    		if(error_class_name != '')
    		{
    			return false;
    		}
    		else
    		{
    			$('#form_action').attr('disabled', 'disabled');
    			var form_data = $(this).serialize();
    			$.ajax({
    				url:"action-klassen.php",
    				method:"POST",
    				data:form_data,
    				success:function(data)
    				{
    					$('#user_dialog').dialog('close');
    					$('#action_alert').html(data);
    					$('#action_alert').dialog('open');
    					load_data();
    					$('#form_action').attr('disabled', false);
    				}
    			});
    		}

    	});

    	$('#action_alert').dialog({
    		autoOpen:false
    	});

    	$(document).on('click', '.edit', function(){
    		var id = $(this).attr('id');
    		var action = 'fetch_single';
    		$.ajax({
    			url:"action-klassen.php",
    			method:"POST",
    			data:{KlasID:id, action:action},
    			dataType:"json",
    			success:function(data)
    			{
    				$('#class_name').val(data.class_name);
    				$('#teacher_name').val(data.teacher_name);
    				$('#user_dialog').attr('title', 'Edit Data');
    				$('#action').val('update');
    				$('#hidden_id').val(id);
    				$('#form_action').val('Update');
    				$('#user_dialog').dialog('open');
    			}
    		});
    	});

    	$('#delete_confirmation').dialog({
    		autoOpen:false,
    		modal: true,
    		buttons:{
    			Ok : function(){
    				var id = $(this).data('id');
    				var action = 'delete';
    				$.ajax({
    					url:"action-klassen.php",
    					method:"POST",
    					data:{id:id, action:action},
    					success:function(data)
    					{
    						$('#delete_confirmation').dialog('close');
    						$('#action_alert').html(data);
    						$('#action_alert').dialog('open');
    						load_data();
    					}
    				});
    			},
    			Cancel : function(){
    				$(this).dialog('close');
    			}
    		}
    	});

    	$(document).on('click', '.delete', function(){
    		var id = $(this).attr("id");
    		$('#delete_confirmation').data('id', id).dialog('open');
    	});

    });
    </script>
