<?php

$theme_options = get_option('my_theme_settings');
$normal = $theme_options['tarif_normale'];
$reduit = $theme_options['tarif_reduit'];
$enfant = $theme_options['tarif_enfant'];
$membre = $theme_options['tarif_membre'];
$membre_annee = $theme_options['tarif_membre_annee'];
$fb = $theme_options['spoutnik_facebook'];
$email = $theme_options['spoutnik_email'];
$phone = $theme_options['spoutnik_phone'];
$cinema_address = $theme_options['spoutnik_address_cinema'];
?>

<footer class="ui vertical black inverted segment">
    <br>
    <div style="padding: 0 20px;">
        <div class="ui four column grid stackable">
            <div class="column sidebar-footer">
				<h3>ADRESSE</h3>
				<table width="100%">
					<tr style="border-top:1px solid #939393;">
						<td valign="top" style="padding:5px 0;"><h5>CINEMA</h5></td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $cinema_address; ?></h5>
						</td>
					</tr>
					<tr style="border-top:1px solid #939393; border-bottom:1px solid #939393;">
						<td valign="top" width="30%" style="padding:5px 0;"><h5>BUREAU</h5></td>
						<td valign="top" style="padding:5px 0;">
							<h5>Place des Volontaires, 4<br>
								2<sup>e</sup> étage<br>
								CH 1204 Genève</h5>
						</td>
					</tr>
				</table>
                <?php //dynamic_sidebar('sidebar-footer'); ?>
            </div>
            <div class="column">
				<h3>INFOS</h3>
				<table width="100%">
					<tr style="border-top:1px solid #939393; border-bottom:1px solid #939393;">
						<td valign="top" width="50%" style="padding:5px 0;"><h5>PROGRAMMATION</h5></td>
						<td valign="top" style="padding:5px 0;">
							<h5>
								Alice Riva<br>
								Daniel Siemaszko                
							</h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>GRAPHISME</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5>Clovis Duran</h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>EMAIL</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $email; ?></h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>TÉLÉPHONE</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $phone; ?></h5>
						</td>
					</tr>
				</table>
            </div>
            <div class="column">
                <h3>TARIFS</h3>
				<table width="100%">
					<tr style="border-top:1px solid #939393 !important; border-bottom:1px solid #939393;">
						<td valign="top" width="28%"style="padding:5px 0;">
							<h5>NORMAL</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $normal; ?></h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>REDUIT</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $reduit; ?></h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>MEMBRE</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $membre . ' '. $membre_annee ; ?></h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>ENFANT</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5><?php echo $enfant; ?></h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5 style="font-size:13px;">20<sup>ans</sup>/20<sup>chf</sup></h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5>Fr. 5.-</h5>
						</td>
					</tr>
				</table>
            </div>
            <div class="column left aligned">
				<h3>ABO</h3>
				<table width="100%">
					<tr style="border-top:1px solid #939393; border-bottom:1px solid #939393;">
						<td valign="top" width="30%" style="padding:5px 0;">
							<h5>NORMAL</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5>Fr. 120.-</h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>RÉDUIT</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5>Fr. 80.-</h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5>SOUTIEN</h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5>Fr. 160.-</h5>
						</td>
					</tr>
					<tr style="border-bottom:1px solid #939393;">
						<td valign="top" style="padding:5px 0;">
							<h5></h5>
						</td>
						<td valign="top" style="padding:5px 0;">
							<h5 style="font-size:11px">Valable une année, <br>séances illimitées hormis festivals</h5>
						</td>
					</tr>
				</table>
                <!-- <a href="<?php echo esc_url($fb) ?>" target="_blank" class="facebook-icon"><h2><i class="facebook icon"></i></h2></a> -->
            </div>
        </div>
    </div>
    <br><br><br>
</footer>
