<?php

function petrosoft_customize_register( WP_Customize_Manager $wp_customize ) {
  $transport = 'postMessage';
  $wp_customize->add_section( 'slogan_block', [
			'title'     => 'Slogan block',
			'priority'  => 200,
			'description' => 'Slogan block in blog,news,customer stories and resources page', 
		] 
  );
  
  $setting = 'slogan_block_image';

  $wp_customize->add_setting( $setting, [
      'default'      => '',
      'transport'    => $transport
    ]
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize, $setting, [
      'label'    => 'Image',
      'settings' => $setting,
      'section'  => 'slogan_block'
    ] )
  );
  
  $setting = 'slogan_block_slogan';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'slogan_block',
    'label'   => 'Slogan',
    'type'    => 'textarea',
  ] );
  

  $setting = 'slogan_block_name';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'slogan_block',
    'label'   => 'Name',
    'type'    => 'text',
  ] );
  
  $setting = 'slogan_block_post';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'slogan_block',
    'label'   => 'Post',
    'type'    => 'text',
  ] );
  
  $setting = 'slogan_block_mail';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'slogan_block',
    'label'   => 'Mail',
    'type'    => 'text',
  ] );
  
    $wp_customize->add_section( 'jobs_contact_block', [
			'title'     => 'Jobs contact block',
			'priority'  => 200,
			'description' => 'Jobs contact block', 
		] 
  );
  $setting = 'jobs_contact_image';

  $wp_customize->add_setting( $setting, [
      'default'      => '',
      'transport'    => $transport
    ]
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize, $setting, [
      'label'    => 'Image',
      'settings' => $setting,
      'section'  => 'jobs_contact_block'
    ] )
  );
  
  $setting = 'jobs_contact_slogan';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'jobs_contact_block',
    'label'   => 'Slogan',
    'type'    => 'textarea',
  ] );
  

  $setting = 'jobs_contact_name';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'jobs_contact_block',
    'label'   => 'Name',
    'type'    => 'text',
  ] );
  
  $setting = 'jobs_contact_post';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'jobs_contact_block',
    'label'   => 'Post',
    'type'    => 'text',
  ] );
  
  $setting = 'jobs_contact_mail';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'jobs_contact_block',
    'label'   => 'Mail',
    'type'    => 'text',
  ] );
  
  $wp_customize->add_section( 'ie_message', [
			'title'     => 'IE Message',
			'priority'  => 201,
			'description' => 'Message for users with ie', 
		] 
  );
    
  $setting = 'ie_message';
  $wp_customize->add_setting( $setting, [
    'default'    =>  '',
    'transport'  =>  $transport
  ] );

  $wp_customize->add_control( $setting, [
    'section' => 'ie_message',
    'label'   => 'IE Message',
    'type'    => 'textarea',
  ] );
  
}

add_action( 'customize_register', 'petrosoft_customize_register' );
