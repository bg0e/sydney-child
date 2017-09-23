<?php/** * Sydney child functions * *//** * Enqueues the parent stylesheet. Do not remove this function. * */add_action( 'wp_enqueue_scripts', 'sydney_child_enqueue' );function sydney_child_enqueue() {    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );}/* ADD YOUR CUSTOM FUNCTIONS BELOW */add_action( 'geodir_after_listing_post_title', 'country_listing', 45 );function country_listing() {    global $post;    global $wp_query;    $postid = $wp_query->post->ID;    $postcity= geodir_get_post_meta($postid,'post_city',true);    $postregion= geodir_get_post_meta($postid,'post_region',true);    $postcountry= geodir_get_post_meta($postid,'post_country',true);    echo $postcountry." - ".$postregion." - ".$postcity;}/*** Add custom field to the custom field list.** @param array $custom_fields {*     The custom fields array to be filtered.**     @type string $field_type The type of field, eg: text, datepicker, textarea, time, checkbox, phone, radio, email, select, multiselect, url, html, file.*     @type string $class The class for the field in backend.*     @type string $icon Can be font-awesome class name or icon image url.*     @type string $name The name of the field.*     @type string $description A short description about the field.*     @type array $defaults {*       Optional. Used to set the default value of the field.**       @type string data_type The SQL data type for the field.*       @type string admin_title The admin title for the field.*       @type string site_title This will be the title for the field on the frontend.*       @type string admin_desc This will be shown below the field on the add listing form.*       @type string htmlvar_name This is a unique identifier used in the HTML, it MUST NOT contain spaces or special characters.*       @type bool is_active If false the field will not be displayed anywhere.*       @type bool for_admin_use If true then only site admin can see and edit this field.*       @type string default_value The default value for the input on the add listing page.*       @type string show_in The locations to show in. [detail],[moreinfo],[listing],[owntab],[mapbubble]*       @type bool is_required If true the field will be required on the add listing page.*       @type string validation_pattern HTML5 validation pattern (text input only by default).*       @type string validation_msg HTML5 validation message (text input only by default).*       @type string required_msg Required warning message.*       @type string field_icon Icon url or font awesome class.*       @type string css_class Field custom css class for field custom style.*       @type bool cat_sort If true the field will appear in the category sort options, if false the field will be hidden, leave blank to show option.*     }* }* @param string $post_type The post type requested.*/function geodir_custom_field_twitter($custom_fields,$post_type){    $custom_fields['twitter_feed'] = array( // The key value should be unique and not contain any spaces.        'field_type'            =>  'text', //        'class'                 =>  'gd-twitter',        'icon'                  =>  'fa fa-twitter',        'name'                  =>  __('Twitter feed', 'geodirectory'),        'description'           =>  __('Adds a input for twitter username and outputs feed.', 'geodirectory'),        'defaults'              => array(            'data_type'             =>  'VARCHAR',            'admin_title'           =>  'Twitter',            'site_title'            =>  'Twitter',            'admin_desc'            =>  'Enter your Twitter username',            'htmlvar_name'          =>  'twitterusername',            'is_active'             =>  true,            'for_admin_use'         =>  false,            'default_value'         =>  '',            'show_in' 	            =>  '[detail],[owntab]',            'is_required'           =>  false,            'validation_pattern'    =>  '^[A-Za-z0-9_]{1,32}$',            'validation_msg'        =>  'Please enter a valid twitter username.',            'required_msg'          =>  '',            'field_icon'            =>  'fa fa-twitter',            'css_class'             =>  '',            'cat_sort'              =>  false        )    );    return $custom_fields;}// 'geodir_custom_fields_custom' will add to custom fields box, 'geodir_custom_fields_predefined' will add to the predifined boxadd_filter('geodir_custom_fields_custom','geodir_custom_field_twitter',10,2);