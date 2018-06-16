<?php
/**
 * Template Name: Contact Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lorenzoovens
 */

get_header();
get_sidebar();
?>

	<div id="primary" class="content-area col s12 m12 l8">
		<main id="main" class="site-main" role="main">
			<div class="card">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() ); ?>
                </article>
                <?php
                //response generation function
                $response = "";

                //function to generate response
                function lorenzoovens_form_generate_response($type, $message){

                    global $response;

                    if($type == "success") $response = "<div class='success'>{$message}</div>";
                    else $response = "<div class='error'>{$message}</div>";
                }
                //response messages
                $not_human       = "Human verification incorrect.";
                $missing_content = "Please supply all information.";
                $name_invalid = "Only letters and white space allowed";
                $phone_invalid = "The phone number is incorrect, please format using xxx-xxx-xxxx.";
                $email_invalid   = "Email Address Invalid.";
                $message_unsent  = "Message was not sent. Try Again.";
                $message_sent    = "Thank you! Your message has been sent!";

                //user posted variables
                $name = $_POST['message_name'];
                $phone = $_POST['message_phone'];
                $email = $_POST['message_email'];
                $message = $_POST['message_text'];
                $number_one = rand(1,5);
                $number_two = rand(4,5);
                $human = $_POST['message_human'];

                //php mailer variables
                $to = get_option('admin_email');
                $from = "reply@lorenzoovens.com";
                $subject = "Someone sent a message from ".get_bloginfo('name');
                $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

                if(!$human == 0){
                    if($human + $number_one != $number_two) lorenzoovens_form_generate_response("error", $not_human); //not human!
                    else {
                        // validate email
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                            lorenzoovens_form_generate_response("error", $email_invalid);
                        else // email is valid
                        {
                            // validate presence of name and message
                            if( empty( $name ) || empty( $message || empty($phone)) ){
                                lorenzoovens_form_generate_response("error", $missing_content);
                            }
                            elseif ( !preg_match( "/^[a-zA-Z ]*$/", $name ) ) {
                                lorenzoovens_form_generate_response("error", $name_invalid);
                            }
                            elseif ( !preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone_invalid) ) {
                                lorenzoovens_form_generate_response("error", $phone_invalid);
                            }
                            else // ready to go!
                            {
                                // send email
                                $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                                if($sent) lorenzoovens_form_generate_response("success", $message_sent);
                                // message sent!
                                else lorenzoovens_form_generate_response("error", $message_unsent);
                            }
                        }
                    }
                }
                else if ($_POST['submitted']) lorenzoovens_form_generate_response("error", $missing_content);

                ?>

                    <div id="contact">
                        <?php echo $response; ?>
                        <form action="<?php the_permalink(); ?>" method="post">
                            <p><label for="message_name">Name <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr( $_POST['message_name'] ); ?>"></label></p>
                            <p><label for="message_phone">Phone <span>*</span> <br><input type="text" name="message_phone" value="<?php echo esc_attr( $_POST['message_phone'] ); ?>"></label></p>
                            <p><label for="message_email">Email <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr( $_POST['message_email'] ); ?>"></label></p>
                            <p><label for="message_text">Message <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea( $_POST['message_text'] ); ?></textarea></label></p>
                            <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + <?php echo $number_one . "&nbsp;=&nbsp;" . $number_two; ?></label></p>
                            <input type="hidden" name="submitted" value="1">
                            <p><input type="submit"></p>
                        </form>
                    </div>
                </div><!-- .card -->
            <?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
