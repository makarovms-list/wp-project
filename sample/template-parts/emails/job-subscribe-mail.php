<?php
  $location_type = get_field( "location_type", $email_data['post']->ID);
  $location_type_object = get_field_object('location_type', $email_data['post']->ID);
  $location = get_field( "location", $email_data['post']->ID);
  $contract_type = get_field( "contract_type", $email_data['post']->ID);
  $contract_type_object = get_field_object('contract_type', $email_data['post']->ID);
  $job_category = wp_get_post_terms($email_data['post']->ID, 'job_category');
  $summary = get_field('summary', $email_data['post']->ID);
  $responsibilities = get_field('responsibilities', $email_data['post']->ID);
  $experience = get_field('experience', $email_data['post']->ID);
?>


<h1 style="font-size: 40px;line-height: 48px;margin: 0;"><?php print $email_data['post']->post_title; ?></h1>
<br>
<table>
  <tbody>
    <tr>
      <?php if($location_type == 'address'): ?>
        <td style="vertical-align: middle;"><img src="<?php print get_template_directory_uri();?>/images/email/j-location.png"></td>
        <td style="
          font-family: Arial,Helvetica,sans-serif;
          vertical-align: middle;
          box-sizing: border-box;
          padding-left: 5px;
          padding-right: 0%;
          padding-top: 0%;
          color: black;
          padding-bottom: 0%;
          font-size: 16px;
          font-weight: 700;
          line-height: 22px;">
        <?php print $location; ?></td>
      <?php else: ?>  
        <td style="vertical-align: middle;"><img src="<?php print get_template_directory_uri();?>/images/email/j-world.png"></td>
        <td style="
          font-family: Arial,Helvetica,sans-serif;
          vertical-align: middle;
          box-sizing: border-box;
          padding-left: 5px;
          padding-right: 0%;
          padding-top: 0%;
          padding-bottom: 0%;
          font-size: 16px;
          font-weight: 700;
          line-height: 22px;">
        <?php print $location_type_object['choices'][$location_type]; ?></td>
      <?php endif; ?>   
      <td style="vertical-align: middle;"><img src="<?php print get_template_directory_uri();?>/images/email/j-time.png"></td>
      <td style="
        font-family: Arial,Helvetica,sans-serif;
        vertical-align: middle;
        box-sizing: border-box;
        padding-left: 5px;
        padding-right: 0%;
        padding-top: 0%;
        padding-bottom: 0%;
        font-size: 16px;
        font-weight: 700;
        line-height: 22px;">
      <?php print $contract_type_object['choices'][$contract_type]; ?></td>
      <?php if(is_array($job_category) && isset($job_category[0])):?>
        <td style="vertical-align: middle;"><img src="<?php print get_template_directory_uri();?>/images/email/j-people.png"></td>
        <td style="
          font-family: Arial,Helvetica,sans-serif;
          vertical-align: middle;
          box-sizing: border-box;
          padding-left: 5px;
          padding-right: 0%;
          padding-top: 0%;
          padding-bottom: 0%;
          font-size: 16px;
          font-weight: 700;
          line-height: 22px;">
        <?php print $job_category[0]->name; ?></td>
      <?php endif; ?>
   </tr>
  </tbody> 
</table>
<br>
<table role="presentation" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0;vertical-align:top;width:100%;min-width:100%;border-bottom-width:1px;border-bottom-color:#d8d8d8;border-bottom-style:dotted" width="100%">
  <tbody><tr>
      <td style="border:0 none transparent;padding:0;vertical-align:top;width:100%;font-size:0;line-height:0">&nbsp;</td>
    </tr>
  </tbody>
</table>
<br>
<h2>Summary</h2>
<?php print $summary; ?>
<?php if (isset($responsibilities) && $responsibilities != ''):?>
  <h2>Responsibilities:</h2>
  <?php print $responsibilities ?>
<?php endif; ?>
<?php if (isset($experience) && $experience != ''):?>
  <h2>Additional Experience:</h2>
  <?php print $experience; ?>
<?php endif; ?>
<br>
<a style="display:block;" href="<?php print get_post_permalink($email_data['post']->ID)?>" target="_blank">
  <span style="display:inline-block;vertical-align:middle;padding:13px;font-size:20px;font-weight: bold; color:#ffffff;word-wrap:break-word!important;white-space:normal;box-sizing:content-box;text-align:center;background-color:#3e74e7;border:1px solid #3e74e7;border-radius:6px;min-width:272px"><span style="font-size:18px">APPLY NOW</span></span>
</a>
<br>
<table role="presentation" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0;vertical-align:top;width:100%;min-width:100%;border-bottom-width:1px;border-bottom-color:#d8d8d8;border-bottom-style:dotted" width="100%">
  <tbody><tr>
      <td style="border:0 none transparent;padding:0;vertical-align:top;width:100%;font-size:0;line-height:0">&nbsp;</td>
    </tr>
  </tbody>
</table>  
<br>
<table>
  <tbody>
    <tr>
      <td style="    font-family: Arial,Helvetica,sans-serif;
      vertical-align: middle;
      box-sizing: border-box;
      padding-left: 0%;
      padding-right: 0%;
      padding-top: 0%;
      padding-bottom: 0%;
      font-size: 27px;
      font-weight: 700;
      line-height: 22px;
      width: 50%;">Share</td>
    <td>
      <table>
        <tbody>
          <tr>
            <td style="vertical-align: middle;"><a href="http://www.linkedin.com/shareArticle?url=<?php print get_post_permalink($email_data['post']->ID)?>"><img src="<?php print get_template_directory_uri();?>/images/email/linkedin.png"></a></td>
            <td style="vertical-align: middle;"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php print get_post_permalink($email_data['post']->ID)?>"><img src="<?php print get_template_directory_uri();?>/images/email/facebook.png"></a></td>
            <td style="vertical-align: middle;"><a href="https://twitter.com/share?url=<?php print get_post_permalink($email_data['post']->ID)?>"><img src="<?php print get_template_directory_uri();?>/images/email/twitter.png"></a></td>
            <td style="vertical-align: middle;"><a href="mailto:?subject=A link from petrosoftinc.com&amp;body=<?php print $email_data['post']->post_title; ?> <?php print get_post_permalink($email_data['post']->ID)?>"><img src="<?php print get_template_directory_uri();?>/images/email/mail.png"></a></td>
          </tr>
        </tbody>
      </table>
    </td>
    <tr>
  </tbody>
</table>