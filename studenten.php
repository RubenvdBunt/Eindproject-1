<?php
include ("includes/header.php");
 ?>

      <section class="wrapper" style="padding: 0px;">
        <div class="container" style="width: 1370px;">
    			<br />

    			<h3 align="center">Studenten</a></h3><br />
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
    					<label>Voornaam:</label>
    					<input type="text" name="student_first_name" id="first_name" class="form-control" />
    					<span id="error_first_name" class="text-danger"></span>
    				</div>
    				<div class="form-group">
    					<label>Achternaam:</label>
    					<input type="text" name="student_second_name" id="second_name" class="form-control" />
    					<span id="error_second_name" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Tussenvoegsel:</label>
    					<input type="text" name="student_insertion" id="insertion" class="form-control" />
    					<span id="error_insertion" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Adres:</label>
    					<input type="text" name="student_adres" id="adres" class="form-control" />
    					<span id="error_adres" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Plaats:</label>
    					<input type="text" name="student_place" id="place" class="form-control" />
    					<span id="error_place" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Postcode:</label>
    					<input type="text" name="student_mailnr" id="mailnr" class="form-control" />
    					<span id="error_mailnr" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Geboortedatum:</label>
    					<input type="date" name="student_birth" id="birth" class="form-control" />
    					<span id="error_birth" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Email:</label>
    					<input type="email" name="student_email" id="email" class="form-control" />
    					<span id="error_email" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Klas:</label>
              <select name="class_name" id="class_name" class="form-control">
                <option value="0">Geen klas</option>
                <?php
                  $class_query = "SELECT * FROM klas";
                  $class_statement = $connect->prepare($class_query);
              		$class_statement->execute();
              		$class_result = $class_statement->fetchAll();

                  foreach ($class_result as $value) {
                      echo "<option value='".$value['KlasID']."'>".$value['KlasNaam']."</option>";
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

    		<div id="delete_confirmation" title="Verwijderen?">
    		<p>Weet je zeker dat je deze docent wilt verwijderen?</p>
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
    			url:"fetch-studenten.php",
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
    		var error_first_name = '';
    		var error_second_name = '';
        var error_insertion = '';
        var error_adres = '';
        var error_place = '';
        var error_mailnr = '';
        var error_birth = '';
        var error_email = '';

    		if($('#first_name').val() == '')
    		{
    			error_first_name = 'Voornaam is verplicht.';
    			$('#error_first_name').text(error_first_name);
    			$('#first_name').css('border-color', '#cc0000');
    		}
    		else
    		{
    			error_first_name = '';
    			$('#error_first_name').text(error_first_name);
    			$('#first_name').css('border-color', '');
    		}
    		if($('#second_name').val() == '')
    		{
    			error_second_name = 'Achternaam is verplicht.';
    			$('#error_second_name').text(error_second_name);
    			$('#second_name').css('border-color', '#cc0000');
    		}
    		else
    		{
    			error_second_name = '';
    			$('#error_second_name').text(error_second_name);
    			$('#second_name').css('border-color', '');
    		}
        if($('#adres').val() == '')
        {
          error_adres = 'Adres is verplicht.';
          $('#error_adres').text(error_adres);
          $('#adres').css('border-color', '#cc0000');
        }
        else
        {
          error_adres = '';
          $('#error_adres').text(error_adres);
          $('#adres').css('border-color', '');
        }
        if($('#place').val() == '')
        {
          error_place = 'Plaats is verplicht.';
          $('#error_place').text(error_place);
          $('#place').css('border-color', '#cc0000');
        }
        else
        {
          error_place = '';
          $('#error_place').text(error_place);
          $('#place').css('border-color', '');
        }
        if($('#mailnr').val() == '')
        {
          error_mailnr = 'Postcode is verplicht.';
          $('#error_mailnr').text(error_mailnr);
          $('#mailnr').css('border-color', '#cc0000');
        }
        else
        {
          error_mailnr = '';
          $('#error_mailnr').text(error_mailnr);
          $('#mailnr').css('border-color', '');
        }
        if($('#birth').val() == '')
        {
          error_birth = 'Geboortedatum is verplicht.';
          $('#error_birth').text(error_birth);
          $('#birth').css('border-color', '#cc0000');
        }
        else
        {
          error_birth = '';
          $('#error_birth').text(error_birth);
          $('#birth').css('border-color', '');
        }
        if($('#email').val() == '')
    		{
    			error_email = 'Email is verplicht.';
    			$('#error_email').text(error_email);
    			$('#email').css('border-color', '#cc0000');
    		}
    		else
    		{
    			error_email = '';
    			$('#error_email').text(error_email);
    			$('#email').css('border-color', '');
    		}

    		if(error_first_name != '' || error_second_name != '' || error_adres != '' || error_place != '' || error_mailnr != '' || error_birth != '' || error_email != '')
    		{
    			return false;
    		}
    		else
    		{
    			$('#form_action').attr('disabled', 'disabled');
    			var form_data = $(this).serialize();
    			$.ajax({
    				url:"action-studenten.php",
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
    			url:"action-studenten.php",
    			method:"POST",
    			data:{StudentID:id, action:action},
    			dataType:"json",
    			success:function(data)
    			{
    				$('#first_name').val(data.student_first_name);
    				$('#second_name').val(data.student_second_name);
            $('#insertion').val(data.student_insertion);
    				$('#adres').val(data.student_adres);
            $('#place').val(data.student_place);
    				$('#mailnr').val(data.student_mailnr);
    				$('#birth').val(data.student_birth);
    				$('#email').val(data.student_email);
            $('#class_name').val(data.class_name);
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
    			Ja : function(){
    				var id = $(this).data('id');
    				var action = 'delete';
    				$.ajax({
    					url:"action-studenten.php",
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
    			Annuleren : function(){
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
