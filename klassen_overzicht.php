<?php
include ("includes/header.php");
if($_SESSION["BeheerderSession"] > 0){
  header("Location: index.php");
}else if($_SESSION["DocentSession"] > 0) {

}else if($_SESSION["StudentSession"] > 0) {
    header("Location: index.php");
}else{
    echo"Welkom!";
}
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
  });
  </script>
