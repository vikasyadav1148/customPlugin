<?php
/*
Plugin Name: Vechicle
Description: Declares a plugin that will create a custom post type with taxonomy and its inbuilt feauture
Version: 1.0
*/

add_action( 'init', 'create_vechicle' );


function create_vechicle() {
	register_post_type( 'vechicles',
		array(
			'labels' => array(
			'name' => 'Vechicle',
			'singular_name' => 'vechicle',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New vechicle',
			'edit' => 'Edit',
			'edit_item' => 'Edit vechicle',
			'new_item' => 'New vechicle',
			'view' => 'View',
			'view_item' => 'View vechicle',
			'search_items' => 'Search Vechicle',
			'not_found' => 'No Vechicle found',
			'not_found_in_trash' =>
			'No Vechicle found in Trash',
			'parent' => 'Parent vechicle'
		),
		'public' => true,
		'menu_position' => 15,
		'supports' =>
		array( 'title', 'editor', 'comments','thumbnail', 'category' ),
			'taxonomies' => array( 'type' ),
			'menu_icon' =>
				plugins_url( 'images/image.png', __FILE__ ),
				'has_archive' => true
		)
		);

	$labels = array(
		'name' => _x( 'Types', 'taxonomy general name' ),
		'singular_name' => _x( 'Typw', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Types' ),
		'popular_items' => __( 'Popular Types' ),
		'all_items' => __( 'All Types' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Type' ), 
		'update_item' => __( 'Update Type' ),
		'add_new_item' => __( 'Add New Type' ),
		'new_item_name' => __( 'New Type Name' ),
		'separate_items_with_commas' => __( 'Separate Types with commas' ),
		'add_or_remove_items' => __( 'Add or remove Types' ),
		'choose_from_most_used' => __( 'Choose from the most used Types' ),
		'menu_name' => __( 'Types' ),
	);

	register_post_type( 'booking_list',
		array(
			'labels' => array(
			'name' => 'Booking List',
			'singular_name' => 'booking list',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New booking',
			'edit' => 'Edit',
			'edit_item' => 'Edit bookiing',
			'new_item' => 'New booking',
			'view' => 'View',
			'view_item' => 'View booking',
			'search_items' => 'Search booking',
			'not_found' => 'No booking found',
			'not_found_in_trash' =>
			'No Bokking found in Trash',
			'parent' => 'Parent booking'
		),
		'public' => true,
		'menu_position' => 16,
		'supports' =>
		array( 'title', 'editor', 'comments','thumbnail', 'category' ),
			'taxonomies' => array( 'type' ),
			'menu_icon' =>
				plugins_url( 'images/image.png', __FILE__ ),
				'has_archive' => true
		)
		);

	$labels = array(
		'name' => _x( 'Types', 'taxonomy general name' ),
		'singular_name' => _x( 'Typw', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Types' ),
		'popular_items' => __( 'Popular Types' ),
		'all_items' => __( 'All Types' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Type' ), 
		'update_item' => __( 'Update Type' ),
		'add_new_item' => __( 'Add New Type' ),
		'new_item_name' => __( 'New Type Name' ),
		'separate_items_with_commas' => __( 'Separate Types with commas' ),
		'add_or_remove_items' => __( 'Add or remove Types' ),
		'choose_from_most_used' => __( 'Choose from the most used Types' ),
		'menu_name' => __( 'Types' ),
	);
	 
	register_taxonomy('Types','vechicles',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'Type' ),
	));

	register_post_status( 'approved', array(
                    'label'                     => _x( 'Approved', 'post status label', 'plugin-domain' ),
                    'public'                    => true,
                    'label_count'               => _n_noop( 'Approved <span class="count">(%s)</span>', 'Approved s<span class="count">(%s)</span>', 'plugin-domain' ),
                    'post_type'                 => array( 'booking_list' ),
                    'show_in_admin_all_list'    => true,
                    'show_in_admin_status_list' => true,
                    'show_in_metabox_dropdown'  => true,
                    'show_in_inline_dropdown'   => true,
                ) );

	register_post_status( 'reject', array(
                    'label'                     => _x( 'Reject', 'post status label', 'plugin-domain' ),
                    'public'                    => true,
                    'label_count'               => _n_noop( 'Reject s <span class="count">(%s)</span>', 'Reject <span class="count">(%s)</span>', 'plugin-domain' ),
                    'post_type'                 => array( 'booking_list' ),
                    'show_in_admin_all_list'    => true,
                    'show_in_admin_status_list' => true,
                    'show_in_metabox_dropdown'  => true,
                    'show_in_inline_dropdown'   => true,
                ) );

	register_post_status( 'on_the_way', array(
                    'label'                     => _x( 'On The Way', 'post status label', 'plugin-domain' ),
                    'public'                    => true,
                    'label_count'               => _n_noop( 'On The Way <span class="count">(%s)</span>', 'On The Way <span class="count">(%s)</span>', 'plugin-domain' ),
                    'post_type'                 => array( 'booking_list' ),
                    'show_in_admin_all_list'    => true,
                    'show_in_admin_status_list' => true,
                    'show_in_metabox_dropdown'  => true,
                    'show_in_inline_dropdown'   => true,
                ) );

	register_post_status( 'completed', array(
                    'label'                     => _x( 'Completed', 'post status label', 'plugin-domain' ),
                    'public'                    => true,
                    'label_count'               => _n_noop( 'Completed <span class="count">(%s)</span>', 'Completed <span class="count">(%s)</span>', 'plugin-domain' ),
                    'post_type'                 => array( 'booking_list' ),
                    'show_in_admin_all_list'    => true,
                    'show_in_admin_status_list' => true,
                    'show_in_metabox_dropdown'  => true,
                    'show_in_inline_dropdown'   => true,
                ) );
}

add_action('admin_footer-post.php',function(){
    global $post;
    $complete = '';
    $label = '';

    if($post->post_type == 'booking_list') {

        if ( $post->post_status == 'completed' ) {
            $complete = ' selected=\"selected\"';
            $label    = 'Completed';
        }else if ( $post->post_status == 'approved' ) {
            $complete = ' selected=\"selected\"';
            $label    = 'Approved';
        }else if ( $post->post_status == 'reject' ) {
            $complete = ' selected=\"selected\"';
            $label    = 'Reject';
        }else if ( $post->post_status == 'on_the_way' ) {
            $complete = ' selected=\"selected\"';
            $label    = 'On The Way';
        }

        $script = '

 
       jQuery(document).ready(function($){
           $("select#post_status").append("<option value=\"completed\" '.$complete.'>Completed</option><option value=\"approved\" '.$complete.'>Approved</option><option value=\"on_the_way\" '.$complete.'>On The Way</option><option value=\"reject\" '.$complete.'>Reject</option>");
           if( "'.$post->post_status.'" == "completed" ){
                $("span#post-status-display").html("Completed");
                $("input#save-post").val("Save Completed");
           }else if( "'.$post->post_status.'" == "approved" ){
                $("span#post-status-display").html("Approved");
                $("input#save-post").val("Save Approved");
           }else if( "'.$post->post_status.'" == "reject" ){
                $("span#post-status-display").html("Reject");
                $("input#save-post").val("Save Reject");
           }else if( "'.$post->post_status.'" == "on_the_way" ){
                $("span#post-status-display").html("On The Way");
                $("input#save-post").val("Save On The Way");
           }
           var jSelect = $("select#post_status");
                
           $("a.save-post-status").on("click", function(){
                
                if( jSelect.val() == "completed" ){
                    
                    $("input#save-post").val("Save Completed");
                }else if( jSelect.val() == "approved" ){
                    
                    $("input#save-post").val("Save Approved");
                }else if( jSelect.val() == "reject" ){
                    
                    $("input#save-post").val("Save Reject");
                }else if( jSelect.val() == "on_the_way" ){
                    
                    $("input#save-post").val("Save On The Way");
                }
           });
      });';
     
        echo '<script type="text/javascript">' . $script . '</script>';
    }

});

add_action('admin_footer-edit.php',function() {
    global $post;
    if( $post->post_status == 'booking_list' ) {
        echo "<script>
    jQuery(document).ready( function() {
        jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"completed\">Completed</option><option value=\"approved\">Approved</option><option value=\"reject\">Reject</option><option value=\"on_the_way\">On The Way</option>' );
    });
    </script>";
    }
});

add_filter( 'display_post_states', function( $statuses ) {
    global $post;

    if( $post->post_type == 'booking_list') {
        if ( get_query_var( 'post_status' ) != 'completed' ) { // not for pages with all posts of this status
            if ( $post->post_status == 'completed' ) {
                return array( 'Completed' );
            }
        }else if ( get_query_var( 'post_status' ) != 'approved' ) { // not for pages with all posts of this status
            if ( $post->post_status == 'approved' ) {
                return array( 'Approved' );
            }
        }
        else if ( get_query_var( 'post_status' ) != 'on_the_way' ) { // not for pages with all posts of this status
            if ( $post->post_status == 'on_the_way' ) {
                return array( 'On The Way' );
            }
        }
        else if ( get_query_var( 'post_status' ) != 'reject' ) { // not for pages with all posts of this status
            if ( $post->post_status == 'reject' ) {
                return array( 'Reject' );
            }
        }
    }
    return $statuses;
});

add_action( 'admin_init', 'my_admin' );

function my_admin() {
	add_meta_box( 'vechicle_meta_box',
	'Booking Details',
	'display_vechicle_meta_box',
	'booking_list', 'normal', 'high' );	
}

function display_vechicle_meta_box( $vechicle ) {
	// Retrieve current name of the Director and Movie Rating based on review ID
	$first_name = esc_html( get_post_meta( $vechicle->ID,'first_name', true ) );
	$last_name = esc_html( get_post_meta( $vechicle->ID,'last_name', true ) );
	$email = esc_html( get_post_meta( $vechicle->ID,'email', true ) );
	$phone = intval( get_post_meta( $vechicle->ID,'phone', true ) );
	$starting_price = intval( get_post_meta( $vechicle->ID,'starting_price', true ) );
	$message = esc_html( get_post_meta( $vechicle->ID,'message', true ) );
	$vname = esc_html( get_post_meta( $vechicle->ID,'vname', true ) );
	$vcategory = esc_html( get_post_meta( $vechicle->ID,'vcategory', true ) );
?>

	<table>
		<tr>
			<td style="width: 100%">First Name</td>
			<td><input type="text" name="vechicle_first_name" value="<?php echo $first_name; ?>" readonly /></td>
		</tr>
		<tr>
			<td style="width: 150px">Last Name</td>
			<td><input type="text" name="vechicle_last_name" value="<?php echo $last_name; ?>" readonly /></td>
		</tr>
		<tr>
			<td style="width: 150px">Email</td>
			<td><input type="text" name="vechicle_email" value="<?php echo $email; ?>" readonly /></td>
		</tr>
		<tr>
			<td style="width: 150px">Phone</td>
			<td><input type="text" name="vechicle_phone" value="<?php echo $phone; ?>" readonly /></td>
		</tr>
		<tr>
			<td style="width: 150px">Starting Price</td>
			<td><input type="number" name="vechicle_starting_price" value="<?php echo $starting_price; ?>" readonly /></td>
		</tr>
		<tr>
			<td style="width: 150px">Message</td>
			<td><textarea name="vechicle_message" readonly><?php echo $message; ?></textarea></td>
		</tr>
		<tr>
			<td style="width: 150px">Vechicle Name</td>
			<td><input name="vechicle_name" value="<?php echo $vname; ?>" readonly /></td>
		</tr>
		<tr>
			<td style="width: 150px">Vechicle Type</td>
			<td><input name="vechicle_message" value="<?php echo $vcategory; ?>" readonly /></td>
		</tr>
	</table>
<?php }


add_action( 'save_post','add_vechicle_fields', 10, 2 );


function add_vechicle_fields( $vechicle_id, $vechicle ) 
{
	// Check post type for Vechicle
	if ( $vechicle->post_type == 'booking_list' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['vechicle_first_name'] ) &&	$_POST['vechicle_first_name'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'first_name',$_POST['vechicle_first_name'] );
		}
		if ( isset( $_POST['vechicle_last_name'] ) &&	$_POST['vechicle_last_name'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'last_name',$_POST['vechicle_last_name'] );
		}
		if ( isset( $_POST['vechicle_email'] ) &&	$_POST['vechicle_email'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'email',$_POST['vechicle_email'] );
		}
		if ( isset( $_POST['vechicle_phone'] ) &&	$_POST['vechicle_phone'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'phone',$_POST['vechicle_phone'] );
		}
		if ( isset( $_POST['vechicle_starting_price'] ) &&	$_POST['vechicle_starting_price'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'starting_price',$_POST['vechicle_starting_price'] );
		}
		if ( isset( $_POST['vechicle_message'] ) &&	$_POST['vechicle_message'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'message',$_POST['vechicle_message'] );
		}
	}
}

add_shortcode('vechicles','display_vechile');

function display_vechile()
{
	$html = '';
	$html .= '<div id="primary">
	<div id="content" role="main">';
	query_posts(array("post_type"=>"booking_list"));
	$mypost = array( "post_type" => "booking_list");
	$loop = new WP_Query( $mypost );
	while ( $loop->have_posts() ) : $loop->the_post();
		$html .= '<article id="post-"'.get_the_ID().'">
			<header class="entry-header">
				<div style="float:top; margin: 10px">';
					the_post_thumbnail( array(100,100) );
				$html .= '</div>
				<strong>Title: </strong>'.get_the_title().'<br />
				<strong>First Name: </strong>';
				$html .= esc_html( get_post_meta( get_the_ID(), 'first_name', true ) );
				$html .= '<strong>Last Name: </strong>';
				$html .= esc_html( get_post_meta( get_the_ID(), 'last_name', true ) );
				$html .= '<strong>Email: </strong>';
				$html .= esc_html( get_post_meta( get_the_ID(), 'email', true ) );
				$html .= '<strong>Phone: </strong>';
				$html .= esc_html( get_post_meta( get_the_ID(), 'phone', true ) );
				$html .= '<strong>Starting Price: </strong>';
				$html .= esc_html( get_post_meta( get_the_ID(), 'starting_price', true ) );
				$html .= '<strong>Message: </strong>';
				$html .= esc_html( get_post_meta( get_the_ID(), 'message', true ) );
				$html .= '<br />
			</header>
			<div class="entry-content">'.the_content().'</div>
		</article>
		<hr/>';
	endwhile;
	$html .= '</div>
</div>';
wp_reset_query();
echo $html;
}

add_shortcode('add_booking','add_booking');

function add_booking(){
	$terms = get_terms([
	    'taxonomy' => 'Types',
	    'hide_empty' => false,
	]);
	$posts = get_posts([
	  'post_type' => 'vechicles',
	  'post_status' => array('publish'),
	  'numberposts' => -1
	]);
	$html = '<style>tr,td{padding: 39px 39px 0 39px;}select,input{width:100% !important;padding:12px;}</style>
	<form action="" method="post">
	<table style="border: 1px solid #ccc;background: #f5f5f5;">
		<tr>
			<td>Vechicle Type</td>
			<td>
			<select name="vechicle_type" required>';
			    if(!empty($terms)){
					foreach ($terms as $key => $value) {
						$html .='<option value="'.$value->slug.'">'.$value->name.'</option>';
					}
				}else{
					$html .='<option value="">Please create category</option>';
				}
				$html .='
			</select>
			</td>
		</tr>

		<tr>
			<td>Vechicle</td>
			<td>
				<select name="vechicle_name" required>';
				    if(!empty($posts)){
						foreach ($posts as $key => $value) {
							$html .='<option value="'.$value->post_title.'">'.$value->post_title.'</option>';
						}
					}else{
						$html .='<option value="">Please create vechicle</option>';
					}
				$html .='
				</select>
			</td>
		</tr>

		<tr style="padding:0px;">
		    <td style="padding:0px;" colspan="2"><hr></td>
		</tr>

		<tr style="padding:0px;">
			<td style="padding:0px 0px 0px 36px;"><strong>Booking Details</strong></td>			
		</tr>

		<tr style="padding:0px;">
		    <td style="padding:0px;" colspan="2"><hr></td>
		</tr>

		<tr>
			<td>First Name</td>
			<td><input type="text" name="vechicle_first_name" value="" required /></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="vechicle_last_name" value="" required /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="vechicle_email" value="" required /></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="vechicle_phone" value="" pattern="[1-9]{1}[0-9]{9}" required /></td>
		</tr>
		<tr>
			<td>Starting Price</td>
			<td><input type="text" name="vechicle_starting_price" value="" pattern="[0-9]+" required /></td>
		</tr>
		<tr>
			<td>Message</td>
			<td><textarea name="vechicle_message"></textarea></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" name="add_vechicle" value="Add Booking" style="width: 40%;border-radius: 6px;margin: 0px 0px 33px 0px;"/></td>
		</tr>
	</table>
	</form>';

	/******************* submit data from frontend *************************************/
	if(isset($_POST['add_vechicle'])){

		global $current_user;
		get_currentuserinfo();

		$user_login = $current_user->user_login;
		$user_email = $current_user->user_email;
		$user_firstname = $current_user->user_firstname;
		$user_lastname = $current_user->user_lastname;
		$user_id = $current_user->ID;

		$post_title = $_POST['vechicle_name'];
		$category = $_POST['vechicle_type'];
		$new_post = array(
			'post_title' => $post_title,
			'post_content' => '',
			'post_status' => 'on_the_way',
			'post_name' => $post_title,
			'post_type' => 'booking_list',
			'post_category' => array($category)
		);

		$vechicle_id = wp_insert_post($new_post);

		/**********************************************************************************/

		$to = bloginfo('admin_email');
	    $subject = 'New Booking Request';
	    $message = "You have new booking request.";

	    /**********************************************************************************/

	    $to = $_POST['vechicle_email'];
	    $subject = 'Booking Submission';
	    $message = "You have successfully submitted your booking.";

	    /**********************************************************************************/

	    wp_mail($to, $subject, $message );

		if ( isset( $_POST['vechicle_first_name'] ) &&	$_POST['vechicle_first_name'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'first_name',$_POST['vechicle_first_name'] );
		}
		if ( isset( $_POST['vechicle_last_name'] ) &&	$_POST['vechicle_last_name'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'last_name',$_POST['vechicle_last_name'] );
		}
		if ( isset( $_POST['vechicle_email'] ) &&	$_POST['vechicle_email'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'email',$_POST['vechicle_email'] );
		}
		if ( isset( $_POST['vechicle_phone'] ) &&	$_POST['vechicle_phone'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'phone',$_POST['vechicle_phone'] );
		}
		if ( isset( $_POST['vechicle_starting_price'] ) &&	$_POST['vechicle_starting_price'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'starting_price',$_POST['vechicle_starting_price'] );
		}
		if ( isset( $_POST['vechicle_message'] ) &&	$_POST['vechicle_message'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'message',$_POST['vechicle_message'] );
		}
		if ( isset( $_POST['vechicle_name'] ) &&	$_POST['vechicle_name'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'vname',$_POST['vechicle_name'] );
		}
		if ( isset( $_POST['vechicle_type'] ) &&	$_POST['vechicle_type'] != '' ) 
		{
			update_post_meta( $vechicle_id, 'vcategory',$_POST['vechicle_type'] );
		}
	}
	/***********************************************************************************/
	return $html;	
}
?>