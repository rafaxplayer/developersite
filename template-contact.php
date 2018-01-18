<?php 

/* Template Name: Contact template */ 

$nameError = '';
$emailError = '';
$messageError = '';
$emailSent = false;
if(isset($_POST['submitted'])) {
	
	if(trim($_POST['contact_name']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = sanitize_text_field(trim($_POST['contact_name']));
	}

	if(trim($_POST['contact_email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['contact_email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = sanitize_text_field(trim($_POST['contact_email']));
	}

	if(trim($_POST['contact_message']) === '') {
		$messageError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = sanitize_text_field(stripslashes(trim($_POST['contact_message'])));
		} else {
			$comments = sanitize_text_field(trim($_POST['contact_message']));
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('contact_email');
		
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} 

get_header(); ?>

	<main class="contact_template">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					
					<div class="image-post" style="background-image:url(<?php echo get_the_post_thumbnail_url($post); ?>);">
						<?php the_title('<h1 class="page-title title-image">','</h1>'); ?>
					</div>
					
				<?php else:?>
				<!-- /post thumbnail -->
					<!-- post title -->
					<h1 class="page-title">
						<?php the_title(); ?>
					</h1>
					<!-- /post title -->
				<?php endif;?>

				<div class="separator light"></div>
				
				<?php the_content(); ?>

				<div class="contact">
					
					<?php if( get_option('developersite_maps_show') ):?>
						<div id="map"></div>
					<?php endif;?>

					<div class="email">

						<?php if(isset($emailSent) && $emailSent == true): ?>
							<div class="thanks">
								<p>Thanks, your email was sent successfully.</p>
							</div>
							<?php $emailSent = false;?>
						<?php else: ?>
							<?php if(isset($hasError) || isset($captchaError)): ?>
								<p class="error">Sorry, an error occured.<p>
							<?php endif; ?>
						<?php endif; ?>

						<form action="<?php the_permalink(); ?>" method="post" id="contact-form">
							<input type="text" name="contact_name" placeholder="<?php echo __('* Enter your name','developersite')?>" required>
							<?php if($nameError != '') { ?>
								<span class="error"><?php echo $nameError; ?></span>
							<?php } ?>
							<input type="email" name="contact_email" placeholder="<?php echo __('* Enter your email','developersite')?>" required>
							<?php if($emailError != '') { ?>
								<span class="error"><?php echo $emailError;?></span>
							<?php } ?>
							<textarea name="contact_message" id="" cols="30" rows="10" placeholder="<?php echo __('* Enter your message','developersite')?>" required></textarea>
							<?php if($messageError != '') { ?>
								<span class="error"><?php echo $messageError; ?></span>
							<?php } ?>
							<input type="submit" value="<?php echo __('Send Message','developersite')?>">
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</form>
					</div>
					<div class="address">
						<?php if(get_option( 'developersite_contact_address')):?>
							<label id="contact-address"><a href='http://maps.google.com/maps?q=<?php echo urlencode(get_option( 'developersite_contact_address')); ?>'><?php echo get_option( 'developersite_contact_address'); ?></a></label>
						<?php endif; ?>
						<?php if(get_option( 'developersite_contact_phone')):?>
							<label id="contact-phone"><a href="tel:<?php echo get_option( 'developersite_contact_phone'); ?>" target="_top"><?php echo get_option( 'developersite_contact_phone'); ?></a></label>
						<?php endif; ?>
						<?php if(get_option( 'developersite_contact_whatsapp')):?>
							<label id="contact-whatsapp"><a href="https://api.whatsapp.com/send?phone=<?php echo get_option( 'developersite_contact_whatsapp'); ?>" target="_top"><?php echo get_option( 'developersite_contact_whatsapp'); ?></a> </label>
						<?php endif; ?>
							<label id="contact-email"><a href="mailto::<?php echo get_option( 'developersite_contact_email'); ?>"><?php if(get_option('developersite_contact_email')): echo get_option( 'developersite_contact_email'); else: bloginfo('admin_email'); endif; ?></a></label>
					</div>
				</div>
				
				<?php edit_post_link(__( 'Edit', 'developersite' )); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'developersite' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
