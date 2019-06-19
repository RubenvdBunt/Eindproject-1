<?php
include ("includes/header.php");
if($_SESSION["BeheerderSession"] > 0){

}else if($_SESSION["DocentSession"] > 0) {

}else if($_SESSION["StudentSession"] > 0) {
    header("Location: index.php");
}else{
    echo"Welkom!";
}
?>

<section class="wrapper" style="padding: 0px;">
    <div class="container" style="width: 1370px;">
        <br />

        <h3 align="center">Studenten</a></h3><br />
        <div class="table-responsive" id="user_data">

        </div>
        <br />
    </div>

    <div id="user_dialog" title="Add Data">
        <form method="post" id="user_form">
            <div class="form-group">
                <label>Voornaam:</label>
                <input type="text" name="student_first_name" id="first_name" class="form-control" disabled/>
                <span id="error_first_name" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Achternaam:</label>
                <input type="text" name="student_second_name" id="second_name" class="form-control" disabled/>
                <span id="error_second_name" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Tussenvoegsel:</label>
                <input type="text" name="student_insertion" id="insertion" class="form-control" disabled/>
                <span id="error_insertion" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Adres:</label>
                <input type="text" name="student_adres" id="adres" class="form-control" disabled/>
                <span id="error_adres" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Plaats:</label>
                <input type="text" name="student_place" id="place" class="form-control" disabled/>
                <span id="error_place" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Postcode:</label>
                <input type="text" name="student_mailnr" id="mailnr" class="form-control" disabled/>
                <span id="error_mailnr" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Geboortedatum:</label>
                <input type="date" name="student_birth" id="birth" class="form-control" disabled/>
                <span id="error_birth" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="student_email" id="email" class="form-control" disabled/>
                <span id="error_email" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label>Klas:</label>
                <select name="class_name" id="class_name" class="form-control" disabled>
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
                <label class="wachtwoord">Wachtwoord:</label>
                <input type="password" name="wachtwoord" id="wachtwoord" class="wachtwoord form-control" disabled/>
                <span id="error_wachtwoord" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label class="wachtwoord">Herhaal wachtwoord:</label>
                <input type="password" name="hwachtwoord" id="hwachtwoord" class="wachtwoord form-control" disabled/>
                <span id="error_hwachtwoord" class="text-danger"></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="hidden_id" id="hidden_id" />
            </div>
        </form>
    </div>

    <div id="action_alert" title="Action">

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
            var error_wachtwoord = '';
            var error_hwachtwoord = '';



            if(error_first_name != '' || error_second_name != '' || error_adres != '' || error_place != '' || error_mailnr != '' || error_birth != '' || error_email != '' || error_hwachtwoord != '' || error_wachtwoord != '')
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
                    $('.wachtwoord').hide();
                    $('#user_dialog').attr('title', 'Edit Data');
                    $('#action').val('update');
                    $('#hidden_id').val(id);
                    $('#form_action').val('Update');
                    $('#user_dialog').dialog('open');
                }
            });
        });
    });
</script>
