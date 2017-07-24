<?php
/**
 * aakanksha Theme Customizer
 *
 * @package aakanksha
 */

function aakanksha_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );
    //$wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'widgets' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->get_section( 'header_image' )->panel = 'aakanksha_header_panel';
    $wp_customize->get_section( 'header_image' )->priority = '13';
    $wp_customize->get_section( 'title_tagline' )->priority = '9';
    $wp_customize->get_section( 'title_tagline' )->title = __('Site title/tagline/logo', 'aakanksha');

    //Divider
    class aakanksha_Divider extends WP_Customize_Control {
         public function render_content() {
            echo '<hr style="margin: 15px 0;border-top: 1px dashed #919191;" />';
         }
    }
    //Titles
    class aakanksha_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;border:1px solid;padding:5px;color:#58719E;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
    
    //Titles
    class aakanksha_Theme_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }


   //___General___//
   /* $wp_customize->add_section(
        'aakanksha_general',
        array(
            'title'         => __('General', 'aakanksha'),
            'priority'      => 8,
        )
    );
    //Top padding
    $wp_customize->add_setting(
        'wrapper_top_padding',
        array(
            'default' => __('83','aakanksha'),
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'wrapper_top_padding',
        array(
            'label'         => __( 'Page wrapper - top padding', 'aakanksha' ),
            'section'       => 'aakanksha_general',
            'type'          => 'number',
            'description'   => __('Top padding for the page wrapper (the space between the header and the page title)', 'aakanksha'),       
            'priority'      => 10,
            'input_attrs' => array(
                'min'   => 0,
                'max'   => 160,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 15px;',
            ),            
        )
    );
    //Bottom padding
    $wp_customize->add_setting(
        'wrapper_bottom_padding',
        array(
            'default' => __('100','aakanksha'),
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'wrapper_bottom_padding',
        array(
            'label'         => __( 'Page wrapper - top padding', 'aakanksha' ),
            'section'       => 'aakanksha_general',
            'type'          => 'number',
            'description'   => __('Bottom padding for the page wrapper (the space between the page content and the footer)', 'aakanksha'),       
            'priority'      => 10,
            'input_attrs' => array(
                'min'   => 0,
                'max'   => 160,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 15px;',
            ),            
        )
    );*/
    //___Header area___//
    $wp_customize->add_panel( 'aakanksha_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'aakanksha'),
    ) );
    //___Header type___//
    $wp_customize->add_section(
        'aakanksha_header_type',
        array(
            'title'         => __('Header type', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_header_panel', 
            'description'   => __('You can select your header type from here. After that, continue below to the next two tabs (Header Video, Header Slider and Header Image) and configure them.', 'aakanksha'),
        )
    );
    //Front page
    $default = 'video';
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page header type', 'aakanksha'),
            'section'     => 'aakanksha_header_type',
            'description' => __('Select the header type for your front page', 'aakanksha'),
            'choices' => array(
				'video'     => __('Full screen video', 'aakanksha'),
                'slider'    => __('Full screen slider', 'aakanksha'),
                'image'     => __('Image', 'aakanksha'),
                'nothing'   => __('No header (only menu)', 'aakanksha')
            ),
        )
    );
    //Site
    /*$wp_customize->add_setting(
        'site_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'aakanksha_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'site_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site header type', 'aakanksha'),
            'section'     => 'aakanksha_header_type',
            'description' => __('Select the header type for all pages except the front page', 'aakanksha'),
            'choices' => array(
				'video'     => __('Full screen video', 'aakanksha'),
                'slider'    => __('Full screen slider', 'aakanksha'),
                'image'     => __('Image', 'aakanksha'),
                'nothing'   => __('No header (only menu)', 'aakanksha')
            ),
        )
    ); */
    
    //___Video___//
    $wp_customize->add_section(
        'aakanksha_video',
        array(
            'title'         => __('Header Video', 'aakanksha'),
            'description'   => __('Make sure you select where to display your video from the Header Type section found above. You can also add a Call to action button (scroll down to find the options) and select all 3 video formats for the same video for maximum browser compatibility. ', 'aakanksha'),
            'priority'      => 11,
            'panel'         => 'aakanksha_header_panel',
        )
    );
    
    //MP4 Video
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'v1', array(
        'label' => __('MP4 Video', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 5
        ) )
    );    
    $default = get_template_directory_uri() . '/videos/1.mp4';
    $wp_customize->add_setting(
        'mp4_video',
        array(
            'default' => $default,
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'mp4_video',
            array(
               'label'          => __( 'Upload your Mp4 Video for the background video', 'aakanksha' ),
               'section'        => 'aakanksha_video',
               'settings'       => 'mp4_video',
               'priority'       => 6,
            )
        )
    );
    
    //Ogg Video
   
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'v2', array(
        'label' => __('Ogg Video', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 7
        ) )
    ); 
   $default = get_template_directory_uri() . '/videos/1.ogg';
   $wp_customize->add_setting(
        'ogg_video',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'ogg_video',
            array(
               'label'          => __( 'Upload your Ogg Video for the background video', 'aakanksha' ),
               'section'        => 'aakanksha_video',
               'settings'       => 'ogg_video',
               'mime_type'      => 'video',
               'priority'       => 8,
            )
        )
    );
    
    //Webm Video
   
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'v3', array(
        'label' => __('Webm Video', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 9
        ) )
    );   
    $default = get_template_directory_uri() . '/videos/1.webm';
    $wp_customize->add_setting(
        'webm_video',
        array(
            'default' =>  $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'webm_video',
            array(
               'label'          => __( 'Upload your Webm Video for the background video', 'aakanksha' ),
               'section'        => 'aakanksha_video',
               'settings'       => 'webm_video',
               'mime_type'      => 'video',
               'priority'       => 10,
            )
        )
    );
    
    //Poster Image
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'p1', array(
        'label' => __('Poster Image', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 10
        ) )
    );  
    $default = get_template_directory_uri() . '/videos/poster.jpg';
    $wp_customize->add_setting(
        'poster_image',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'poster_image',
            array(
               'label'          => __( 'Upload your poster image for the video', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_video',
               'settings'       => 'poster_image',
               'priority'       => 11,
            )
        )
    );
    
    //Logo Image
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'l1', array(
        'label' => __('Logo', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 12
        ) )
    );
    $default = get_template_directory_uri() . '/img/icons/final-logo/name-logo.png';
    $wp_customize->add_setting(
        'name_logo',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'name_logo',
            array(
               'label'          => __( 'Upload your logo', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_video',
               'settings'       => 'name_logo',
               'priority'       => 13,
            )
        )
    );
    //Video Header button
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'vhbtn', array(
        'label' => __('Call to action button', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 14
        ) )
    ); 
    $default = '#primary';
    $wp_customize->add_setting(
        'video_button_url',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'video_button_url',
        array(
            'label' => __( 'URL for your call to action button', 'aakanksha' ),
            'section' => 'aakanksha_video',
            'type' => 'text',
            'priority' => 15
        )
    );
    $default =  __('Click to begin','aakanksha');
    $wp_customize->add_setting(
        'video_button_text',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'video_button_text',
        array(
            'label' => __( 'Text for your call to action button', 'aakanksha' ),
            'section' => 'aakanksha_video',
            'type' => 'text',
            'priority' => 16
        )
    );         
    //___Slider___//
    $wp_customize->add_section(
        'aakanksha_slider',
        array(
            'title'         => __('Header Slider', 'aakanksha'),
            'description'   => __('You can add up to 5 images in the slider. Make sure you select where to display your slider from the Header Type section found above. You can also add a Call to action button (scroll down to find the options)', 'aakanksha'),
            'priority'      => 11,
            'panel'         => 'aakanksha_header_panel',
        )
    );
    
    //Speed
    $default =  __('4000','aakanksha');
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => $default,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Slider speed', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'number',
            'description'   => __('Slider speed in miliseconds. Use 0 to disable [default: 4000]', 'aakanksha'),       
            'priority' => 7
        )
    );
    $default =  __('4000','aakanksha');
    $wp_customize->add_setting(
        'textslider_speed',
        array(
            'default' => $default,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'textslider_speed',
        array(
            'label' => __( 'Text slider speed', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'number',
            'description'   => __('Text slider speed in miliseconds [default: 4000]', 'aakanksha'),       
            'priority' => 8
        )
    );
    $wp_customize->add_setting(
        'textslider_slide',
        array(
            'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'textslider_slide',
        array(
            'type'      => 'checkbox',
            'label'     => __('Stop the text slider?', 'aakanksha'),
            'section'   => 'aakanksha_slider',
            'priority'  => 9,
        )
    );
    //Image 1
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 's1', array(
        'label' => __('First slide', 'aakanksha'),
        'section' => 'aakanksha_slider',
        'settings' => 'aakanksha_options[info]',
        'priority' => 10
        ) )
    );  
    $default =  get_template_directory_uri() . '/img/slider1.jpg';
    $wp_customize->add_setting(
        'slider_image_1',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_1',
            array(
               'label'          => __( 'Upload your first image for the slider', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_slider',
               'settings'       => 'slider_image_1',
               'priority'       => 11,
            )
        )
    );
    //Title
    $default =  __('Welcome to Aakanksha Unique','aakanksha');
    $wp_customize->add_setting(
        'slider_title_1',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_title_1',
        array(
            'label' => __( 'Title for the first slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Subtitle
    $default =  __('Feel free to look around','aakanksha');
    $wp_customize->add_setting(
        'slider_subtitle_1',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_1',
        array(
            'label' => __( 'Subtitle for the first slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 13
        )
    );           
    //Image 2
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 's2', array(
        'label' => __('Second slide', 'aakanksha'),
        'section' => 'aakanksha_slider',
        'settings' => 'aakanksha_options[info]',
        'priority' => 14
        ) )
    );    
    $default =  get_template_directory_uri() . '/img/slider2.jpg';
    $wp_customize->add_setting(
        'slider_image_2',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_2',
            array(
               'label'          => __( 'Upload your second image for the slider', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_slider',
               'settings'       => 'slider_image_2',
               'priority'       => 15,
            )
        )
    );
    //Title
    $default =  __('Ready to begin your journey?','aakanksha');
    $wp_customize->add_setting(
        'slider_title_2',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_title_2',
        array(
            'label' => __( 'Title for the second slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 16
        )
    );
    //Subtitle
    $default =  __('Click the button below','aakanksha');
    $wp_customize->add_setting(
        'slider_subtitle_2',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_2',
        array(
            'label' => __( 'Subtitle for the second slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 17
        )
    );    
    //Image 3
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 's3', array(
        'label' => __('Third slide', 'aakanksha'),
        'section' => 'aakanksha_slider',
        'settings' => 'aakanksha_options[info]',
        'priority' => 18
        ) )
    ); 
    $default =  get_template_directory_uri() . '/img/slider3.jpg';
    $wp_customize->add_setting(
        'slider_image_3',
        array(
            'default-image' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_3',
            array(
               'label'          => __( 'Upload your third image for the slider', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_slider',
               'settings'       => 'slider_image_3',
               'priority'       => 19,
            )
        )
    );
    //Title
    $default = '';
    $wp_customize->add_setting(
        'slider_title_3',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_title_3',
        array(
            'label' => __( 'Title for the third slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 20
        )
    );
    //Subtitle
    $default = '';
    $wp_customize->add_setting(
        'slider_subtitle_3',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_3',
        array(
            'label' => __( 'Subtitle for the third slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 21
        )
    );            
    //Image 4
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 's4', array(
        'label' => __('Fourth slide', 'aakanksha'),
        'section' => 'aakanksha_slider',
        'settings' => 'aakanksha_options[info]',
        'priority' => 22
        ) )
    ); 
    $default = get_template_directory_uri() . '/img/slider4.jpg';
    $wp_customize->add_setting(
        'slider_image_4',
        array(
            'default-image' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_4',
            array(
               'label'          => __( 'Upload your fourth image for the slider', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_slider',
               'settings'       => 'slider_image_4',
               'priority'       => 23,
            )
        )
    );
    //Title
    $default = '';
    $wp_customize->add_setting(
        'slider_title_4',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_title_4',
        array(
            'label' => __( 'Title for the fourth slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 24
        )
    );
    //Subtitle
    $default = '';
    $wp_customize->add_setting(
        'slider_subtitle_4',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_4',
        array(
            'label' => __( 'Subtitle for the fourth slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 25
        )
    );    
    //Image 5
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 's5', array(
        'label' => __('Fifth slide', 'aakanksha'),
        'section' => 'aakanksha_slider',
        'settings' => 'aakanksha_options[info]',
        'priority' => 26
        ) )
    );
    $default = get_template_directory_uri() . '/img/slider5.jpg';
    $wp_customize->add_setting(
        'slider_image_5',
        array(
            'default-image' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_5',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_slider',
               'settings'       => 'slider_image_5',
               'priority'       => 27,
            )
        )
    );
        
    
    //Title
    $default = '';
    $wp_customize->add_setting(
        'slider_title_5',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_title_5',
        array(
            'label' => __( 'Title for the fifth slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 28
        )
    );
    //Subtitle
    $default = '';
    $wp_customize->add_setting(
        'slider_subtitle_5',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_5',
        array(
            'label' => __( 'Subtitle for the fifth slide', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 29
        )
    );
    //Header button
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'hbutton', array(
        'label' => __('Call to action button', 'aakanksha'),
        'section' => 'aakanksha_slider',
        'settings' => 'aakanksha_options[info]',
        'priority' => 30
        ) )
    ); 
    $default = '#primary';
    $wp_customize->add_setting(
        'slider_button_url',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'slider_button_url',
        array(
            'label' => __( 'URL for your call to action button', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 31
        )
    );
    $default = __('Click to begin','aakanksha');
    $wp_customize->add_setting(
        'slider_button_text',
        array(
            'default' => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'slider_button_text',
        array(
            'label' => __( 'Text for your call to action button', 'aakanksha' ),
            'section' => 'aakanksha_slider',
            'type' => 'text',
            'priority' => 32
        )
    );         
    //___Menu style___//
    $wp_customize->add_section(
        'aakanksha_menu_style',
        array(
            'title'         => __('Menu style', 'aakanksha'),
            'priority'      => 15,
            'panel'         => 'aakanksha_header_panel', 
        )
    );
    //Sticky menu
    $default = 'sticky';
    $wp_customize->add_setting(
        'sticky_menu',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_sticky',
        )
    );
    $wp_customize->add_control(
        'sticky_menu',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Sticky menu', 'aakanksha'),
            'section' => 'aakanksha_menu_style',
            'choices' => array(
                'sticky'   => __('Sticky', 'aakanksha'),
                'static'   => __('Static', 'aakanksha'),
            ),
        )
    );
    //Menu style
    /*$wp_customize->add_setting(
        'menu_style',
        array(
            'default'           => 'inline',
            'sanitize_callback' => 'aakanksha_sanitize_menu_style',
        )
    );
    $wp_customize->add_control(
        'menu_style',
        array(
            'type'      => 'radio',
            'priority'  => 11,
            'label'     => __('Menu style', 'aakanksha'),
            'section'   => 'aakanksha_menu_style',
            'choices'   => array(
                'inline'     => __('Inline', 'aakanksha'),
                'centered'   => __('Centered (menu and site logo)', 'aakanksha'),
            ),
        )
    );*/
    $default = 'cover';
    //Header image size
    $wp_customize->add_setting(
        'header_bg_size',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'header_bg_size',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Header background size', 'aakanksha'),
            'section' => 'header_image',
            'choices' => array(
                'cover'     => __('Cover', 'aakanksha'),
                'contain'   => __('Contain', 'aakanksha'),
            ),
        )
    );
    //Header height
    $default = '300';
    $wp_customize->add_setting(
        'header_height',
        array(
            'default'           => $default,
            'sanitize_callback' => 'absint',
        )       
    );
    $wp_customize->add_control( 'header_height', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'header_image',
        'label'       => __('Header height [default: 300px]', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 250,
            'max'   => 1000,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //Disable overlay
    $wp_customize->add_setting(
        'hide_overlay',
        array(
            'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'hide_overlay',
        array(
            'type'      => 'checkbox',
            'label'     => __('Disable the overlay?', 'aakanksha'),
            'section'   => 'header_image',
            'priority'  => 12,
        )
    );    
    //Logo Upload
    $default = '';
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'priority'       => 12,
            )
        )
    );

        // General -------------------------------------------------------------------------- >	
   
    
    //___Video___//
    $wp_customize->add_section(
        'aakanksha_general',
        array(
            'title'         => __('General', 'aakanksha'),
            'description'   => __('Make sure you select where to display your video from the Header Type section found above. You can also add a Call to action button (scroll down to find the options) and select all 3 video formats for the same video for maximum browser compatibility. ', 'aakanksha'),
            'priority'      => 11,
            'panel'         => 'aakanksha_options_panel',
        )
    );
    
    //MP4 Video
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'v1', array(
        'label' => __('MP4 Video', 'aakanksha'),
        'section' => 'aakanksha_video',
        'settings' => 'aakanksha_options[info]',
        'priority' => 5
        ) )
    );    
    $default = get_template_directory_uri() . '/videos/1.mp4';
    $wp_customize->add_setting(
        'mp4_video',
        array(
            'default' => $default,
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'mp4_video',
            array(
               'label'          => __( 'Upload your Mp4 Video for the background video', 'aakanksha' ),
               'section'        => 'aakanksha_video',
               'settings'       => 'mp4_video',
               'priority'       => 6,
            )
        )
    );
    // Blog layout
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'aakanksha'),
        'section' => 'blog_options',
        'settings' => 'aakanksha_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'aakanksha_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'aakanksha'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'classic'           => __( 'Classic', 'aakanksha' ),
                'fullwidth'         => __( 'Full width (no sidebar)', 'aakanksha' ),
                'masonry-layout'    => __( 'Masonry (grid style)', 'aakanksha' )
            ),
        )
    ); 
    //Full width singles
    $wp_customize->add_setting(
        'fullwidth_single',
        array(
            'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'fullwidth_single',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width single posts?', 'aakanksha'),
            'section'   => 'blog_options',
            'priority'  => 12,
        )
    );
    //Content/excerpt
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'content', array(
        'label' => __('Content/excerpt', 'aakanksha'),
        'section' => 'blog_options',
        'settings' => 'aakanksha_options[info]',
        'priority' => 13
        ) )
    );          
    
    //Full content posts
    $wp_customize->add_setting(
      'full_content_home',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_home',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on the home page.', 'aakanksha'),
            'section' => 'blog_options',
            'priority' => 14,
        )
    );
        
    //___Theme Options___//
    $wp_customize->add_panel( 'aakanksha_theme_options', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Theme Options', 'aakanksha'),
    ) );
    
    //___General___//
    $wp_customize->add_section(
        'aakanksha_general',
        array(
            'title'         => __('General', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options', 
            'description'   => __('You can select your header type from here. After that, continue below to the next two tabs (Header Video, Header Slider and Header Image) and configure them.', 'aakanksha'),
        )
    );

    //Blog Logo Upload
    $default = '';
    $wp_customize->add_setting(
        'custom_logo',
        array(
            'default-image' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'custom_logo',
            array(
               'label'          => __( 'Upload custom logo to your blog page.', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_general',
               'priority'       => 12,
            )
        )
    );
    
     //Blog logo width
    $default = '220';
    $wp_customize->add_setting(
        'logo_width',
        array(
            'default'           => $default,
            'sanitize_callback' => 'absint',
        )       
    );
    $wp_customize->add_control( 'logo_width', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'aakanksha_general',
        'label'       => __('Logo width [default: 220px]', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 1000,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    
     //Blog logo top
    $default = '0';
    $wp_customize->add_setting(
        'logo_top',
        array(
            'default'           => $default,
            'sanitize_callback' => 'absint',
        )       
    );
    $wp_customize->add_control( 'logo_top', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'aakanksha_general',
        'label'       => __('Logo’s margin-top (px) [default: 0px]', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 1000,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    
      //Blog logo left
    $default = '30';
    $wp_customize->add_setting(
        'logo_left',
        array(
            'default'           => $default,
            'sanitize_callback' => 'absint',
        )       
    );
    $wp_customize->add_control( 'logo_left', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'aakanksha_general',
        'label'       => __('Logo’s margin-left (px) [default: 30px]', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 1000,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );

        //___Fonts___//
    $wp_customize->add_section(
        'aakanksha_fonts',
        array(
            'title' => __('Typography', 'aakanksha'),
            'priority' => 15,
            'description' => __('Google Fonts can be found here: google.com/fonts.', 'aakanksha'),
            'panel'         => 'aakanksha_theme_options', 
        )
    );
    //Body fonts title
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'aakanksha'),
        'section' => 'aakanksha_fonts',
        'settings' => 'aakanksha_options[info]',
        'priority' => 10
        ) )
    );    
    //Body fonts
    $wp_customize->add_setting(
        'body_font',
        array(
            'default' => 'Source+Sans+Pro:400,400italic,600',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font',
        array(
            'label' => __( 'Font name/style/sets', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Source Sans Pro\', sans-serif',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Font family', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );
      //Body color
   $wp_customize->add_setting(
        'body_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_color',
            array(
                'label' => __('Body Font color', 'aakanksha'),
                'section' => 'aakanksha_fonts',
                'priority' => 12
            )
        )
    );
    //Menu fonts title
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'menus_font', array(
        'label' => __('Menu fonts', 'aakanksha'),
        'section' => 'aakanksha_fonts',
        'settings' => 'aakanksha_options[info]',
        'priority' => 13
        ) )
    );      
    //Menu fonts
    $wp_customize->add_setting(
        'menu_font',
        array(
            'default' => 'Raleway:400,500,600',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'menu_font',
        array(
            'label' => __( 'Font name/style/sets', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Menu fonts family
    $wp_customize->add_setting(
        'menu_font_family',
        array(
            'default' => '\'Raleway\', sans-serif',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'menu_font_family',
        array(
            'label' => __( 'Font family', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
  
          //Menu color
   /*$wp_customize->add_setting(
        'menu_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color',
            array(
                'label' => __('Menu Font color', 'aakanksha'),
                'section' => 'aakanksha_fonts',
                'priority' => 15
            )
        )
    );*/
    
        //Headings fonts title
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'heading_font', array(
        'label' => __('Headings font', 'aakanksha'),
        'section' => 'aakanksha_fonts',
        'settings' => 'aakanksha_options[info]',
        'priority' => 16
        ) )
    );      
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font',
        array(
            'default' => 'Raleway:400,500,600',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font',
        array(
            'label' => __( 'Font name/style/sets', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 17
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Raleway\', sans-serif',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Font family', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 18
        )
    );
    
              //Headings color
   $wp_customize->add_setting(
        'heading_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'heading_color',
            array(
                'label' => __('Heading Font color', 'aakanksha'),
                'section' => 'aakanksha_fonts',
                'priority' => 18
            )
        )
    );
    
    // Blog Options-------------------------------------------------------------------------- >	
    $wp_customize->add_section(
        'aakanksha_blog_options',
        array(
            'title'         => __('Blog Options', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options', 
            'description'   => __('', 'aakanksha'),
        )
    );
    //Blog title
    $default = 'Blog';
    $wp_customize->add_setting(
        'header_blog_title',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'header_blog_title', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_blog_options',
        'label'       => __('Header Blog Title [default: Blog]', 'aakanksha'),
        'input_attrs' => array(
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    
    //Blog Title color
   $wp_customize->add_setting(
        'header_blog_title_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_blog_title_color',
            array(
                'label' => __('Header Blog Title color', 'aakanksha'),
                'section' => 'aakanksha_blog_options',
                'priority' => 25
            )
        )
    );
    
    //Blog subtitle
    $default = 'Hello';
    $wp_customize->add_setting(
        'header_blog_subtitle',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'header_blog_subtitle', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_blog_options',
        'label'       => __('Header Blog SubTitle [default: Hello]', 'aakanksha'),
        'input_attrs' => array(
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );

        //Blog SubTitle color
   $wp_customize->add_setting(
        'header_blog_subtitle_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_blog_subtitle_color',
            array(
                'label' => __('Header Blog SubTitle color', 'aakanksha'),
                'section' => 'aakanksha_blog_options',
                'priority' => 25
            )
        )
    );
    
          //Header Blog Color
   $wp_customize->add_setting(
        'header_blog_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_blog_color',
            array(
                'label' => __('Header Blog Color', 'aakanksha'),
                'section' => 'aakanksha_blog_options',
                'priority' => 25
            )
        )
    );
    
    //Blog Logo Upload
    $default = '';
    $wp_customize->add_setting(
        'header_blog_img',
        array(
            'default-image' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_blog_img',
            array(
               'label'          => __( 'Upload an image for the background header.', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_blog_options',
               'priority'       => 12,
            )
        )
    );
     $default = 'No Repeat';
    //Header image size
    $wp_customize->add_setting(
        'header_blog_repeat',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'header_blog_repeat',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Background Image Repeat. Select your preferred background style.', 'aakanksha'),
            'section' => 'aakanksha_blog_options',
            'choices' => array(
                'No Repeat'     => __('No Repeat', 'aakanksha'),
                'Repeat'   => __('Repeat', 'aakanksha'),
            ),
        )
    );
    
    $default = 'On';
    //Header image size
    $wp_customize->add_setting(
        'header_blog_parallax',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'header_blog_parallax',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Parallax header background. Enable this option to replace the header image with animated parallax effect.', 'aakanksha'),
            'section' => 'aakanksha_blog_options',
            'choices' => array(
                'On'     => __('On', 'aakanksha'),
                'Off'   => __('Off', 'aakanksha'),
            ),
        )
    );
    
    $default = 'On';
    //Header Blog Cover
    $wp_customize->add_setting(
        'header_blog_cover',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'header_blog_cover',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Background Header Cover. Enable this option to cover the header blog’s images.', 'aakanksha'),
            'section' => 'aakanksha_blog_options',
            'choices' => array(
                'On'     => __('On', 'aakanksha'),
                'Off'   => __('Off', 'aakanksha'),
            ),
        )
    );
    //Twitter Social Share Blog
    $wp_customize->add_setting(
      'twitter_social_share_blog',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'twitter_social_share_blog',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the twitter social sharing link to share your content across a range of social networks.', 'aakanksha'),
            'section' => 'twitter_social_share_blog',
            'priority' => 14,
        )
    );
    
        //Facebook Social Share Blog
    $wp_customize->add_setting(
      'facebook_social_share_blog',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'facebook_social_share_blog',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the facebook social sharing link to share your content across a range of social networks.', 'aakanksha'),
            'section' => 'facebook_social_share_blog',
            'priority' => 14,
        )
    );
    
        //Google Plus Social Share Blog
    $wp_customize->add_setting(
      'gplus_social_share_blog',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'gplus_social_share_blog',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the google plus social sharing link to share your content across a range of social networks.', 'aakanksha'),
            'section' => 'gplus_social_share_blog',
            'priority' => 14,
        )
    );

   
       // Portfolio  ------------------------------------------------------------------------------------->
    $wp_customize->add_section(
        'aakanksha_portfolio_settings',
        array(
            'title'         => __('Portfolio Setting', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options', 
            'description'   => __('', 'aakanksha'), 
        )
    );

    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'p1', array(
        'label' => __('Show / Hide button Get In Touch', 'aakanksha'),
        'section' => 'aakanksha_portfolio_settings',
        'settings' => 'aakanksha_options[info]',
        'priority' => 5
        ) )
    );
    
    //Header Blog Cover
    $default = 'On';
    $wp_customize->add_setting(
        'btn_port_getintouch',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_radio',
        )
    );
    $wp_customize->add_control(
        'btn_port_getintouch',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Enable this,“Get in touch” button will be displayed at the end of every portfolio posts.', 'aakanksha'),
            'section' => 'aakanksha_portfolio_settings',
            'choices' => array(
                'On'     => __('On', 'aakanksha'),
                'Off'   => __('Off', 'aakanksha'),
            ),
        )
    );
    
    
    //Portfolio Link button Get in Touch
    $default = 'Hello';
    $wp_customize->add_setting(
        'btn_port_getintouch_link',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'btn_port_getintouch_link', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_portfolio_settings',
        'label'       => __('Link button Get in Touch', 'aakanksha'),
        'input_attrs' => array(
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    
    //Social Sharing Links
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'p2', array(
        'label' => __('Social Sharing Links', 'aakanksha'),
        'section' => 'aakanksha_portfolio_social',
        'settings' => 'aakanksha_options[info]',
        'priority' => 5
        ) )
    );
    
        //Twitter Social Share Blog
    $wp_customize->add_setting(
      'twitter_social_share_blog',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'twitter_social_share_port',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the twitter social sharing link to share your content across a range of social networks.', 'aakanksha'),
            'section' => 'twitter_social_share_port',
            'priority' => 14,
        )
    );
    
        //Facebook Social Share Blog
    $wp_customize->add_setting(
      'facebook_social_share_port',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'facebook_social_share_blog',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the facebook social sharing link to share your content across a range of social networks.', 'aakanksha'),
            'section' => 'facebook_social_share_port',
            'priority' => 14,
        )
    );
    
        //Google Plus Social Share Blog
    $wp_customize->add_setting(
      'gplus_social_share_blog',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'gplus_social_share_port',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the google plus social sharing link to share your content across a range of social networks.', 'aakanksha'),
            'section' => 'gplus_social_share_port',
            'priority' => 14,
        )
    );
    
    // Footer  ------------------------------------------------------------------------------------->
    $wp_customize->add_section(
        'aakanksha_footer',
        array(
            'title'         => __('Footer', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options', 
            'description'   => __('', 'aakanksha'), 
        )
    );

    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'f1', array(
        'label' => __('Contact Form', 'aakanksha'),
        'section' => 'aakanksha_footer',
        'settings' => 'aakanksha_options[info]',
        'priority' => 5
        ) )
    );
    
    //Contact 7 form shortcode
    $default = '';
    $wp_customize->add_setting(
        'contact_form',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'contact_form', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Contact 7 form shortcode', 'aakanksha'),
         'description'   => __('*NOTE : Make sure the code doesn\'t contain double quotes. Replace double quotes with single quote. <br /> Ex: [contact-form-7 id=\'1\' title=\'Contact form 1\']', 'aakanksha')
    ) );
    
    //Copyright
    $default = '2016 Aakanksha. All right reserved.';
    $wp_customize->add_setting(
        'copyright',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_textarea',
        )       
    );
    $wp_customize->add_control( 'copyright', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Copyright', 'aakanksha'),
         'description'   => __('Type your website copyright.', 'aakanksha')
    ) );
    
    //Address Footer
    $default = '173A Nguyen Van Troi, Assam, INDIA';
    $wp_customize->add_setting(
        'address_footer',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'address_footer', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Type your address', 'aakanksha') 
    ) );
    
    //Phone Footer
    $default = '0988 11 22 33';
    $wp_customize->add_setting(
        'phone_footer',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'phone_footer', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Type your phone', 'aakanksha') 
    ) );
    
    //Phone Footer
    $default = 'aakanksha.singh@thetechpower.com';
    $wp_customize->add_setting(
        'email_footer',
        array(
            'default'           => $default,
            'sanitize_callback' => 'email',
        )       
    );
    $wp_customize->add_control( 'email_footer', array(
        'type'        => 'email',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Type your email', 'aakanksha') 
    ) );
     
    //Footer Blog Title
    $default = 'Contact Us';
    $wp_customize->add_setting(
        'footer_blog_title',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'footer_blog_title', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Type your title', 'aakanksha') 
    ) );
    
    //Footer Blog Title Color
    $default = '#d65050';
    $wp_customize->add_setting(
        'footer_blog_title_color',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_blog_title_color',
            array(
                'label'         => __('Title color', 'aakanksha'),
                'section'       => 'aakanksha_footer',
                'settings'      => 'footer_blog_title_color',
                'priority'      => 11
            )
        )
    );
    
    //Footer Blog SubTitle
    $default = 'Detract yet delight written farther his general. If in so bred at dare rose lose good. Feel and make two real miss use easy.';
    $wp_customize->add_setting(
        'footer_blog_subtitle',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'footer_blog_subtitle', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_footer',
        'label'       => __('Type your subtitle', 'aakanksha') 
    ) );
    
    //Footer Blog SubTitle Color
    $default = '#d65050';
    $wp_customize->add_setting(
        'footer_blog_subtitle_color',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_blog_subtitle_color',
            array(
                'label'         => __('Sub Title color', 'aakanksha'),
                'section'       => 'aakanksha_footer',
                'settings'      => 'footer_blog_subtitle_color',
                'priority'      => 11
            )
        )
    );
    
        //Footer Blog SubTitle Color
    $default = '#d65050';
    $wp_customize->add_setting(
        'footer_blog_color',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_blog_color',
            array(
                'label'         => __('Background Color for Footer', 'aakanksha'),
			    'description' => __('Choose background color for blog header.', 'aakanksha'),
                'section'       => 'aakanksha_footer',
                'settings'      => 'footer_blog_color',
                'priority'      => 11
            )
        )
    );
    
    //Logo Image
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'l1', array(
        'label' => __('Footer Background', 'aakanksha'),
        'section' => 'aakanksha_footer',
        'settings' => 'aakanksha_options[info]',
        'priority' => 12
        ) )
    );
    $default = '';
    $wp_customize->add_setting(
        'footer_blog_img',
        array(
            'default' => $default,
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_blog_img',
            array(
               'label'          => __( 'Upload an image for footer background', 'aakanksha' ),
               'type'           => 'image',
               'section'        => 'aakanksha_footer',
               'settings'       => 'footer_blog_img',
               'priority'       => 13,
            )
        )
    );
    
     $default = 'No Repeat';
    //Header image size
    $wp_customize->add_setting(
        'footer_blog_repeat',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'footer_blog_repeat',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Select your preferred background style.', 'aakanksha'),
            'section' => 'aakanksha_footer',
            'choices' => array(
                'No Repeat'     => __('No Repeat', 'aakanksha'),
                'Repeat'   => __('Repeat', 'aakanksha'),
            ),
        )
    );
    
    $default = 'On';
    //Header image size
    $wp_customize->add_setting(
        'footer_blog_parallax',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'footer_blog_parallax',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Parallax Background Footer. Enable this option to replace the header image with animated parallax effect.', 'aakanksha'),
            'section' => 'aakanksha_footer',
            'choices' => array(
                'On'     => __('On', 'aakanksha'),
                'Off'   => __('Off', 'aakanksha'),
            ),
        )
    );
    
        $default = 'On';
    //Header image size
    $wp_customize->add_setting(
        'footer_blog_cover',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'footer_blog_cover',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Background Footer Cover. Enable this option to cover the footer background images.', 'aakanksha'),
            'section' => 'aakanksha_blog_options',
            'choices' => array(
                'On'     => __('On', 'aakanksha'),
                'Off'   => __('Off', 'aakanksha'),
            ),
        )
    );
    
    // Custom CSS  ------------------------------------------------------------------------------------->
        $wp_customize->add_section(
        'aakanksha_custom_css',
        array(
            'title'         => __('Custom CSS', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options'
        )
    );
    
    $default = '#test{\nmargin: 0 auto;\n}';
    $wp_customize->add_setting(
        'custom_css',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_textarea',
        )       
    );
    $wp_customize->add_control( 'custom_css', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'aakanksha_custom_css',
        'label'       => __('CSS Code', 'aakanksha'),
         'description'   => __('Paste your custom CSS code here.', 'aakanksha')
    ) );
    
        // SEO  ------------------------------------------------------------------------------------->
    $wp_customize->add_section(
        'aakanksha_seo',
        array(
            'title'         => __('SEO', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options' 
        )
    );
    
     //___Meta Author___//
     $default = '';
    $wp_customize->add_setting(
        'meta_author',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_textarea',
        )       
    );
    $wp_customize->add_control( 'meta_author', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'aakanksha_seo',
        'label'       => __('Meta Author', 'aakanksha'),
         'description'   => __('Type your meta author.', 'aakanksha')
    ) );
    
     //___Meta Description___//
         $default = '';
    $wp_customize->add_setting(
        'meta_description',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_textarea',
        )       
    );
    $wp_customize->add_control( 'meta_description', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'aakanksha_seo',
        'label'       => __('Meta Description', 'aakanksha'),
         'description'   => __('Type your meta description.', 'aakanksha')
    ) );
    
         //___Meta Keyword___//
         $default = '';
    $wp_customize->add_setting(
        'meta_keyword',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_textarea',
        )       
    );
    $wp_customize->add_control( 'meta_keyword', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'aakanksha_seo',
        'label'       => __('Meta Keyword', 'aakanksha'),
         'description'   => __('Type your meta keyword.', 'aakanksha')
    ) );
    
             //___Meta Keyword___//
         $default = '';
    $wp_customize->add_setting(
        'google_analytics',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_textarea',
        )       
    );
    $wp_customize->add_control( 'google_analytics', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'aakanksha_seo',
        'label'       => __('Google Analytics Code', 'aakanksha'),
         'description'   => __('Paste your Google Analytics javascript or other tracking code here. This code will be added before the closing <head> tag.', 'aakanksha')
    ) );
    
      // Social  ------------------------------------------------------------------------------------->
     $wp_customize->add_section(
        'aakanksha_social',
        array(
            'title'         => __('Social', 'aakanksha'),
            'priority'      => 10,
            'panel'         => 'aakanksha_theme_options' 
        )
    );
    
     //___Facebook___//
     $default = 'https://facebook.com/thetechpower';
    $wp_customize->add_setting(
        'facebook',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'facebook', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Facebook', 'aakanksha'),
         'description'   => __('Insert your Facebook fanpage here.', 'aakanksha')
    ) );
    
    
     //___Twitter___//
     $default = 'https://twitter.com/iamthetechpower';
    $wp_customize->add_setting(
        'twitter',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'twitter', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Twitter', 'aakanksha'),
         'description'   => __('Insert your Twitter URL here.', 'aakanksha')
    ) );
    
    
     //___Google Plus___//
     $default = '';
    $wp_customize->add_setting(
        'google_plus',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'google_plus', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Google Plus', 'aakanksha'),
         'description'   => __('Insert your Google Plus URL here.', 'aakanksha')
    ) );
    
    
     //___Pinterest___//
     $default = 'https://www.pinterest.com/aakanksha5742';
    $wp_customize->add_setting(
        'pinterest',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'pinterest', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Pinterest', 'aakanksha'),
         'description'   => __('Insert your Pinterest URL here.', 'aakanksha')
    ) );
    
    
     //___Flickr___//
     $default = '';
    $wp_customize->add_setting(
        'flickr',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'flickr', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Flickr', 'aakanksha'),
         'description'   => __('Insert your Flickr URL here.', 'aakanksha')
    ) );
    
    
     //___Linkedin___//
     $default = '';
    $wp_customize->add_setting(
        'linkedin',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'linkedin', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Linkedin', 'aakanksha'),
         'description'   => __('Insert your Linkedin URL here.', 'aakanksha')
    ) );
    
    
     //___Dribbble___//
     $default = '';
    $wp_customize->add_setting(
        'dribbble',
        array(
            'default'           => $default,
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )       
    );
    $wp_customize->add_control( 'dribbble', array(
        'type'        => 'text',
        'priority'    => 11,
        'section'     => 'aakanksha_social',
        'label'       => __('Dribbble', 'aakanksha'),
         'description'   => __('Insert your Dribbble URL here.', 'aakanksha')
    ) );
    
    //___Blog options___//
    /*$wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'aakanksha'),
            'priority' => 13,
        )
    );  
    // Blog layout
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'aakanksha'),
        'section' => 'blog_options',
        'settings' => 'aakanksha_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'aakanksha_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'aakanksha'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'classic'           => __( 'Classic', 'aakanksha' ),
                'fullwidth'         => __( 'Full width (no sidebar)', 'aakanksha' ),
                'masonry-layout'    => __( 'Masonry (grid style)', 'aakanksha' )
            ),
        )
    ); 
    //Full width singles
    $wp_customize->add_setting(
        'fullwidth_single',
        array(
            'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'fullwidth_single',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width single posts?', 'aakanksha'),
            'section'   => 'blog_options',
            'priority'  => 12,
        )
    );
    //Content/excerpt
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'content', array(
        'label' => __('Content/excerpt', 'aakanksha'),
        'section' => 'blog_options',
        'settings' => 'aakanksha_options[info]',
        'priority' => 13
        ) )
    );          
    //Full content posts
    $wp_customize->add_setting(
      'full_content_home',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_home',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on the home page.', 'aakanksha'),
            'section' => 'blog_options',
            'priority' => 14,
        )
    );
    $wp_customize->add_setting(
      'full_content_archives',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_archives',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on all archives.', 'aakanksha'),
            'section' => 'blog_options',
            'priority' => 15,
        )
    );    
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'blog_options',
        'label'       => __('Excerpt lenght', 'aakanksha'),
        'description' => __('Choose your excerpt length. Default: 55 words', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Meta
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'meta', array(
        'label' => __('Meta', 'aakanksha'),
        'section' => 'blog_options',
        'settings' => 'aakanksha_options[info]',
        'priority' => 17
        ) )
    ); 
    //Hide meta index
    $wp_customize->add_setting(
      'hide_meta_index',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on index, archives?', 'aakanksha'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide meta single
    $wp_customize->add_setting(
      'hide_meta_single',
      array(
        'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_single',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on singles?', 'aakanksha'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );
    //Featured images
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'images', array(
        'label' => __('Featured images', 'aakanksha'),
        'section' => 'blog_options',
        'settings' => 'aakanksha_options[info]',
        'priority' => 21
        ) )
    );     
    //Index images
    $wp_customize->add_setting(
        'index_feat_image',
        array(
            'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'index_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to hide featured images on index, archives etc.', 'aakanksha'),
            'section' => 'blog_options',
            'priority' => 22,
        )
    );
    //Post images
    $wp_customize->add_setting(
        'post_feat_image',
        array(
            'sanitize_callback' => 'aakanksha_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'post_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to hide featured images on single posts', 'aakanksha'),
            'section' => 'blog_options',
            'priority' => 23,
        )
    );




    //___Footer___//
    $wp_customize->add_section(
        'aakanksha_footer',
        array(
            'title'         => __('Footer', 'aakanksha'),
            'priority'      => 18,
        )
    );
    //Front page
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => '3',
            'sanitize_callback' => 'aakanksha_sanitize_fw',
        )
    );
    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'        => 'radio',
            'label'       => __('Footer widget area', 'aakanksha'),
            'section'     => 'aakanksha_footer',
            'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'aakanksha'),
            'choices' => array(
                '1'     => __('One', 'aakanksha'),
                '2'     => __('Two', 'aakanksha'),
                '3'     => __('Three', 'aakanksha'),
                '4'     => __('Four', 'aakanksha')
            ),
        )
    );*/



    //___Fonts___//
   /* $wp_customize->add_section(
        'aakanksha_fonts',
        array(
            'title' => __('Fonts', 'aakanksha'),
            'priority' => 15,
           /* 'description' => __('Google Fonts can be found here: google.com/fonts.', 'aakanksha'),*/
     /*   )
    );
    //Body fonts title
   /* $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'aakanksha'),
        'section' => 'aakanksha_fonts',
        'settings' => 'aakanksha_options[info]',
        'priority' => 10
        ) )
    );    
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Source+Sans+Pro:400,400italic,600',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Source Sans Pro\', sans-serif',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Font family', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Headings fonts title
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'headings_fonts', array(
        'label' => __('Headings fonts', 'aakanksha'),
        'section' => 'aakanksha_fonts',
        'settings' => 'aakanksha_options[info]',
        'priority' => 13
        ) )
    );      
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Raleway:400,500,600',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Font name/style/sets', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Raleway\', sans-serif',
            'sanitize_callback' => 'aakanksha_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Font family', 'aakanksha' ),
            'section' => 'aakanksha_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );*/
    //Font sizes title
    $wp_customize->add_setting('aakanksha_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Info( $wp_customize, 'font_sizes', array(
        'label' => __('Font sizes', 'aakanksha'),
        'section' => 'aakanksha_fonts',
        'settings' => 'aakanksha_options[info]',
        'priority' => 18
        ) )
    );
    // Site title
    $default = '32';
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'default'           => $default,
            'sanitize_callback' => 'absint',   
        )       
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'aakanksha_fonts',
        'label'       => __('Site title', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) ); 
    // Site description
    $default = '16';
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'default'           => $default,
            'sanitize_callback' => 'absint',            
        )       
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'aakanksha_fonts',
        'label'       => __('Site description', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );  
    // Nav menu
   $wp_customize->add_setting(
        'menu_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );
    $wp_customize->add_control( 'menu_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'aakanksha_fonts',
        'label'       => __('Menu items', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );           
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '52',
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'aakanksha_fonts',
        'label'       => __('H1 font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '42',
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'aakanksha_fonts',
        'label'       => __('H2 font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '32',
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 24,
        'section'     => 'aakanksha_fonts',
        'label'       => __('H3 font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '25',
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 25,
        'section'     => 'aakanksha_fonts',
        'label'       => __('H4 font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '20',
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 26,
        'section'     => 'aakanksha_fonts',
        'label'       => __('H5 font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 27,
        'section'     => 'aakanksha_fonts',
        'label'       => __('H6 font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 28,
        'section'     => 'aakanksha_fonts',
        'label'       => __('Body font size', 'aakanksha'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );

    //___Colors___//
    $default = '#d65050';
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'aakanksha'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 11
            )
        )
    );
    //Menu bg
    $default = '#000000';
    $wp_customize->add_setting(
        'menu_bg_color',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg_color',
            array(
                'label' => __('Menu background', 'aakanksha'),
                'section' => 'colors',
                'priority' => 12
            )
        )
    );     
    //Site title
    $default = '#ffffff';
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => $default,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',  
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'aakanksha'),
                'section' => 'colors',
                'settings' => 'site_title_color',
                'priority' => 13
            )
        )
    );
    //Site desc
    $default = '#ffffff';
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => $default,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'aakanksha'),
                'section' => 'colors',
                'priority' => 14
            )
        )
    );
    //Top level menu items
    $default = '#ffffff';
    $wp_customize->add_setting(
        'top_items_color',
        array(
            'default'           => $default,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_items_color',
            array(
                'label' => __('Top level menu items', 'aakanksha'),
                'section' => 'colors',
                'priority' => 15
            )
        )
    );
    //Sub menu items color
    $default = '#ffffff';
    $wp_customize->add_setting(
        'submenu_items_color',
        array(
            'default'           => $default,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_items_color',
            array(
                'label' => __('Sub-menu items', 'aakanksha'),
                'section' => 'colors',
                'priority' => 16
            )
        )
    );
    //Sub menu background
    $default = '#1c1c1c';
    $wp_customize->add_setting(
        'submenu_background',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_background',
            array(
                'label' => __('Sub-menu background', 'aakanksha'),
                'section' => 'colors',
                'priority' => 17
            )
        )
    );
    //Slider text
    $default = '#ffffff';
    $wp_customize->add_setting(
        'slider_text',
        array(
            'default'           => $default,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_text',
            array(
                'label' => __('Header slider text', 'aakanksha'),
                'section' => 'colors',
                'priority' => 18
            )
        )
    );
    //Body
    /*$wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'aakanksha'),
                'section' => 'colors',
                'priority' => 19
            )
        )
    ); */   
    //Sidebar backgound
    /*$wp_customize->add_setting(
        'sidebar_background',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_background',
            array(
                'label' => __('Sidebar background', 'aakanksha'),
                'section' => 'colors',
                'priority' => 20
            )
        )
    );*/
    //Sidebar color
    /*$wp_customize->add_setting(
        'sidebar_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_color',
            array(
                'label' => __('Sidebar color', 'aakanksha'),
                'section' => 'colors',
                'priority' => 21
            )
        )
    );*/
    //Footer widget area
    /*$wp_customize->add_setting(
        'footer_widgets_background',
        array(
            'default'           => '#252525',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_widgets_background',
            array(
                'label' => __('Footer widget area background', 'aakanksha'),
                'section' => 'colors',
                'priority' => 22
            )
        )
    );*/
    //Footer widget color
    /*$wp_customize->add_setting(
        'footer_widgets_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_widgets_color',
            array(
                'label' => __('Footer widget area color', 'aakanksha'),
                'section' => 'colors',
                'priority' => 23
            )
        )
    );*/
    //Footer background
   /* $wp_customize->add_setting(
        'footer_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background',
            array(
                'label' => __('Footer background', 'aakanksha'),
                'section' => 'colors',
                'priority' => 24
            )
        )
    );*/
    //Footer color
    /*$wp_customize->add_setting(
        'footer_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label' => __('Footer color', 'aakanksha'),
                'section' => 'colors',
                'priority' => 25
            )
        )
    );*/
    //Rows overlay
    $default = get_template_directory_uri() . '#000000';
    $wp_customize->add_setting(
        'rows_overlay',
        array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'rows_overlay',
            array(
                'label' => __('Rows overlay', 'aakanksha'),
                'section' => 'colors',
                'priority' => 26
            )
        )
    );
    
   //___Theme info___//
   $wp_customize->add_section(
        'aakanksha_themeinfo',
        array(
            'title' => __('Theme Info', 'aakanksha'),
            'priority' => 99,
            'description' => '<p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('1. Documentation for Aakanksha Unique can be found ', 'aakanksha') . '<a target="_blank" href="http://thetechpower.com/blog/2016/07/aakanksha-unique-theme-documentation/">here</a></p><p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('2. A full theme demo can be found ', 'aakanksha') . '<a target="_blank" href="http://thetechpower.com/aakanksha-unique/">here</a></p>',         
        )
    );
    $wp_customize->add_setting('aakanksha_theme_docs', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new aakanksha_Theme_Info( $wp_customize, 'documentation', array(
        'section' => 'aakanksha_themeinfo',
        'settings' => 'aakanksha_theme_docs',
        'priority' => 10
        ) )
    );
}
add_action( 'customize_register', 'aakanksha_customize_register' );

/**
 * Sanitize
 */
//Header type
function aakanksha_sanitize_layout( $input ) {
    $valid = array(
        'video'     => __('Full screen video', 'aakanksha'),
        'slider'    => __('Full screen slider', 'aakanksha'),
        'image'     => __('Image', 'aakanksha'),
        'nothing'   => __('Nothing (only menu)', 'aakanksha')
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Text
function aakanksha_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Background size
function aakanksha_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => __('Cover', 'aakanksha'),
        'contain'   => __('Contain', 'aakanksha'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Footer widget areas
function aakanksha_sanitize_fw( $input ) {
    $valid = array(
        '1'     => __('One', 'aakanksha'),
        '2'     => __('Two', 'aakanksha'),
        '3'     => __('Three', 'aakanksha'),
        '4'     => __('Four', 'aakanksha')
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Sticky menu
function aakanksha_sanitize_sticky( $input ) {
    $valid = array(
        'sticky'     => __('Sticky', 'aakanksha'),
        'static'   => __('Static', 'aakanksha'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Blog Layout
function aakanksha_sanitize_blog( $input ) {
    $valid = array(
        'classic'    => __( 'Classic', 'aakanksha' ),
        'fullwidth'  => __( 'Full width (no sidebar)', 'aakanksha' ),
        'masonry-layout'    => __( 'Masonry (grid style)', 'aakanksha' )

    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Menu style
function aakanksha_sanitize_menu_style( $input ) {
    $valid = array(
        'inline'     => __('Inline', 'aakanksha'),
        'centered'   => __('Centered (menu and site logo)', 'aakanksha'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Checkboxes
function aakanksha_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aakanksha_customize_preview_js() {
	wp_enqueue_script( 'aakanksha_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aakanksha_customize_preview_js' );