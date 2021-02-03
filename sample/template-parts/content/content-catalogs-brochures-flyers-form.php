<?php 
  $catalogs_brochures_flyers_fields = get_field('catalogs_brochures_flyers_fields');
?> 
<style>
.single-post .p-form-placeholder form.ff-form fieldset {border: none;padding: 0px 32px;}
.single-post .p-form-placeholder form.ff-form .description {font-family: Lato;font-style: normal;font-weight: bold;font-size: 24px;line-height: 32px;color: #212B36;margin-bottom: 32px;}
.single-post .p-form-placeholder form.ff-form div {display: block;width: 100%;}
.single-post .p-form-placeholder form.ff-form label {display: block;width: 100%;font-family: Lato;font-style: normal;font-weight: bold;font-size: 16px;line-height: 24px;color: #2E3B4D;margin-bottom: 8px;} 
.single-post .p-form-placeholder form.ff-form input[type=text], 
.single-post .p-form-placeholder form.ff-form input[type=tel], 
.single-post .p-form-placeholder form.ff-form input[type=email] {background: #FFFFFF;border: 1px solid #DCE0E5;box-sizing: border-box;border-radius: 4px;width: 100%;font-family: Lato;font-style: normal;font-weight: bold;font-size: 16px;line-height: 24px;color: #2E3B4D;padding: 11px;margin-bottom: 16px;}
.single-post .p-form-placeholder form.ff-form .agree span {font-family: Lato;font-style: normal;font-weight: normal;font-size: 12px;line-height: 16px;letter-spacing: 0.4px;color: #2E3B4D;}
.single-post .p-form-placeholder form.ff-form .form-group.agree {margin-bottom: 16px;}
.single-post .p-form-placeholder form.ff-form button {width: 100%;border: none;}
.single-post .p-form-placeholder form.ff-form button svg {max-width: 20px;max-height: 20px;margin-right: 10px;}
.single-post .p-form-placeholder form.ff-form .field-container.error input {border: 1px solid #FF3030;}
.single-post .p-form-placeholder form.ff-form .field-container.agree.error span {color: #FF3030;}
@media (max-width: 1024px) {
    .single-post .p-form-placeholder form.ff-form fieldset {padding: 0px 0px!important;}
}
</style>
<form class="ff-form" data-action="<?php print $catalogs_brochures_flyers_fields['cd_request_url']; ?>" data-result="https://www.petrosoftinc.com/thank-you-for-requesting-document/">
    <fieldset>
        <div class="vc_row wpb_row vc_inner vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-12 vc_col-md-12 vc_col-xs-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="description"><?php print $catalogs_brochures_flyers_fields['form_title']; ?></div>
                        <div class="form-group field-container row firstname">
                            <label class="control-label col-form-label text-left" for="firstname">First Name <span>*</span></label>
                            <div class="">
                                <input type="text" class="firstname" id="firstname" name="001" value="">
                            </div>
                        </div>
                        <div class="form-group field-container row lastname">
                            <label class="control-label col-form-label text-left" for="lastname">Last Name <span>*</span></label>
                            <div class="">
                                <input type="text" class="lastname" id="lastname" name="002" value="">
                            </div>
                        </div>
                        <div class="form-group field-container row email">
                            <label class="control-label col-form-label text-left" for="email">E-mail <span>*</span></label>
                            <div class="">
                                <input type="text" class="email" id="email" name="004" value="">
                            </div>
                        </div>
                        <div class="form-group field-container row phone">
                            <label class="control-label col-form-label text-left" for="phone">Phone <span>*</span></label>
                            <div class="">
                                <input type="text" class="phone" id="phone" name="501" value="">
                            </div>
                        </div>
                        <input type="hidden" id="leadsource" class="leadsource" name="013" value="<?php print $catalogs_brochures_flyers_fields['leadsource']; ?>">
                        <input type="hidden" id="source" class="source" name="source" value="<?php print $catalogs_brochures_flyers_fields['gtm-form-name']; ?>">
                        <input type="hidden" name="999-5" class="ff_clientid" value="">
                        <input type="hidden" name="999-6" class="ff_sourcemedium" value="">
                        <input type="hidden" name="999-7" class="ff_campaign" value="">
                        <input type="hidden" name="999-8" class="ff_content" value="">
                        <input type="hidden" name="999-9" class="ff_term" value="">
                        <input type="hidden" name="999-12" class="ff_pagename" value="<?php the_title(); ?>">
                        <input type="hidden" name="999-10" class="ff_pageurl" value="<?php the_permalink(); ?>">
                        <input type="hidden" name="999-11" class="ff_hostname" value="">  
                        <input type="hidden" name="file" class="file" value="<?php print $catalogs_brochures_flyers_fields['file']['url']; ?>">  
                        <div class="form-group field-container row agree">
                            <div class="">
                                <input type="checkbox" class="agree" id="agree" name="agree" value="I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information requested">
                                <span>I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information requested.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="">
                                <button class="btn dark_blue"><svg class="i-svg icon-download-bold"><use xlink:href="#icon-download-bold"></use></svg>Download</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>