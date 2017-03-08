<?php settings_errors(); ?>

<form class="thirty-eight-general-form" action="options.php" method="post">
  <?php settings_fields( 'thirty-eight-contact-options' ); ?>
  <?php do_settings_sections( 'thirty_eight_contact' ); ?>
  <?php submit_button(); ?>
</form>
