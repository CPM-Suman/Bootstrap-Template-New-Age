<?php
function theme_customizer_function($wp_customize)
{
  /* Creating a new panel named New Age Theme settings in the customizer. */
  $wp_customize->add_panel(
    'landing_panel',
    [
      'title' => 'New Age Theme settings ',
      'priority' => 10,
      'capability' => 'edit_theme_options',
    ]
  );
  /* Creating a new section named Header in the customizer. */
  $wp_customize->add_section(
    'landing_panel_home',
    [
      'title' => 'Header',
      'panel' => 'landing_panel'
    ]

  );
  //  
  //  site header 
  // site header color
  $wp_customize->add_setting(
    'header_colors',
    [
      'default' => '#fff',
    ]

  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'header_colors',
      [
        'label' => __('Nav Color', 'vile'),
        'section' => 'landing_panel_home',
        'settings' => 'header_colors'
      ]
    )
  );

  /* Adding a setting named Header to the customizer. */
  $wp_customize->add_setting(
    'landing_sec_title',
    [
      'default' => 'Landing Panel heading',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ]

  );

  /* Adding a partial refresh to the landing_sec_title theme mod. */
  $wp_customize->selective_refresh->add_partial(
    'landing_sec_title',
     [
       'selector' => '.navbar-brand',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('landing_sec_title');
      }
      ]
   
  );

  /* Adding a control to Header in the customizer. */
  $wp_customize->add_control(
    'landing_sec_title',
    [
      'label' => 'Header',
      'section' => 'landing_panel_home',
      'priority' => 1,
    ]
  );

  // send feedback button 
  $wp_customize->add_setting(
    'right_side_button',
    [
      'default' => 'Landing Panel heading',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ]
  );

  $wp_customize->selective_refresh->add_partial(
    'right_side_button',
    [
      'selector' => '#send_feedback',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('right_side_button');
      }
    ]
  );

  /* Adding a control to the customizer. */
  $wp_customize->add_control(
    'right_side_button',
    [
      'label' => 'Button',
      'section' => 'landing_panel_home',
      'priority' => 2,

    ]
  );

  /* Creating a section named Landing section  in the customizer. */
  $wp_customize->add_section(
    'main_content_heading',
    [
      'title' => 'Landing Section',
      'panel' => 'landing_panel'
    ]
  );
  // 
//  start main front page content that displays main page , app and ios store logo and video 
// 
//......................................................................................................
/* Adding a checkbox to hide content from Landing Section in the customizer. */
  $wp_customize->add_setting(
    'front_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => true,
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ]
  );
  $wp_customize->add_control(
    'front_page_display',
    [
      'label' => 'Hide this Landing Section',
      'type' => 'checkbox',
      'section' => 'main_content_heading',
      'priority' => 1,
    ]
  );
  // end of show hide section

  // order left/right content
//set image position
  $wp_customize->add_setting('position_set_newage');
  $wp_customize->add_control(
    'position_set_newage',
    [
      'label' => __(
        'Set image position',
      ),
      'section' => 'main_content_heading',
      'type' => 'radio',
      'priority' => 1,
      'choices' => [
        '2' => __('Left'),
        '4' => __('Right'),

      ],
    ]
  );


  // landing section header 
  $wp_customize->add_setting(
    'main_content_heading',
    [

      'default' => 'Showcase your app beautifully.',
      'sanitize_callback' => 'wp_filter_nohtml_kses',

    ]
  );
  /* Adding a partial refresh to the main_content_heading setting. */
  $wp_customize->selective_refresh->add_partial(
    'main_content_heading',
    [
      'selector' => '#main_content_heading',
      'container_inclusive' => true,
      'render_callback' => function () {
        get_theme_mod('main_content_heading');
      }
    ]
  );
  /* Adding a control to the customizer. */
  $wp_customize->add_control(
    'main_content_heading',
    [
      'label' => 'Title',
      'type' => 'text',
      'section' => 'main_content_heading',
      'priority' => 2,
    ]
  );

  // landing section  quote
  $wp_customize->add_setting(
    'main_content',
    [

      'default' => 'Launch your mobile app landing page faster with this free, open source theme from Start Bootstrap!',
      'sanitize_callback' => 'wp_filter_nohtml_kses',

    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'main_content',
    [
      'selector' => '#main_content',
      'container_inclusive' => true,
      'render_callback' => function () {
        get_theme_mod('main_content');
      }
    ]
  );
  $wp_customize->add_control(
    'main_content',
    [
      'label' => 'Discription',
      'type' => 'textarea',
      'section' => 'main_content_heading',
      'priority' => 2,

    ]
  );
  // 
  // custom logos   such as andriod and ios
  // 
  $wp_customize->add_setting(
    'logo_for_header',
    [
      'sanitize_callback' => 'customizer_repeater_sanitize'
    ]
  );

  $wp_customize->add_control(
    new Customizer_Repeater(
      $wp_customize,
      'logo_for_header',
      [
        'label' => esc_html__('App badge', 'customizer-repeater'),
        'section' => 'main_content_heading',
        'priority' => 2,
        'customizer_repeater_image_control' => true,
        'customizer_repeater_icon_control' => true,
        'customizer_repeater_link_control' => true,
  
      ]
    )
  );
  
 
//   // andriod logo 
//   $wp_customize->add_setting(
//     'logo1',
//     [
//       'default' => '',
//     ]
//   );
//   $wp_customize->add_control(
//     new WP_Customize_Image_Control(
//       $wp_customize,
//       'logo1',
//       [
//         'label' => __('Andriod logo', 'text-domain'),
//         'section' => 'main_content_heading',
//         'priority' => 3,

//       ]
//     )
//   );
//   // 
// // 
//   /* Adding a url  setting to the image in the customizer. */
//   $wp_customize->add_setting(
//     'logo_url',
//     [
//       'capability' => 'edit_theme_options',
//       'sanitize_callback' => 'esc_url_raw',

//     ]
//   );
//   $wp_customize->add_control(
//     'logo_url',
//     [
//       'label' => 'URL',
//       'type' => 'url',
//       'section' => 'main_content_heading',
//       'priority' => 4,
//     ]
//   );
//   // 
//   // 
//   //  ios logo 
//   $wp_customize->add_setting(
//     'logo2',
//     [
//       'capability' => 'edit_theme_options',
//       'default' => '',
//     ]
//   );
//   $wp_customize->add_control(
//     new WP_Customize_Image_Control(
//       $wp_customize,
//       'logo2',
//       [
//         'label' => __('ios Logo', 'text-domain'),
//         'section' => 'main_content_heading',
//         'settings' => 'logo2',
//         'priority' => 5,

//       ]
//     )
//   );

//   /* Adding a setting that allows user to enter url to the image in the customizer. */
//   $wp_customize->add_setting(
//     'logo_url2',
//     [
//       'capability' => 'edit_theme_options',
//       'sanitize_callback' => 'esc_url_raw',
//     ]
//   );
//   $wp_customize->add_control(
//     'logo_url2',
//     [
//       'label' => 'URL',
//       'type' => 'url',
//       'section' => 'main_content_heading',
//       'priority' => 6,
//     ]
//   );


  /* Adding a setting and control for the customizer that allows adding video file inside the frames*/
  $wp_customize->add_setting(
    'video_upload',
    [
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint',
      'type' => 'theme_mod',
    ]
  );
  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'video_upload',
      [
        'label' => __('Default Media Control'),
        'section' => 'main_content_heading',
        'mime_type' => 'video',
        // Required. Can be image, audio, video, application, text
        'button_labels' => [
          // Optional
          'select' => __('Select File'),
          'change' => __('Change File'),
          'default' => __('Default'),
          'remove' => __('Remove'),
          'placeholder' => __('No file selected'),
          'frame_title' => __('Select File'),
          'frame_button' => __('Choose File'),
        ]
      ]
    )
  );
  /* Adding frames outside the video */
  $wp_customize->add_setting(
    'frame_logo',
    [
      'capability' => 'edit_theme_options',
      'default' => '',
    ]
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'frame_logo',
      [
        'label' => __('Frame', 'text-domain'),
        'section' => 'main_content_heading',
        'settings' => 'frame_logo',
        'priority' => 10,

      ]
    )
  );
  // end of Landing Section 
// 
// 
// 
/* Creating a new section named Quote/testimonial section in the customizer. */
  $wp_customize->add_section(
    'front_page_caption',
    [
      'title' => 'Quote/testimonial Section',
      'panel' => 'landing_panel'
    ]
  );
  //..............................Quote/testimonial section hide settings
// 
  $wp_customize->add_setting(
    'second_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => true,
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_attr',

    ]
  );

  $wp_customize->add_control(
    'second_page_display',
    [
      'label' => 'Hide this Quote/testimonial Section',
      'type' => 'checkbox',
      'section' => 'front_page_caption',
      'priority' => 1,
    ]
  );

  // Quote/testimonial section main content 
  $wp_customize->add_setting(
    'second_main_content',
    [
      'default' => '"An intuitive solution to a common problem that we all face, wrapped up in a single app!"',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'second_main_content',
    [
      'selector' => '#second_main_content',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('second_main_content');
      }
    ]
  );
  $wp_customize->add_control(
    'second_main_content',
    [
      'label' => 'Main content Quotes',
      'type' => 'textarea',
      'section' => 'front_page_caption',
      'priority' => 3,

    ]
  );
  // 
  // the next web logo 
  $wp_customize->add_setting(
    'tnwlogo',
    [
      'capability' => 'edit_theme_options',
      'default' => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses',

    ]
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'tnwlogo',
      [
        'label' => __('TNW logo ', 'text-domain'),
        'section' => 'front_page_caption',
        'settings' => 'tnwlogo',
      ]
    )
  );

  /* Creating a new section named App features section in the customizer. */
  $wp_customize->add_section(
    'features_page',
    [
      'title' => 'App features section',
      'panel' => 'landing_panel'
    ]
  );


  //app  features section start 

  //.............................................hide app feature page
  $wp_customize->add_setting(
    'feature_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses',

    ]
  );

  $wp_customize->add_control(
    'feature_page_display',
    [
      'label' => 'Hide this App features section ',
      'type' => 'checkbox',
      'section' => 'features_page',
      'priority' => 1,
    ]
  );

  // feature section video 
  $wp_customize->add_setting(
    'video_upload_second',
    [
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint',
      'type' => 'theme_mod',
    ]
  );
  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'video_upload_second',
      [
        'label' => __('Default Media Control'),
        'section' => 'features_page',
        'mime_type' => 'video',
        // Required. Can be image, audio, video, application, text
        'button_labels' => [
          // Optional
          'select' => __('Select File'),
          'change' => __('Change File'),
          'default' => __('Default'),
          'remove' => __('Remove'),
          'placeholder' => __('No file selected'),
          'frame_title' => __('Select File'),
          'frame_button' => __('Choose File'),
          'priority' => 1,

        ]
      ]
    )
  );
  $wp_customize->add_setting(
    'frame_logo_next',
    [
      'capability' => 'edit_theme_options',
      'default' => '',
    ]
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'frame_logo_next',
      [
        'label' => __('Frame', 'text-domain'),
        'section' => 'features_page',
        'settings' => 'frame_logo_next',
        'priority' => 20,

      ]
    )
  );
  //App  features section


// app feature through repeater 
  $wp_customize->add_setting(
    'app_feature_repeater',
    [
      'sanitize_callback' => 'customizer_repeater_sanitize'
    ]
  );

  $wp_customize->add_control(
    new Customizer_Repeater(
      $wp_customize,
      'app_feature_repeater',
      [
        'label' => esc_html__('App Feature', 'customizer-repeater'),
        'section' => 'features_page',
        'priority' => 3,
        'customizer_repeater_title_control' => true,
        'customizer_repeater_text_control' => true,
        'customizer_repeater_image_control' => true,
        'customizer_repeater_icon_control' => true,  
      ]
    )
  );




//  first features 
// heading of the features

  $wp_customize->add_setting(
    'first_features_heading',
    [
      'default' => 'Device Mockups',
      'sanitize_callback' => 'wp_filter_nohtml_kses',

    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'first_feature_heading',
    [
      'selector' => '#first_feature_heading',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('first_feature_heading');
      }
    ]
  );
  $wp_customize->add_control(
    'first_features_heading',
    [
      'label' => 'First Features Heading',
      'section' => 'features_page',
      'priority' => 2,

    ]
  );
  // first  features content
  $wp_customize->add_setting(
    'first_features_content',
    [
      'default' => 'Ready to use HTML/CSS device mockups, no Photoshop required!',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
      // to sanitize heading 
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'first_features_content',
    [
      'selector' => '#first_features_content',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('first_features_content');
      }
    ]
  );
  $wp_customize->add_control(
    'first_features_content',
    [
      'label' => 'First Features Content',
      'type' => 'textarea',
      'section' => 'features_page',
      'priority' => 3,
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  // 
  // second  features Heading
  // 
  $wp_customize->add_setting(
    'second_features_heading',
    [
      'default' => 'Flexible Use',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'second_feature_heading',
    [
      'selector' => '#second_feature_heading',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('second_feature_heading');
      }
    ]
  );
  $wp_customize->add_control(
    'second_features_heading',
    [
      'label' => 'Second Features Heading',
      'type' => 'text',
      'section' => 'features_page',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
      'priority' => 4,

    ]
  );
  // 
  // second  features content
  // 
  $wp_customize->add_setting(
    'second_features_content',
    [
      'default' => 'Put an image, video, animation, or anything else in the screen!',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'second_features_content',
    [
      'selector' => '#second_features_content',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('second_features_content');
      }
    ]
  );
  $wp_customize->add_control(
    'second_features_content',
    [
      'label' => 'Second Features Content',
      'type' => 'textarea',
      'section' => 'features_page',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
      'priority' => 5,

    ]
  );
  // third features heading Free to Use
  $wp_customize->add_setting(
    'third_features_heading',
    [
      'default' => 'Free to Use',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'third_feature_heading',
    [
      'selector' => '#third_feature_heading',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('third_feature_heading');
      }
    ]
  );
  $wp_customize->add_control(
    'third_features_heading',
    [
      'label' => 'Third Features Heading',
      'type' => 'text',
      'section' => 'features_page',
      'priority' => 6,

    ]
  );
  // 
  // third features content 
  $wp_customize->add_setting(
    'third_features_content',
    [
      'default' => 'As always, this theme is free to download and use for any purpose!',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'third_feature_content',
    [
      'selector' => '#third_feature_content',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('third_feature_content');
      }
    ]
  );
  $wp_customize->add_control(
    'third_features_content',
    [
      'label' => 'Third Features Content',
      'type' => 'textarea',
      'section' => 'features_page',
      'priority' => 7,

    ]
  );
  // 
// forth features heading 
  $wp_customize->add_setting(
    'forth_features_heading',
    [
      'default' => 'Open Source',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'forth_features_heading',
    [
      'selector' => '#forth_features_heading',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('forth_features_heading');
      }
    ]
  );
  
  $wp_customize->add_control(
    'forth_features_heading',
    [
      'label' => 'Forth Features Heading',
      'type' => 'text',
      'section' => 'features_page',
      'priority' => 8,

    ]
  );
  // 
// forth features content 
  $wp_customize->add_setting(
    'forth_features_content',
    [
      'default' => 'Since this theme is MIT licensed, you can use it commercially!',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'forth_features_content',
    [
      'selector' => '#forth_features_content',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('forth_features_content');
      }
    ]
  );
  $wp_customize->add_control(
    'forth_features_content',
    [
      'label' => 'Third Features Content',
      'type' => 'textarea',
      'section' => 'features_page',
      'priority' => 9,

    ]
  );


  /* Creating a new section named Basic features section in the customizer. */
  $wp_customize->add_section(
    'third_page',
    [
      'title' => 'Basic features section',
      'panel' => 'landing_panel'
    ]
  );
  // 
  //.............................hide Basic features section
  $wp_customize->add_setting(
    'third_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->add_control(
    'third_page_display',
    [
      'label' => 'Hide this Basic features section ',
      'type' => 'checkbox',
      'section' => 'third_page',
      'priority' => 1,
    ]
  );
  /* The above code is creating a new setting and control for the customizer and repeater  */
  $wp_customize->add_setting(
    'customizer_repeater_example',
    [
      'sanitize_callback' => 'customizer_repeater_sanitize'
    ]
  );
  $wp_customize->add_control(
    new Customizer_Repeater(
      $wp_customize,
      'customizer_repeater_example',
      [
        'label' => esc_html__('Basic Features Section', 'customizer-repeater'),
        'section' => 'third_page',
        'priority' => 1,
        'customizer_repeater_title_control' => true,
        'customizer_repeater_text_control' => true,
        'customizer_repeater_repeater_control' => true
      ]
    )
  );
  // Basic features section heading
  $wp_customize->add_setting(
    'third_page_heading',
    [
      'default' => 'Enter a new age of web design',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'third_page_heading',
    [
      'selector' => '#third_page_heading',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('third_page_heading');
      }
    ]
  );
  $wp_customize->add_control(
    'third_page_heading',
    [
      'label' => 'Main heading ',
      'type' => 'text',
      'section' => 'third_page',
      'priority' => 5,

    ]
  );
  // 
// Basic features section content 
  $wp_customize->add_setting(
    'third_page_content',
    [
      'default' => "This section is perfect for featuring some information about your application, why it was built, the problem it solves, or anything else! There's plenty of space for text here, so don't worry about writing too much.",
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'third_page_content',
    [
      'selector' => '#third_page_content',
      'container_inclusive' => true,
      'render_callback' => function () {
        get_theme_mod('third_page_content');
      }
    ]
  );
  $wp_customize->add_control(
    'third_page_content',
    [
      'label' => 'Content ',
      'type' => 'textarea',
      'section' => 'third_page',
      'priority' => 6,

    ]
  );
  // Basic features section circle image 
  $wp_customize->add_setting(
    'thirdlogo',
    [
      'capability' => 'edit_theme_options',
      'default' => '',
    ]
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'thirdlogo',
      [
        'label' => __('Image ', 'text-domain'),
        'section' => 'third_page',
        'settings' => 'thirdlogo',
      ]
    )
  );


  /* Creating a new section named Call to action section in the customizer. */
  $wp_customize->add_section(
    'forth_page',
    [
      'title' => 'Call to action section',
      'panel' => 'landing_panel'
    ]
  );
  // 
  // Show/hide Call to action section
  $wp_customize->add_setting(
    'forth_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );

  $wp_customize->add_control(
    'forth_page_display',
    [
      'label' => 'Hide this Call to action section ',
      'type' => 'checkbox',
      'section' => 'forth_page',
      'priority' => 1,
    ]
  );
  // Call to action section first quotes
  $wp_customize->add_setting(
    'first_quotes',
    [
      'default' => 'Stop waiting.',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'first_quotes',
    [
      'selector' => '#first_quotes',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('first_quotes');
      }
    ]
  );
  $wp_customize->add_control(
    'first_quotes',
    [
      'label' => 'First quotes ',
      'type' => 'text',
      'section' => 'forth_page',
      'priority' => 6,

    ]
  );
  // Call to action section second quotes
  $wp_customize->add_setting(
    'second_quotes',
    [
      'default' => 'Start building.',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'second_quotes',
    [
      'selector' => '#second_quotes',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('second_quotes');
      }
    ]
  );
  $wp_customize->add_control(
    'second_quotes',
    [
      'label' => 'second quotes ',
      'type' => 'text',
      'section' => 'forth_page',
      'priority' => 6,

    ]
  );
  // download for free button content in Call to action section
  $wp_customize->add_setting(
    'download_button',
    [
      'default' => 'Download for free',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'download_button',
    [
      'selector' => '#download_button_content',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('download_button');
      }
    ]
  );
  $wp_customize->add_control(
    'download_button',
    [
      'label' => 'Content inside button  ',
      'type' => 'text',
      'section' => 'forth_page',
      'priority' => 6,

    ]
  );
  /* Adding a url to the button in the customizer. */
  $wp_customize->add_setting(
    'download_url',
    [
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',

    ]
  );

  $wp_customize->add_control(
    'download_url',
    [
      'label' => 'URL',
      'type' => 'url',
      'section' => 'forth_page',
      'priority' => 7,
    ]
  );

  /* Creating a new section named App badge section in the customizer. */
  $wp_customize->add_section(
    'downloads_page',
    [
      'title' => ' App badge section',
      'panel' => 'landing_panel'
    ]
  );


  //....................................Show/hide App badge section

  $wp_customize->add_setting(
    'download_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->add_control(
    'download_page_display',
    [
      'label' => 'Hide this App badge section ',
      'type' => 'checkbox',
      'section' => 'downloads_page',
      'priority' => 1,
    ]
  );
  //  App badge section header 
  $wp_customize->add_setting(
    'download_content',
    [
      'default' => 'Get the app now!',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'download_content',
    [
      'selector' => '#get_the_app',
      'container_inclusive' => false,
      'render_callback' => function () {
        get_theme_mod('download_content');
      }
    ]
  );
  $wp_customize->add_control(
    'download_content',
    [
      'label' => 'Download Content  ',
      'type' => 'text',
      'section' => 'downloads_page',
      'priority' => 1,

    ]
  );
  // logos 

// andriod logo  through repeater 
$wp_customize->add_setting(
  'logo_for_footer',
  [
    'sanitize_callback' => 'customizer_repeater_sanitize'
  ]
);

$wp_customize->selective_refresh->add_partial(
  'download_content',
  [
    'selector' => '.selectiverefresh-flogo',
    'container_inclusive' => false,
    'render_callback' => function () {
      get_theme_mod('logo_for_footer');
    }
  ]
);

$wp_customize->add_control(
  new Customizer_Repeater(
    $wp_customize,
    'logo_for_footer',
    [
      'label' => esc_html__('App badge', 'customizer-repeater'),
      'section' => 'downloads_page',
      'priority' => 2,
      'customizer_repeater_image_control' => true,
      'customizer_repeater_icon_control' => true,
      'customizer_repeater_link_control' => true,
      'customizer_repeater_text2_control' => true,
      'customizer_repeater_text_control' => true,
      'customizer_repeater_text5_control' => true,


    ]
  )
);



//   // andriod logo footer 
//   $wp_customize->add_setting(
//     'logo3',
//     [
//       'capability' => 'edit_theme_options',
//       'default' => '',
//     ]
//   );
//   $wp_customize->selective_refresh->add_partial(
//     'logo3',
//     [
//       'selector' => '#logo3',
//       'container_inclusive' => false,
//       'render_callback' => function () {
//         get_theme_mod('logo3');
//       }
//     ]
//   );
//   $wp_customize->add_control(
//     new WP_Customize_Image_Control(
//       $wp_customize,
//       'logo3',
//       [
//         'label' => __('Logo First', 'text-domain'),
//         'section' => 'downloads_page',
//         'settings' => 'logo3',
//         'priority' => 3,
//       ]
//     )
//   );
//   /* Adding a url  setting to the first logo in the customizer. */
//   $wp_customize->add_setting(
//     'logo_url4',
//     [
//       'capability' => 'edit_theme_options',
//       'sanitize_callback' => 'esc_url_raw',

//     ]
//   );
//   $wp_customize->add_control(
//     'logo_url4',
//     [
//       'label' => 'URL',
//       'type' => 'url',
//       'section' => 'downloads_page',
//       'priority' => 4,
//     ]
//   );
//   // 
// //  ios logo  footer 
//   $wp_customize->add_setting(
//     'logo4',
//     [
//       'capability' => 'edit_theme_options',
//       'default' => '',
//     ]
//   );
//   $wp_customize->selective_refresh->add_partial(
//     'logo4',
//     [
//       'selector' => '#logo4',
//       'container_inclusive' => false,
//       'render_callback' => function () {
//         get_theme_mod('logo4');
//       }
//     ]
//   );
//   $wp_customize->add_control(
//     new WP_Customize_Image_Control(
//       $wp_customize,
//       'logo4',
//       [
//         'label' => __('Logo Second', 'text-domain'),
//         'section' => 'downloads_page',
//         'settings' => 'logo4',
//         'priority' => 5,
//       ]
//     )
//   );
//   /* Adding a url  setting to the logo inside the customizer. */
//   $wp_customize->add_setting(
//     'logo_url5',
//     [
//       'capability' => 'edit_theme_options',
//       'sanitize_callback' => 'esc_url_raw',

//     ]
//   );
//   $wp_customize->add_control(
//     'logo_url5',
//     [
//       'label' => 'URL',
//       'type' => 'url',
//       'section' => 'downloads_page',
//       // 'input_attrs' => [
//       //   'placeholder' => __( 'http://www.google.com' ),
//       // ),
//       'priority' => 6,
//     ]
//   );

  /* Creating a new section in the customizer. */
  $wp_customize->add_section(
    'footer_panel',
    [
      'title' => 'Footer',
      'panel' => 'landing_panel'
    ]
  );
  //.............footer section 
  //.............................................show/hide footer pannel section 

  $wp_customize->add_setting(
    'footer_page_display',
    [
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->add_control(
    'footer_page_display',
    [
      'label' => 'Hide this footer section ',
      'type' => 'checkbox',
      'section' => 'footer_panel',
      'priority' => 1,
    ]
  );
  // 
  // footer pannel content
  $wp_customize->add_setting(
    'footer_panel_title',
    [
      'default' => __('Footer pannel'),
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    ]
  );
  $wp_customize->selective_refresh->add_partial(
    'footer_panel_title',
    [
      'selector' => '#footer_content',
      'container_inclusive' => true,
      'render_callback' => function () {
        get_theme_mod('footer_panel_title');
      }
    ]
  );
  $wp_customize->add_control(
    'footer_panel_title',
    [
      'label' => 'Footer content ',
      'section' => 'footer_panel',
      'priority' => 3,
    ]
  );














//   $wp_customize->add_section( 'section_id', array(
//     'title' => 'Section Title',
//     'priority' => 30,
// ) );

// $wp_customize->add_setting( 'repeater_field_id', array(
//     'default' => '',
//     'transport' => 'refresh'
// ) );

// $wp_customize->add_control( new WP_Customize_Repeater( $wp_customize, 'repeater_field_id', array(
//     'label' => 'Repeater Field',
//     'section' => 'footer_panel',
//     'settings' => 'repeater_field_id',
//     'fields' => array(
//         'custom_field_id' => array(
//             'type' => 'text',
//             'label' => 'Custom Field Label',
//             'function' => 'custom_repeater_field'
//         )
//     ),
//     'row_label' => array(
//         'type' => 'field',
//         'value' => 'Row'
//     ),
//     'button_label' => 'Add Row'
// ) ) );





}
add_action('customize_register', 'theme_customizer_function');