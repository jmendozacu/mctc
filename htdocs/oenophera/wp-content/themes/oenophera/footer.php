<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oenophera
 */

?>

	</div><!-- #content -->

	<footer class="site-footer row" role="contentinfo">
		<div class="container">
            <?php

            //response generation function
            $response = "";

            //function to generate response
            function my_contact_form_generate_response($type, $message){

                global $response;

                if($type == "success") $response = "<div class='success'>{$message}</div>";
                else $response = "<div class='error'>{$message}</div>";

            }

            //response messages
            $not_human       = "Human verification incorrect.";
            $missing_content = "Please supply all information.";
            $email_invalid   = "Email Address Invalid.";
            $message_unsent  = "Message was not sent. Try Again.";
            $message_sent    = "Thanks! Your message has been sent.";

            //user posted variables
            $name = $_POST['message_name'];
            $email = $_POST['message_email'];
            $message = $_POST['message_text'];
            $human = $_POST['message_human'];

            //php mailer variables
            $to = get_option('admin_email');
            $subject = "Someone sent a message from ".get_bloginfo('name');
            $headers = 'From: '. $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n";

            if(!$human == 0){
                if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
                else {
                    //validate email
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                        my_contact_form_generate_response("error", $email_invalid);
                    else //email is valid
                    {
                        //validate presence of name and message
                        if(empty($name) || empty($message)){
                            my_contact_form_generate_response("error", $missing_content);
                        }
                        else //ready to go!
                        {
                            //send email
                            $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                            if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
                            else my_contact_form_generate_response("error", $message_unsent);
                        }
                        //send email
                    }
                }
            }
            else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);


            ?>
            <style type="text/css">
                .error{
                    padding: 5px 9px;
                    border: 1px solid red;
                    color: red;
                    border-radius: 3px;
                }

                .success{
                    padding: 5px 9px;
                    border: 1px solid green;
                    color: green;
                    border-radius: 3px;
                }

                form span{
                    color: red;
                }
            </style>

            <div id="respond">
                <?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="post">
                    <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
                    <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
                    <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
                    <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                    <input type="hidden" name="submitted" value="1">
                    <p><input type="submit"></p>
                </form>
            </div>
            <div class="site-info" id="colophon">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'oenophera' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'oenophera' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'oenophera' ), 'oenophera', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/*
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    oenophera_form_generate_response("error", $email_invalid);
}
else {
    if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($email) || empty($message)) {
        oenophera_form_generate_response("error", $missing_content);
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", $first_name) ) {
        oenophera_form_generate_response("error", $name_invalid);
    } // End Else If
    elseif (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone_invalid)) {
        oenophera_form_generate_response("error", $phone_invalid);
    }// End Else if
    else {
        // send email
        $sent = wp_mail($to, $subject, strip_tags($message), $headers);
        // message sent!
        if ($sent) {
            oenophera_form_generate_response("success", $message_sent);
        } // End If
        else {
            oenophera_form_generate_response("error", $message_unsent);
        } // End Else
    } // End Else
} <form action="<?php the_permalink(); ?>" method="post">
                <?php echo $response; ?>
                <div class="col s12 m6 l6">
                    <label for="firstname" class="screen-reader-text">First Name</label>
                    <input type="text" name="firstname" placeholder="First Name" value="<?php
                    if( isset($first_name) ) {
                        echo $first_name;
                    }?>"><br>
                    <label for="phonenumber" class="screen-reader-text">Phone Number</label>
                    <input type="text" name="phonenumber" placeholder="XXX-XXX-XXXX" value="<?php
                    if( isset($phone_number) ) {
                        echo $phone_number;
                    }?>"><br>
                </div><!-- .col .s12 .m6 .l6 -->
                <div class="col s12 m6 l6">
                    <label for="lastname" class="screen-reader-text">Last Name</label>
                    <input type="text" name="lastname" placeholder="Last Name" value="<?php                           if( isset($last_name) ) {
                        echo $last_name;
                     }
                     ?>"><br>
                    <label for="email" class="screen-reader-text">Email Address</label>
                    <input type="text" name="email" placeholder="Email Address" value="<?php                          if( isset($email) ) {
                        echo $email;
                     }
                     ?>"><br>
                </div><!-- .col .s12 .m6 .l6 -->
                <div class="col s12 m12 l12">
                    <label for="message" class="screen-reader-text">Last Name</label>
                    <textarea type="textarea" name="message" placeholder="Your Message" rows="4" cols="20"><?php
                        if( isset($message) ) {
                            echo $message;
                        } ?></textarea>
                </div><!-- .col .s12 .m12 .l12 -->
                <input type="hidden" name="submitted" value="1">
                <input type="submit" value="Submit">
            </form>