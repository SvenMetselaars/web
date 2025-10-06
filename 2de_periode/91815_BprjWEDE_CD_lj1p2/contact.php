<?php
//so i can check if they logged in
session_start();
//so i can get functions out of there
include("inc/functions.php");
htmlhead();
?>
<form action="contact.php" method="post">
    <div class="contactPage">
        <div class="contactPage_container">
            <div>
                <label class="contact_firstname">First Name*</label>
            </div>
            <div>
                <label>Surname*</label>
            </div>
        </div>

        <div class="contactPage_container_input">
            <div>
                <input type="text" name="contactPage_formFirstName" />
            </div>
            <div>
    	        <input type="text" name="contactPage_formSurname" />
            </div>
        </div>

        <div class="contactPage_container">
            <div>
                <label class="contact_email">Email*</label>    
            </div>
            <div>
                <label class="contact_phone">Phone number*</label>
            </div>
        </div>
        
        <div class="contactPage_container_input">
            <div>
            <input type="email" name="contactPage_formEmail" />
            </div>
            <div>
                <input type="tel" name="contactPage_formPhone" />
            </div>
        </div>

        <div>
            <label>Company / Organisation</label>
            <br/>
            <input type="text" name="contactPage_formCompany" />
        </div>

        <div>
            <label class="contactPage_message_l">Message*</label>
            <br/>
            <textarea class="contactPage_message" name="contactPage_formMessage" rows="5" cols="75"></textarea>
        </div>

        <div class="contactPage_container">
            <div>
                <input type="submit" value="Submit" name="contactPage_formSubmit" />
            </div>
            <div>
                <input type="button" value="Reset" onclick="window.location.href='contact.php'" name="contactPage_formReset" />
            </div>
        </div>
        <?php
        // to check if they filled everything in
        contactResult();
        ?>
    </div>
</form>
<?php
htmlfoot();