<?php 
  $job_category = wp_get_post_terms(get_the_ID(), 'job_category');
?>
<?php print '<?xml version="1.0" encoding="utf-8"?>';?>
<source>
  <publisher>Petrosoft LLC</publisher>
  <publisherurl>https://www.petrosoftinc.com</publisherurl>
  <lastBuildDate><?php print date("D,j F Y g:i"); ?></lastBuildDate>
  <?php  foreach ($jobs as $job): ?>
    <job>
      <title><![CDATA[<?php print $job->post_title?>]]></title>
      <date><![CDATA[<?php print get_the_modified_date('D, d F Y H:i',$job); ?>]]></date>
      <referencenumber><![CDATA[<?php print $job->ID ?>]]></referencenumber>
      <url><![CDATA[<?php print the_permalink($job->ID); ?>]]></url>
      <company><![CDATA[PetrosoftLLC]]></company>
      <city><![CDATA[<?php print get_field("city", $job->ID);?>]]></city>
      <state><![CDATA[<?php print get_field("state", $job->ID);?>]]></state>
      <country><![CDATA[<?php print get_field("country", $job->ID);?>]]></country>
      <postalcode><![CDATA[<?php print get_field( "postalcode", $job->ID);?>]]></postalcode>
      <description><![CDATA[<?php print get_field( "summary", $job->ID);?>]]></description>
      <salary><![CDATA[<?php print get_field("salary", $job->ID);?>]]></salary>
      <education><![CDATA[<?php print get_field("education", $job->ID);?>]]></education>
      <category><![CDATA[<?php print $job_category[0]->name;?>]]></category>
      <experience><![CDATA[<?php print get_field("responsibilities", $job->ID);?><?php print get_field("experience", $job->ID);?>]]></experience>
    </job>
  <?php endforeach; ?>
</source>