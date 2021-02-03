<style>
#schedule-a-demo .vc_column-inner .vc_column-inner {padding-left: 0!important;right: 0!important;}
#schedule-a-demo input[type="text"], #schedule-a-demo input[type="tel"], #schedule-a-demo input[type="email"] {background: #FFFFFF;border: 1px solid #DCE0E5;box-sizing: border-box;border-radius: 4px;margin: 0px 16px 16px 0px;width: calc(100% - 16px);padding: 12px;}
#schedule-a-demo label {font-family: Lato;font-style: normal;font-weight: bold;font-size: 16px;line-height: 24px;color: #2E3B4D;margin: 0px 0px 8px 0px;display: block;}
#schedule-a-demo .vc_row {padding: 0px 0!important;}
#schedule-a-demo input[type="submit"] {padding: 0px 0px 0px 0px;max-width: 211px;height: 48px;background: #3E74E7;border-radius: 4px;text-align: center;border: none;margin: 16px 0px 0px;font-family: Lato;font-style: normal;font-weight: bold;font-size: 16px;line-height: 24px;color: #FFFFFF;text-transform: uppercase;cursor: pointer;width: 100%;}
</style>
<div class="request-demo-block">
    <form id="schedule-a-demo" method="POST" data-action="https://analytics.clickdimensions.com/forms/h/an9VJeTDMUmqUWS9tVNHWA">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="vc_row wpb_row vc_inner vc_row-fluid wpb-flex-align-center">
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="field_container">
                                        <label>First Name <?php print $template_data['fields']['request_demo']['firstname_label']; ?></label>
                                        <input type="text" value="" name="firstname" />
                                        <span class="error"><?php print $template_data['fields']['request_demo']['firstname_error']; ?></span>
                                    </div>
                                    <div class="field_container">
                                        <label>Phone <?php print $template_data['fields']['request_demo']['phone']; ?></label>
                                        <input type="tel" value="" name="phone" />
                                        <span class="error"><?php print $template_data['fields']['request_demo']['phone_error']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="field_container">
                                        <label>Last Name<?php print $template_data['fields']['request_demo']['lastname_label']; ?></label>
                                        <input type="text" value="" name="lastname" />
                                        <span class="error"><?php print $template_data['fields']['request_demo']['lastname_error']; ?></span>
                                    </div>
                                    <div class="field_container">
                                        <label>Email <?php print $template_data['fields']['request_demo']['email']; ?></label>
                                        <input type="tel" value="" name="email" />
                                        <span class="error"><?php print $template_data['fields']['request_demo']['email_error']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vc_row wpb_row vc_inner vc_row-fluid wpb-flex-align-center">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="field_container">
                                        <div class="agree">
										    <input type="checkbox" name="agree" />
											<span>I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information*. <?php print $template_data['fields']['request_demo']['agree_text']; ?></span>
										</div>
                                    </div>
                                    <div class="button_container">
                                        <input type="submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>