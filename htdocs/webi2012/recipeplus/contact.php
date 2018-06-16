<?php require_once('header.php');

$product_id = $_GET['product_id'];

$products = $db->prepare('SELECT * FROM categories INNER JOIN products on categories.categoryID = products.categoryID WHERE productID = :product_id');
$products->execute(array(':product_id' => $product_id));

$product = $products->fetch(); ?>
</div><!-- .header .col .s12 .m6 .l6 -->
<div class="row">
    <div class="container">
        <div class="col s12 m12 l8 offset-l2 contact-form">
            <h1 class="center-text">Contact</h1>
            <?php
            if ( isset( $_POST['Submit'] ) ) {
                $first_name = $_POST['firstname'];
                $last_name = $_POST['lastname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['stateid'];
                $zipcode = $_POST['zipcode'];
                $output_form = 'no';

                if ( empty( $first_name ) || empty( $last_name ) || empty( $email ) || empty( $address ) || empty( $city ) || empty( $state ) || empty( $zipcode ) ) {
                    // We know at least one of the input fields is blank
                    echo 'Please fill out all of the email information.<br />';
                    $output_form = 'yes';
                }
            }
            else {
                $output_form = 'yes';
            }
            if ( !empty( $first_name ) && !empty( $last_name ) && !empty( $email ) && !empty( $address ) && !empty( $city ) && !empty( $state ) && !empty( $zipcode ) ) {
                $dbc = mysqli_connect( 'localhost', 'root', 'root', 'webi2012' ) or die( 'Error connecting to MySQL server.' );

                $query = "INSERT INTO wk5_email_list ( firstname, lastname, email, street_address, city,  state_id, zip ) VALUES ( '$first_name', '$last_name', '$email', '$address', '$city', '$state', '$zipcode' )";

                mysqli_query( $dbc, $query ) or die ( 'Data not inserted.' );

                echo 'Customer added.';

                mysqli_close( $dbc );
            }
            if ( $output_form == 'yes' ) { ?>

                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="col s12 m6 l6">
                        <label for="firstname">First name:</label>
                        <input type="text" id="firstname" name="firstname" value="<?php if( isset( $first_name ) ) { echo $first_name; } ?>" />
                    </div><!-- .col .s12 .m6 .l6 -->
                    <div class="col s12 m6 l6">
                        <label for="lastname">Last name:</label>
                        <input type="text" id="lastname" name="lastname" value="<?php if( isset( $last_name ) ) { echo $last_name; } ?>" />
                    </div><!-- .col .s12 .m6 .l6 -->
                    <div class="col s12 m6 l6">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="<?php if( isset( $email ) ) { echo $email; } ?>" /><br />
                    </div><!-- .col .s12 .m6 .l6 -->
                    <div class="col s12 m6 l6">
                        <label for="phone">Phone</label>
                        <input type="text" id="email" name="email" value="<?php if( isset( $email ) ) { echo $email; } ?>" /><br />
                    </div><!-- .col .s12 .m6 .l6 -->
                    <div class="input-field col s12">
                        <textarea id="comments" class="materialize-textarea" value="<?php if( isset( $address ) ) { echo $address; } ?>"></textarea>
                        <label for="comments">Comments</label>
                    </div>
                    <div class="col s12 m12 l12">
                        <input type="submit" class="waves-effect waves-light btn contact-submit" name="Submit" value="Submit" />
                    </div><!-- .col .s12 .m6 .l6 -->
                </form>
                <?php
            }
            ?>
        </div><!-- col s12 m12 l8 card -->
    </div><!-- .col .s12 .m12 .l12 -->
</div> <!-- .container  -->
</div> <!-- .row  -->
<?php require_once('footer.php');