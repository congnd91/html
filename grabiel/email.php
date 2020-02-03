<?php

/**
 * Tickets Email Template
 * The template for the email with the purchased tickets when using ticketing plugins (Like WooTickets)
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/tickets/email.php
 *
 * This file is being included in events/lib/tickets/Tickets.php
 *  in the function generate_tickets_email_content. That function has a $tickets
 *  array with elements that have this fields:
 *        $tickets[] = array( 'event_id',
 *                              'ticket_name'
 *                              'holder_name'
 *                              'order_id'
 *                              'ticket_id'
 *                              'security_code')
 *
 * @since 4.0
 * @since 4.5.11 Ability to remove display of event date.
 * @since 4.7.4  Change event date to display by default.
 *               Display WooCommerce featured image.
 *               Current ticket action hook before output.
 * @since 4.7.6  Ability to filter ticket image.
 * @since 4.10.9 Use function for text.
 *
 * @version 4.10.9
 *
 * @var array $tickets An array of tickets in the format documented above.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php esc_html_e('Your tickets', 'event-tickets'); ?></title>
	<meta name="viewport" content="width=device-width" />
	<style type="text/css">
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			color: #0a0a0e;
		}

		a,
		img {
			border: 0;
			outline: 0;
		}

		#outlook a {
			padding: 0;
		}

		.ReadMsgBody,
		.ExternalClass {
			width: 100%
		}

		.yshortcuts,
		a .yshortcuts,
		a .yshortcuts:hover,
		a .yshortcuts:active,
		a .yshortcuts:focus {
			background-color: transparent !important;
			border: none !important;
			color: inherit !important;
		}

		body {
			background: #ffffff;
			min-height: 1000px;
			font-family: sans-serif;
			font-size: 14px;
		}

		.appleLinks a {
			color: #006caa;
			text-decoration: underline;
		}

		@media only screen and (max-width: 480px) {

			body,
			table,
			td,
			p,
			a,
			li,
			blockquote {
				-webkit-text-size-adjust: none !important;
			}

			body {
				width: 100% !important;
				min-width: 100% !important;
			}

			body[yahoo] h2 {
				line-height: 120% !important;
				font-size: 28px !important;
				margin: 15px 0 10px 0 !important;
			}

			table.content,
			table.wrapper,
			table.inner-wrapper {
				width: 100% !important;
			}

			table.ticket-content {
				width: 90% !important;
				padding: 20px 0 !important;
			}

			table.ticket-details {
				position: relative;
				padding-bottom: 100px !important;
			}

			table.ticket-break {
				width: 100% !important;
			}

			td.wrapper {
				width: 100% !important;
			}

			td.ticket-content {
				width: 100% !important;
			}

			td.ticket-image img {
				max-width: 100% !important;
				width: 100% !important;
				height: auto !important;
			}

			td.ticket-details {
				width: 33% !important;
				padding-right: 10px !important;
				border-top: 1px solid #ddd !important;
			}

			td.ticket-details h6 {
				margin-top: 20px !important;
			}

			td.ticket-details.new-row {
				width: 50% !important;
				height: 80px !important;
				border-top: 0 !important;
				position: absolute !important;
				bottom: 0 !important;
				display: block !important;
			}

			td.ticket-details.new-left-row {
				left: 0 !important;
			}

			td.ticket-details.new-right-row {
				right: 0 !important;
			}

			table.ticket-venue {
				position: relative !important;
				width: 100% !important;
				padding-bottom: 150px !important;
			}

			td.ticket-venue,
			td.ticket-organizer,
			td.ticket-qr {
				width: 100% !important;
				border-top: 1px solid #ddd !important;
			}

			td.ticket-venue h6,
			td.ticket-organizer h6 {
				margin-top: 20px !important;
			}

			td.ticket-qr {
				text-align: left !important
			}

			td.ticket-qr img {
				float: none !important;
				margin-top: 20px !important
			}

			td.ticket-organizer,
			td.ticket-qr {
				position: absolute;
				display: block;
				left: 0;
				bottom: 0;
			}

			td.ticket-organizer {
				bottom: 0px;
				height: 100px !important;
			}

			td.ticket-venue-child {
				width: 50% !important;
			}

			table.venue-details {
				position: relative !important;
				width: 100% !important;
			}

			a[href^="tel"],
			a[href^="sms"] {
				text-decoration: none;
				color: black;
				pointer-events: none;
				cursor: default;
			}

			.mobile_link a[href^="tel"],
			.mobile_link a[href^="sms"] {
				text-decoration: default;
				color: #006caa !important;
				pointer-events: auto;
				cursor: default;
			}
		}

		@media only screen and (max-width: 320px) {

			td.ticket-venue h6,
			td.ticket-organizer h6,
			td.ticket-details h6 {
				font-size: 12px !important;
			}
		}

		@media print {
			.ticket-break {
				page-break-before: always !important;
			}
		}

		<?php do_action('tribe_tickets_ticket_email_styles'); ?>
	</style>
</head>

<body yahoo="fix" alink="#006caa" link="#006caa" text="#000000" bgcolor="#ffffff" style="width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0 auto; padding:20px 0 0 0; background:#ffffff; min-height:1000px;">
	<div style="margin:0; padding:0; width:100% !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:14px; line-height:145%; text-align:left;">
		<center>
			<?php
			do_action('tribe_tickets_ticket_email_top');

			$count = 0;
			$break = '';
			foreach ($tickets as $ticket) {
				$count++;

				if ($count == 2) {
					$break = 'page-break-before:always !important;';
				}

				$event      = get_post($ticket['event_id']);
				$header_id  = get_post_meta($ticket['event_id'], tribe('tickets.handler')->key_image_header, true);
				$header_img = false;

                
                
                $test = get_post_meta( $event->ID, 'attendee_vorname', true );
				/**
				 * If the ticket is a WooCommerce product and has a featured image,
				 * display it on email.
				 *
				 * @since 4.7.4
				 */
				if ('Tribe__Tickets_Plus__Commerce__WooCommerce__Main' === $ticket['provider'] && class_exists('WC_Product')) {
					$product  = new WC_Product($ticket['product_id']);
					$image_id = $product->get_image_id();
					if (!empty($image_id)) {
						$header_img = wp_get_attachment_image_src($image_id, 'full');
					}
				}

				if (!empty($header_id)) {
					$header_img = wp_get_attachment_image_src($header_id, 'full');
				}

				/**
				 * Filters the ticket image that will be included in the tickets email
				 *
				 * @since 4.7.6
				 *
				 * @param bool|string $header_img False or header image src
				 * @param int         $header_id  Parent post ticket header image ID if set
				 * @param array       $ticket     Ticket information
				 */
				$header_img  = apply_filters('tribe_tickets_email_ticket_image', $header_img, $header_id, $ticket);

				$venue_label = '';
				$venue_name = null;

				if (function_exists('tribe_get_venue_id')) {
					$venue_id = tribe_get_venue_id($event->ID);
					if (!empty($venue_id)) {
						$venue = get_post($venue_id);
					}

					$venue_label = tribe_get_venue_label_singular();

					$venue_name = $venue_phone = $venue_address = $venue_city = $venue_web = '';
					if (!empty($venue)) {
						$venue_name    = $venue->post_title;
						$venue_phone   = get_post_meta($venue_id, '_VenuePhone', true);
						$venue_address = get_post_meta($venue_id, '_VenueAddress', true);
						$venue_city    = get_post_meta($venue_id, '_VenueCity', true);
						$venue_state   = get_post_meta($venue_id, '_VenueStateProvince', true);
						if (empty($venue_state)) {
							$venue_state = get_post_meta($venue_id, '_VenueState', true);
						}
						if (empty($venue_state)) {
							$venue_state = get_post_meta($venue_id, '_VenueProvince', true);
						}
						$venue_zip     = get_post_meta($venue_id, '_VenueZip', true);
						$venue_web     = get_post_meta($venue_id, '_VenueURL', true);
					}

					// $venue_address_style: make sure no double-quotes in the content
					$venue_address_style = "display:block; margin:0; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:13px;";

					$venue_map_url = '';

					if (true === tribe_show_google_map_link($event->ID) && $venue_id) {
						$venue_map_url = esc_url(tribe_get_map_link($venue_id));
					}

					if (empty($venue_map_url)) {
						$venue_address_tag = 'span';
					} else {
						$venue_address_tag = 'a';
						$venue_address_style .= ' color:#006caa !important; text-decoration:underline;';
					}
				}

				$event_date = null;

				/**
				 * Filters whether or not the event date should be included in the ticket email.
				 *
				 * @since 4.5.11
				 * @since 4.7.4    Include event date default value changed to true
				 *
				 * @var bool Include event date? Defaults to true.
				 * @var int  Event ID
				 */
				$include_event_date = apply_filters('tribe_tickets_email_include_event_date', true, $event->ID);

				if ($include_event_date && function_exists('tribe_events_event_schedule_details')) {
					$event_date = tribe_events_event_schedule_details($event);
				}

				if (function_exists('tribe_get_organizer_ids')) {
					$organizers = tribe_get_organizer_ids($event->ID);
				}

				$event_link = function_exists('tribe_get_event_link') ? tribe_get_event_link($event->ID) : get_post_permalink($event->ID);

			?>
				<table class="content" align="center" width="620" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" style="margin:0 auto; padding:0;<?php echo $break; ?>">
					<tr>
						<td align="left" valign="top" class="wrapper" width="620">
							<?php
							/**
							 * Gives an opportunity to manipulate the current ticket before output
							 *
							 * @since  4.7.4
							 *
							 * @param  array $ticket Current ticket information
							 */
							do_action('tribe_tickets_ticket_email_ticket_top', $ticket);
							?>
							<table class="inner-wrapper" border="0" cellpadding="0" cellspacing="0" width="620" bgcolor="#f7f7f7" style="margin:0 auto !important; width:620px; padding:0;">
								<tr>
									<td valign="top" class="ticket-content" align="left" width="580" border="0" cellpadding="20" cellspacing="0" style="padding:20px; background:#f7f7f7;">
										<?php
										if (!empty($header_img)) {
											$header_width = esc_attr($header_img[1]);
											if ($header_width > 580) {
												$header_width = 580;
											}
										?>
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td class="ticket-image" valign="top" align="left" width="100%" style="padding-bottom:15px !important;">
														<img src="<?php echo esc_attr($header_img[0]); ?>" width="<?php echo esc_attr($header_width); ?>" alt="<?php echo esc_attr($event->post_title); ?>" style="border:0; outline:none; height:auto; max-width:100%; display:block;" />
													</td>
												</tr>
											</table>
										<?php
										}
										?>
										<table border="0" cellpadding="0" cellspacing="0" width="100%" align="left">
											<tr>
												<td valign="top" align="left" width="100%" style="padding: 0 !important; margin:0 !important;">
													<p style="color:#0a0a0e !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:15px;">
														Sehr geehrte(r) <span style="color:#0a0a0e !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:15px;"><?php echo $ticket['holder_name']; ?></span><br><br>
														Vielen Dank für Ihre Anmeldung an den Kurs:
                                                       
                                                        <?php var_dump($ticket['holder_vorname']); ?>
                                                       
                                                        
														<p>
												</td>
											</tr>
											<tr>
												<td valign="top" align="left" width="100%" style="padding: 0 !important; margin:0 !important;">
													<h2 style="color:#0a0a0e; margin:0 0 10px 0 !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-style:normal; font-weight:700; font-size:22px; letter-spacing:normal; text-align:left;line-height: 100%;">
														<a style="color:#0a0a0e !important" href="<?php echo esc_url($event_link); ?>"><?php echo $event->post_title; ?></a>
													</h2>
													<?php if (!empty($event_date)) : ?>
														<h4 style="color:#0a0a0e; margin:0 0 10px 0 !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-style:normal; font-weight:700; font-size:15px; letter-spacing:normal; text-align:left;line-height: 100%;">
															<span style="color:#0a0a0e !important"><?php echo $event_date; ?></span>
														</h4>
													<?php endif; ?>
												</td>
											</tr>
											<tr>
												<td valign="top" align="left" width="100%" style="padding: 0 !important; margin:0 !important;">
													<p style="color:#0a0a0e !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:15px;">
														Sobald der Kurs definitiv durchgeführt werden kann, <span style="color:#0a0a0e !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:15px; font-weight:700; padding-bottom:5px;">spätestens jedoch 1 Woche vor Kursbeginn,</span>
														können wir Ihnen den Durchführungsentscheid mitteilen und Ihnen bei einer Kursdurchführung die Einladung sowie unsere AGBs und Anfahrtsplan per separater Email zusenden.
														<p>
												</td>
											</tr>
											<tr>
												<td valign="top" align="left" width="100%" style="padding: 0 !important; margin:0 !important;">
													<p style="color:#0a0a0e !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:15px;">
														Wir freuen uns auf Sie und stehen Ihnen in der Zwischenzeit jederzeit gerne für weitere Fragen zur Verfügung.
														<p>
												</td>
											</tr>
										</table>
										<table class="ticket-details" border="0" cellpadding="0" cellspacing="0" width="100%" align="left">
											<tr>
												<td valign="top" align="left" width="100%" style="padding: 0 !important; margin:0 !important;">
													<p style="color:#0a0a0e !important; font-family: 'Helvetica Neue', Helvetica, sans-serif; font-size:15px;">
														Freundliche Grüsse<br><br>
														Schweizerisches Kompetenzzentrum<br>
														heben-fördern-sichern GmbH<br>
														Industriestrasse 22<br>
														CH-6260 Reiden<br>
														Tel: <a href="tel:+41627491144"> +41 (0)62 749 11 44 </a><br>
														<a href="http://www.hfs.swiss/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable"><span style="color:blue">www.hfs.swiss</span></a><br>
														<a href="https://vimeo.com/213046956" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable"><span style="color:blue">https://vimeo.com/213046956</span></a>
														<p>
												</td>
											</tr>
										</table>
										<table class="whiteSpace" border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td valign="top" align="left" width="100%" height="30" style="height:30px; background:#f7f7f7; padding: 0 !important; margin:0 !important;">
													<div style="margin:0; height:30px;"></div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>

							<table class="x_inner-wrapper" border="0" cellpadding="0" cellspacing="0" width="620" bgcolor="#f7f7f7" style="margin:0 auto!important; width:620px; padding:0">
								<tbody>
									<tr>
										<td valign="top" align="left" width="580" border="0" cellpadding="20" cellspacing="0" colspan="2" style="padding:20px; background:#f7f7f7">
											<h6 style="color:#909090!important; margin:0 0 4px 0; font-family:'Helvetica Neue',Helvetica,sans-serif; text-transform:uppercase; font-size:13px; font-weight:700!important">
												Rechnungsinformation</h6>
										</td>
									</tr>
									<tr>
										<th valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											Rechnungsadresse entspricht Angaben Teilnehmer 1: </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">Ja/Nein</td>
									</tr>
									<tr>
										<th valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											Vorname </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											Hans  </td>
									</tr>
									<tr>
										<th valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											Nachname </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											Musterman</td>
									</tr>									
									<tr>
										<th valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											Adresse </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											Strasse 1 </td>
									</tr>
									<tr>
										<th valign="top"  align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											PLZ / Ort </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											8080 Zürich </td>
									</tr>
									<tr>
										<th valign="top"  align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											Telefon </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											1 </td>
									</tr>
									<tr>
										<th valign="top"  align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											E-Mail </th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											test@test.ch </td>
									</tr>
									<tr>
										<th valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7; min-width:100px">
											Ja ich habe die AGBs gelessen und akzeptiere diese.
										</th>
										<td valign="top" align="left" border="0" cellpadding="20" cellspacing="0" style="padding:0 20px; background:#f7f7f7">
											JA </td>
									</tr>
								</tbody>
							</table>
                            test
                            <?php echo esc_attr($test); ?>
                            test



							<?php do_action('tribe_tickets_ticket_email_ticket_bottom', $ticket); ?>
							<table class="whiteSpace" border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td valign="top" align="left" width="100%" height="100" style="height:100px; background:#ffffff; padding: 0 !important; margin:0 !important;">
										<div style="margin:0; height:100px;"></div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			<?php
			} //end foreach

			do_action('tribe_tickets_ticket_email_bottom');
			?>
		</center>
	</div>
</body>

</html>