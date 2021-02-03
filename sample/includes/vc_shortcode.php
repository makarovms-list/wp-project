<?php
/*
Element Description: VC Info Box
*/
// Element Class 
class vcInfoBox extends WPBakeryShortCode {
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_card_cso_solution_mapping' ) );
        add_shortcode( 'vc_card_cso_solution', array( $this, 'vc_card_cso_solution_html' ) );
        add_action( 'init', array( $this, 'vc_jobs_element_mapping' ) );
        add_shortcode( 'vc_jobs_element', array( $this, 'vc_jobs_element_html' ) );
        
        
    }


    public function vc_card_cso_solution_mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        vc_map(
            array(
                'name' => __('CSO Solution', 'petrosoft-vc'),
                'base' => 'vc_cso_solution_element',
                'description' => __('CSO Solution Widget', 'petrosoft-vc'),
                'category' => __('CSO', 'petrosoft-vc'),
                'icon' => get_template_directory_uri().'/includes/images/card_with_image.png',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 1]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_1',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 1', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 1',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 1]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_1',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 1', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 1]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_1',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 1', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 2]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_2',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 2', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 2',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 2]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_2',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 2', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 2]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_2',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 2', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 3]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_3',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 3', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 3',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 3]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_3',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 3', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 3]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_3',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 3', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 4]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_4',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 4', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 4',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 4]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_4',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 4', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 4',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 4]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_4',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 4', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 4',
                    ),
                )
            )
        );
    }

   
    public function vc_card_cso_solution_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title_cso_solution_1'	=>	'',
                    'desc_cso_solution_1'	=>	'',
                    'shortcode_cso_solution_1'	=>	'',
                    'title_cso_solution_2'	=>	'',
                    'desc_cso_solution_2'	=>	'',
                    'shortcode_cso_solution_2'	=>	'',
                    'title_cso_solution_3'	=>	'',
                    'desc_cso_solution_3'	=>	'',
                    'shortcode_cso_solution_3'	=>	'',
                    'title_cso_solution_4'	=>	'',
                    'desc_cso_solution_4'	=>	'',
                    'shortcode_cso_solution_4'	=>	'',
                ),
                $atts
            )
        );

   /*
        $html = "<div class='swiper-container'><div class='swiper-wrapper'>";
        $html .= "<div class='swiper-slide'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_1."</p>"."</div>";
        $html .= "<div class='swiper-slide'><h3>".$title_cso_solution_2."</h3><p>".$desc_cso_solution_2."</p>"."</div>";
        $html .= "<div class='swiper-slide'><h3>".$title_cso_solution_3."</h3><p>".$desc_cso_solution_3."</p>"."</div>";
        $html .= "<div class='swiper-slide'><h3>".$title_cso_solution_4."</h3><p>".$desc_cso_solution_4."</p>"."</div>";
        $html .= "</div><div class='swiper-pagination'></div></div>";    
    */
        $html = "<div class='swiper-container'><div class='swiper-wrapper'>";
        $html .= "</div><div class='swiper-pagination'></div></div>";    
        return $html;
    }



    public function vc_jobs_element_mapping() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        // Map the block with vc_map()
        vc_map(
            array(
                'name' => __('Jobs', 'petrosoft-vc'),
                'base' => 'vc_jobs_element',
                'description' => __('Jobs Widget', 'petrosoft-vc'),
                'category' => __('Careers', 'petrosoft-vc'),
                'icon' => get_template_directory_uri().'/includes/images/card_with_image.png',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 1]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_1',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 1', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 1',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 1]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_1',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 1', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 1]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_1',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 1', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 2]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_2',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 2', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 2',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 2]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_2',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 2', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 2]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_2',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 2', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 3]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_3',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 3', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 3',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 3]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_3',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 3', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 3]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_3',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 3', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Title solution [solution 4]', 'petrosoft-vc' ),
                        'param_name' => 'title_cso_solution_4',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Title for solution 4', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 4',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Description solution [solution 4]', 'petrosoft-vc' ),
                        'param_name' => 'desc_cso_solution_4',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Description for solution 4', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 4',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'custom-class',
                        'heading' => __( 'Shortcode slider [solution 4]', 'petrosoft-vc' ),
                        'param_name' => 'shortcode_cso_solution_4',
                        'value' => __( '', 'petrosoft-vc' ),
                        'description' => __( 'Shortcode slider for solution 4', 'petrosoft-vc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Solution 4',
                    ),
                )
            )
        );
    }
    public function vc_jobs_element_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title_cso_solution_1'	=>	'',
                    'desc_cso_solution_1'	=>	'',
                    'shortcode_cso_solution_1'	=>	'',
                    'title_cso_solution_2'	=>	'',
                    'desc_cso_solution_2'	=>	'',
                    'shortcode_cso_solution_2'	=>	'',
                    'title_cso_solution_3'	=>	'',
                    'desc_cso_solution_3'	=>	'',
                    'shortcode_cso_solution_3'	=>	'',
                    'title_cso_solution_4'	=>	'',
                    'desc_cso_solution_4'	=>	'',
                    'shortcode_cso_solution_4'	=>	'',
                ),
                $atts
            )
        );

       

        $html = '';
/*    
        $html = "<div class='swiper-container'><div class='swiper-wrapper'>";
        $html .= "<div class='swiper-slide'><div data-id='1'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_1."</p>".do_shortcode("[slide-anything id='".$shortcode_cso_solution_1."']")."</div></div>";
        $html .= "<div class='swiper-slide'><div data-id='2'><h3>".$title_cso_solution_2."</h3><p>".$desc_cso_solution_2."</p>".do_shortcode("[slide-anything id='".$shortcode_cso_solution_2."']")."</div></div>";
        $html .= "<div class='swiper-slide'><div data-id='3'><h3>".$title_cso_solution_3."</h3><p>".$desc_cso_solution_3."</p>".do_shortcode("[slide-anything id='".$shortcode_cso_solution_3."']")."</div></div>";
        $html .= "<div class='swiper-slide'><div data-id='4'><h3>".$title_cso_solution_4."</h3><p>".$desc_cso_solution_4."</p>".do_shortcode("[slide-anything id='".$shortcode_cso_solution_4."']")."</div></div>";
        $html .= "</div><div class='swiper-pagination'></div></div>";    
*/
        $html = "<div class='swiper-container'><div class='swiper-wrapper'>";
/*
        $html .= "<div class='swiper-slide'><div class='main_container' style='max-width: 1140px;margin: 0 auto;'><div class='content'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_1."</p></div><div class='content right-200pr'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_1."</p></div></div></div>";
        $html .= "<div class='swiper-slide'><div class='main_container' style='max-width: 1140px;margin: 0 auto;'><div class='content'><h3>".$title_cso_solution_2."</h3><p>".$desc_cso_solution_2."</p></div><div class='content right-200pr'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_2."</p></div></div></div>";
        $html .= "<div class='swiper-slide'><div class='main_container' style='max-width: 1140px;margin: 0 auto;'><div class='content'><h3>".$title_cso_solution_3."</h3><p>".$desc_cso_solution_3."</p></div><div class='content right-200pr'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_3."</p></div></div></div>";
        $html .= "<div class='swiper-slide'><div class='main_container' style='max-width: 1140px;margin: 0 auto;'><div class='content'><h3>".$title_cso_solution_4."</h3><p>".$desc_cso_solution_4."</p></div><div class='content right-200pr'><h3>".$title_cso_solution_1."</h3><p>".$desc_cso_solution_4."</p></div></div></div>";
*/
        $html .= "<div class='swiper-slide'><div class='main_container'>".do_shortcode("[slide-anything id='2555']")."</div></div>";
        $html .= "<div class='swiper-slide'><div class='main_container'>".do_shortcode("[slide-anything id='2557']")."</div></div>";
        $html .= "<div class='swiper-slide'><div class='main_container'>".do_shortcode("[slide-anything id='2559']")."</div></div>";
        $html .= "<div class='swiper-slide'><div class='main_container'>".do_shortcode("[slide-anything id='2562']")."</div></div>";      
        
        $html .= "</div><div class='swiper-pagination'></div><div class='prev-slide'></div><div class='next-slide'></div><div class='notebook'><div class='image' data-image-index='1'></div></div></div>";  
        return $html;

    }


} // End Element Class
// Element Class Init
new vcInfoBox(); 
?>