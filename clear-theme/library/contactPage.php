<?php
$nonce = wp_create_nonce( 'invent-contact-nonce' );
wp_localize_script('invent-contact', 'inventContact', array(
	'ajaxurl'=> admin_url( 'admin-ajax.php' ),
	'nonce'  => $nonce
	)
);

$contactForm = '<form id="contact-form" action="'.admin_url( 'admin-ajax.php' ).'" method="post" class="invent-form">
<fieldset>
<input type="hidden" name="nonce" id="contact-nonce" value="'.$nonce.'" />
<input type="text" name="name" id="contact-name" value="" class="text-input required" />
<p><label for="contact-name">'. __('Name','invent').'</label></p>
<p><label class="error" for="contact-name" id="contact-name-error">'.__('This field is required.','invent').'</label></p>
<input type="text" name="email" id="contact-email" value="" class="text-input required email" />
<p><label for="contact-email">'.__('Your e-mail','invent').'</label></p>
<p><label class="error" for="contact-email" id="contact-email-error">'.__('This field is required.','invent').'</label></p>
<p><label class="error" for="contact-email" id="contact-email-error2">'.__('Enter correct e-mail.','invent').'</label></p>
<input type="text" name="subject" id="contact-subject" />
<p><label for="contact-subject">'.__('Subject','invent').'</label></p>
<textarea name="message" id="contact-message" class="required" rows="12" cols="10"></textarea>
<label for="contact-message">'.__('Message','invent').'</label>
<p><label class="error" for="contact-message" id="contact-message-error">'.__('This field is required.','invent').'</label></p>
<p><input type="submit" name="submit" id="submit-button" value="'.__('Submit','invent').'" /></p>
</fieldset></form>';