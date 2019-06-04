<?php
include ("includes/header.php");
 ?>

      <section class="wrapper">
        <div class="container">
    			<br />

    			<h3 align="center">Docenten</a></h3><br />
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
    					<input type="text" name="first_name" id="first_name" class="form-control" />
    					<span id="error_first_name" class="text-danger"></span>
    				</div>
    				<div class="form-group">
    					<label>Achternaam:</label>
    					<input type="text" name="last_name" id="last_name" class="form-control" />
    					<span id="error_last_name" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label>Email:</label>
    					<input type="email" name="email" id="email" class="form-control" />
    					<span id="error_email" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label class="wachtwoord">Wachtwoord:</label>
    					<input type="password" name="wachtwoord" id="wachtwoord" class="wachtwoord form-control" />
    					<span id="error_wachtwoord" class="text-danger"></span>
    				</div>
            <div class="form-group">
    					<label class="wachtwoord">Herhaal wachtwoord:</label>
    					<input type="password" name="hwachtwoord" id="hwachtwoord" class="wachtwoord form-control" />
    					<span id="error_hwachtwoord" class="text-danger"></span>
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
    			url:"fetch-docent.php",
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
        $('.wachtwoord').show();
    	});

    	$('#user_form').on('submit', function(event){
    		event.preventDefault();
    		var error_first_name = '';
    		var error_last_name = '';
        var error_email = '';
        var error_wachtwoord = '';
        var error_hwachtwoord = '';
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
    		if($('#last_name').val() == '')
    		{
    			error_last_name = 'Achternaam is verplicht.';
    			$('#error_last_name').text(error_last_name);
    			$('#last_name').css('border-color', '#cc0000');
    		}
    		else
    		{
    			error_last_name = '';
    			$('#error_last_name').text(error_last_name);
    			$('#last_name').css('border-color', '');
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
        if($('#wachtwoord').val() == '')
    		{
    			error_wachtwoord = 'Wachtwoord is verplicht.';
    			$('#error_wachtwoord').text(error_wachtwoord);
    			$('#wachtwoord').css('border-color', '#cc0000');
    		}
    		else
    		{
    			error_wachtwoord = '';
    			$('#error_wachtwoord').text(error_wachtwoord);
    			$('#wachtwoord').css('border-color', '');
    		}
        if($('#hwachtwoord').val() == '')
    		{
    			error_hwachtwoord = 'Wachtwoord herhaling is verplicht.';
    			$('#error_hwachtwoord').text(error_hwachtwoord);
    			$('#hwachtwoord').css('border-color', '#cc0000');
    		}
        else if($('#hwachtwoord').val() != $('#wachtwoord').val())
        {
          error_hwachtwoord = 'Wachtwoorden komen niet overheen.';
          $('#error_hwachtwoord').text(error_hwachtwoord);
    			$('#hwachtwoord').css('border-color', '#cc0000');
        }
    		else
    		{
    			error_hwachtwoord = '';
    			$('#error_hwachtwoord').text(error_hwachtwoord);
    			$('#hwachtwoord').css('border-color', '');
    		}

    		if(error_first_name != '' || error_last_name != '' || error_email != '' || error_hwachtwoord != '' || error_wachtwoord != '')
    		{
    			return false;
    		}
    		else
    		{
    			$('#form_action').attr('disabled', 'disabled');
    			var form_data = $(this).serialize();
    			$.ajax({
    				url:"action-docent.php",
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
    			url:"action-docent.php",
    			method:"POST",
    			data:{DocentID:id, action:action},
    			dataType:"json",
    			success:function(data)
    			{
    				$('#first_name').val(data.first_name);
    				$('#last_name').val(data.last_name);
    				$('#email').val(data.email);
            $('.wachtwoord').hide();
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
    					url:"action-docent.php",
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
