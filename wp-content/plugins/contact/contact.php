<?php
   /*
   Plugin Name: Contact Form
   Plugin URI: http://localhost/salesforcelead/
   description: >-
  A plugin for contact form
   Author: Vineetha Damodaran
   Author URI: https://www.linkedin.com/in/vineetha-damodaran-85373825/
   License: GPL2
   */
   
 //get_header();
 
  wp_enqueue_style( 'contact',  plugin_dir_url( __FILE__ ) . "css/contact.css" );
 
 function contact() {
		ob_start();
		submit_contact_form();
		contact_form();
	
		return ob_get_clean();
	}
	
	add_shortcode( 'save-leads', 'contact' );
	
	
function submit_contact_form() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$phone = sanitize_text_field( $_POST["cf-phone"] );
		$service = esc_textarea( $_POST["cf-service"] );
		
		
		
            global $wpdb;
            $table = 'sfcontactleads';
            $data = array(
                'name' => $name,
                'email'    => $email,
                'phone' => $phone,
                'service'    => $service
            );
            $format = array(
                '%s',
                '%s'
            );
            $success=$wpdb->insert( $table, $data, $format );
            if($success){
            echo '<div class="fcf-body">

    <div id="fcf-form">Data has been saved</div></div>' ;

		// get the blog administrator's email address
		///$to = get_option( 'admin_email' );

		//$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		//if ( wp_mail( $to, $subject, $message, $headers ) ) {
		//	echo '<div>';
		//	echo '<p>Thanks for contacting us, our expert will contact you soon.</p>';
		//	echo '</div>';
		} else {
			echo 'Something went wrong';
		}
	 }
	}
	
	
	
	
function contact_form() {
	echo '<div class="fcf-body">

    <div id="fcf-form">
    <h3 class="fcf-h3">Contact us</h3>

	
   <form id="fcf-form-id" class="fcf-form-class" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<div class="fcf-form-group">
            <label for="Name" class="fcf-label">Your name</label>
            <div class="fcf-input-group">';
	
	echo '<input required="required" type="text" name="cf-name" class="fcf-form-control" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
	echo '  </div>
        </div>

        <div class="fcf-form-group">
            <label for="Email" class="fcf-label">Your email address</label>
            <div class="fcf-input-group">';
	
	echo '<input required="required" type="email" class="fcf-form-control" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
	echo '  </div>
        </div>

        <div class="fcf-form-group">
            <label for="Phone" class="fcf-label">Phone (required)</label>
            <div class="fcf-input-group">';
	
	
	echo '<input required="required" type="tel" class="fcf-form-control" name="cf-phone" pattern="[0-9 ]+" value="' . ( isset( $_POST["cf-phone"] ) ? esc_attr( $_POST["cf-phone"] ) : '' ) . '" size="20" />';
	
	echo ' </div>
        </div>

        <div class="fcf-form-group">
            <label for="service" class="fcf-label">Service</label>
            <div class="fcf-input-group">';
	
	echo '<select name="cf-service" id="cf-service">
		  <option value="">Select Sevice</option>
		  <option value="Electricity">Electricity</option>
		  <option value="Internet">Internet</option>
		  <option value="Solar">Solar</option>
		  </select>';
	echo '</div>
        </div>';
	echo ' <div class="fcf-form-group"><input type="submit" name="cf-submitted" value="Send"></div>';
	echo '</form>  </div>

</div>';
}


	

?>
<style type="text/css">
/*
#fcf-form {
    display:block;
}

.fcf-body {
    margin: 0;
    font-family: -apple-system, Arial, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
    padding: 30px;
    padding-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    max-width: 100%;
}

.fcf-form-group {
    margin-bottom: 1rem;
}

.fcf-input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}

.fcf-form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    outline: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.fcf-form-control:focus {
    border: 1px solid #313131;
}

select.fcf-form-control[size], select.fcf-form-control[multiple] {
    height: auto;
}

textarea.fcf-form-control {
    font-family: -apple-system, Arial, sans-serif;
    height: auto;
}

label.fcf-label {
    display: inline-block;
    margin-bottom: 0.5rem;
}

.fcf-credit {
    padding-top: 10px;
    font-size: 0.9rem;
    color: #545b62;
}

.fcf-credit a {
    color: #545b62;
    text-decoration: underline;
}

.fcf-credit a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.fcf-btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
    .fcf-btn {
        transition: none;
    }
}

.fcf-btn:hover {
    color: #212529;
    text-decoration: none;
}

.fcf-btn:focus, .fcf-btn.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.fcf-btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.fcf-btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}

.fcf-btn-primary:focus, .fcf-btn-primary.focus {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
}

.fcf-btn-lg, .fcf-btn-group-lg>.fcf-btn {
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: 0.3rem;
}

.fcf-btn-block {
    display: block;
    width: 100%;
}

.fcf-btn-block+.fcf-btn-block {
    margin-top: 0.5rem;
}

input[type="submit"].fcf-btn-block, input[type="reset"].fcf-btn-block, input[type="button"].fcf-btn-block {
    width: 100%;
}

</style>

  
