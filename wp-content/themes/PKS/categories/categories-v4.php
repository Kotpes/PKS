<?php

	class acf_field_categories extends
		acf_field {
		// vars
		var $settings, // will hold info such as dir / path
			$defaults; // will hold default field options


		/*
		*  __construct
		*
		*  Set name / label needed for actions / filters
		*
		*  @since	3.6
		*  @date	23/01/13
		*/

		function __construct() {
			// vars
			$this->name     = 'categories';
			$this->label    = __( 'Categories' );
			$this->category = __( "Relational", 'acf' ); // Basic, Content, Choice, etc
			$this->defaults = array( // add default here to merge into your field.
				// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
				//'preview_size' => 'thumbnail'
			);


			// do not delete!
			parent::__construct();


			// settings
			$this->settings = array(
				'path'    => apply_filters( 'acf/helpers/get_path', __FILE__ ),
				'dir'     => apply_filters( 'acf/helpers/get_dir', __FILE__ ),
				'version' => '1.0.0'
			);

		}


		/*
		*  create_options()
		*
		*  Create extra options for your field. This is rendered when editing a field.
		*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field	- an array holding all the field's data
		*/

		function create_field( $field ) {
			// defaults?

			$field['value'] = isset( $field['value'] ) ? $field['value'] : '';
			$type           = ( isset( $field['post_type'] ) ) ? ( empty( $field['post_type'] ) ? 'post' : $field['post_type'] ) : 'post';
			$child_of       = ( isset( $field['child_of'] ) ) ? ( empty( $field['child_of'] ) ? 0 : $field['child_of'] ) : 0;
			$parent         = ( isset( $field['parent'] ) ) ? ( empty( $field['parent'] ) ? '' : $field['parent'] ) : '';
			$hide_empty     = isset( $field['hide_empty'] ) ? $field['hide_empty'] : '1';
			$hierarchical   = isset( $field['hierarchical'] ) ? $field['hierarchical'] : '1';
			$taxonomy       = ( isset( $field['taxonomy'] ) ) ? ( empty( $field['taxonomy'] ) ? 'category' : $field['taxonomy'] ) : 'category';
			$include        = ( isset( $field['include'] ) ) ? ( empty( $field['include'] ) ? '' : $field['include'] ) : '';
			$exclude        = ( isset( $field['exclude'] ) ) ? ( empty( $field['exclude'] ) ? '' : $field['exclude'] ) : '';
			$orderby        = ( isset( $field['orderby'] ) ) ? ( empty( $field['orderby'] ) ? 'name' : $field['orderby'] ) : 'name';
			$order          = ( isset( $field['order'] ) ) ? ( empty( $field['order'] ) ? 'ASC' : $field['order'] ) : 'ASC';
			$show_all       = isset( $field['show_all'] ) ? $field['show_all'] : '1';
			$show_none      = isset( $field['show_none'] ) ? $field['show_none'] : '1';
			$show_parent    = isset( $field['show_none'] ) ? $field['show_parent'] : '1';

			$args = array(
				'type'         => $type,
				'child_of'     => $child_of,
				'parent'       => $parent,
				'hide_empty'   => $hide_empty,
				'hierarchical' => $hierarchical,
				'exclude'      => $exclude,
				'include'      => $include,
				'taxonomy'     => $taxonomy,
				'orderby'      => $orderby,
				'order'        => $order,
				'pad_counts'   => 1
			);

			$categories     = get_categories( $args );
			$selected_value = $field['value'];
			$is_selected    = '';

			/*
			$field = array_merge($this->defaults, $field);
			*/

			// perhaps use $field['preview_size'] to alter the markup?


			// create Field HTML
			?>
			<div>
				<?php if ( $field['display_type'] == 'drop_down' ) : ?>
					<select id="<?php echo $field['name'] ?>" class="<?php echo $field['class'] ?>" name="<?php echo $field['name'] ?>">
						<?php if ( $show_all ): ?>
							<?php if ( $selected_value == "all" ) {
								$is_selected = 'selected="selected"';
							} ?>
							<option value="all" <?php echo $is_selected ?>>Show All</option>
						<?php endif ?>

						<?php if ( $show_none ): ?>
							<?php if ( $selected_value == "none" ) {
								$is_selected = 'selected="selected"';
							} ?>
							<option value="none" <?php echo $is_selected ?>>Show None</option>
						<?php endif ?>

						<?php foreach ( $categories as $category ) : ?>
							<?php if ( $category->slug == $selected_value ) {
								$is_selected = 'selected="selected"';
							} else {
								$is_selected = '';
							} ?>
							<?php $category_name = $category->name ?>
							<?php if ( $show_parent ) : ?>
								<?php if ( $category->parent > 0 ) : ?>
									<?php $category_name = get_cat_name( $category->parent ) . '->' . $category->name; ?>
								<?php endif; ?>
							<?php endif; ?>
							<option value="<?php echo $category->slug ?>" <?php echo $is_selected ?>><?php echo $category_name ?></option>
						<?php endforeach ?>
					</select>
				<?php endif ?>

				<?php if ( $field['display_type'] == 'checkboxes' ) : ?>
					<ul>
						<?php if ( $show_all ): ?>
							<?php if ( in_array( "all", $field['value'] ) ) {
								$is_selected = 'checked';
							} else {
								$is_selected = '';
							} ?>
							<li>
								<input id="<?php echo $field['key'] . '_all' ?>" name="<?php echo $field['name'] . '[]' ?>"
									   type="checkbox" value="all" <?php echo $is_selected ?> />&nbsp;Show All
							</li>
						<?php endif ?>

						<?php
							if ( ! $show_none ) {
								$display_none = ' style="display:none"';
							} else {
								$display_none = '';
							}
						?>
						<?php if ( in_array( "none", $field['value'] ) ) {
							$is_selected = 'checked';
						} else {
							$is_selected = '';
						} ?>
						<li<?php echo $display_none; ?>>
							<input id="<?php echo $field['key'] . '_none' ?>" name="<?php echo $field['name'] . '[]' ?>"
								   type="checkbox" value="none" <?php echo $is_selected ?> />&nbsp;Show None
						</li>

						<?php foreach ( $categories as $category ) : ?>
							<?php if ( is_array( $field['value'] ) ): ?>
								<?php if ( in_array( $category->slug, $field['value'] ) ) {
									$is_selected = 'checked';
								} else {
									$is_selected = '';
								} ?>
							<?php endif ?>
							<li>
								<?php $category_name = $category->name ?>
								<?php if ( $show_parent ) : ?>
									<?php if ( $category->parent > 0 ) : ?>
										<?php $category_name = get_cat_name( $category->parent ) . '->' . $category->name; ?>
									<?php endif; ?>
								<?php endif; ?>
								<input id="<?php echo $field['key'] . '_' . $category->slug; ?>" name="<?php echo $field['name'] . '[]' ?>"
									   type="checkbox" value="<?php echo $category->slug ?>" <?php echo $is_selected ?> /> <?php echo $category_name ?>
							</li>
						<?php endforeach ?>
					</ul>
					<script type="text/javascript">
						jQuery( '#post' ).submit( function() {
							var any_checked = false;

							jQuery( '.field-categories ul li input' ).each( function() {
								if ( jQuery( this ).is( ':checked' ) ) {
									any_checked = true;
								}
								var field_name = jQuery( this ).attr( 'name' );
							} );

							if ( ! any_checked ) {
								var select_none_id = '#<?php echo $field['key'].'_none'; ?>';
								jQuery( select_none_id ).attr( 'checked', 'checked' );
							}
						} );
					</script>
				<?php endif ?>
			</div>
		<?php
		}


		/*
		*  create_field()
		*
		*  Create the HTML interface for your field
		*
		*  @param	$field - an array holding all the field's data
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*/

		function create_options( $field ) {
			// defaults?
			$field['child_of']     = isset( $field['child_of'] ) ? $field['child_of'] : '0';
			$field['parent']       = isset( $field['parent'] ) ? $field['parent'] : '';
			$field['hide_empty']   = isset( $field['hide_empty'] ) ? $field['hide_empty'] : '1';
			$field['hierarchical'] = isset( $field['hierarchical'] ) ? $field['hierarchical'] : '1';
			$field['taxonomy']     = isset( $field['taxonomy'] ) ? $field['taxonomy'] : 'category';
			$field['include']      = isset( $field['include'] ) ? $field['include'] : '';
			$field['exclude']      = isset( $field['exclude'] ) ? $field['exclude'] : '';
			$field['display_type'] = isset( $field['display_type'] ) ? $field['display_type'] : '1';
			$field['ret_val']      = isset( $field['ret_val'] ) ? $field['ret_val'] : 'category_slug';
			$field['orderby']      = isset( $field['orderby'] ) ? $field['orderby'] : 'id';
			$field['order']        = isset( $field['order'] ) ? $field['order'] : 'ASC';

			/*
			$field = array_merge($this->defaults, $field);
			*/

			// key is needed in the field names to correctly save the data
			$key = $field['name'];


			// Create Field Options HTML
			?>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Type", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>

				</td>
				<td>
					<?php
						$args = array(
							'public'   => true,
							'_builtin' => false
						);
						$post_types = get_post_types( $args, 'objects' );
						$types = array();
						$types['post'] = 'Post';

						foreach ( $post_types as $post_type ) {
							$types[$post_type->name] = $post_type->label;
						}

						do_action( 'acf/create_field', array(
															'type'    => 'select',
															'name'    => 'fields[' . $key . '][post_type]',
															'value'   => $field['post_type'],
															'choices' => $types
													   ) );
						unset( $types );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Child Of", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'  => 'text',
															  'name'  => 'fields[' . $key . '][child_of]',
															  'value' => $field['child_of'],
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Parent", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'  => 'text',
															  'name'  => 'fields[' . $key . '][parent]',
															  'value' => $field['parent'],
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Order By", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'select',
															  'name'    => 'fields[' . $key . '][orderby]',
															  'value'   => $field['orderby'],
															  'choices' => array(
																  'id'    => 'Category ID',
																  'name'  => 'Category Title',
																  'slug'  => 'Category Slug',
																  'count' => 'Categories Count'
															  )
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Order", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'radio',
															  'name'    => 'fields[' . $key . '][order]',
															  'value'   => $field['order'],
															  'choices' => array(
																  'ASC'  => 'Asc',
																  'DESC' => 'Desc',
															  ),
															  'layout'  => 'horizontal',
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Hide Empty", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'radio',
															  'name'    => 'fields[' . $key . '][hide_empty]',
															  'value'   => $field['hide_empty'],
															  'choices' => array(
																  '1' => 'Yes',
																  '0' => 'No',
															  ),
															  'layout'  => 'horizontal',
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Hierarchical", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'radio',
															  'name'    => 'fields[' . $key . '][hierarchical]',
															  'value'   => $field['hierarchical'],
															  'choices' => array(
																  '1' => 'Yes',
																  '0' => 'No',
															  ),
															  'layout'  => 'horizontal',
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Taxonomy", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>

				</td>
				<td>
					<?php
						$args = array(
							'public' => true
						);
						$post_types = get_taxonomies( $args, 'objects' );
						$taxonomies = array();

						foreach ( $post_types as $post_type ) {
							$taxonomies[$post_type->name] = $post_type->label;
						}

						do_action( 'acf/create_field', array(
															'type'    => 'select',
															'name'    => 'fields[' . $key . '][taxonomy]',
															'value'   => $field['taxonomy'],
															'choices' => $taxonomies
													   ) );

						unset( $taxonomies );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Include Categories", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'  => 'text',
															  'name'  => 'fields[' . $key . '][include]',
															  'value' => $field['include'],
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Exclude Categories", 'acf' ); ?></label>

					<p class="description">
						<a href="http://codex.wordpress.org/Function_Reference/get_categories"
						   target="_blank">See Documentation
						</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'  => 'text',
															  'name'  => 'fields[' . $key . '][exclude]',
															  'value' => $field['exclude'],
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Display Type", 'acf' ); ?></label>

					<p class="description">The display type in admin area. Dropdown or Multicheckboxes</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'select',
															  'name'    => 'fields[' . $key . '][display_type]',
															  'value'   => $field['display_type'],
															  'choices' => array(
																  'drop_down'  => 'Drop Down',
																  'checkboxes' => 'Checkboxes',
															  )
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Show All", 'acf' ); ?></label>

					<p class="description">
						If the 'show all' categories option should be visible
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'radio',
															  'name'    => 'fields[' . $key . '][show_all]',
															  'value'   => ( isset( $field['show_all'] ) ? $field['show_all'] : null ),
															  'choices' => array(
																  '1' => 'Yes',
																  '0' => 'No',
															  ),
															  'layout'  => 'horizontal',
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Show None", 'acf' ); ?></label>

					<p class="description">
						If the 'show none' categories option should be visible
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'radio',
															  'name'    => 'fields[' . $key . '][show_none]',
															  'value'   => ( isset( $field['show_none'] ) ? $field['show_none'] : null ),
															  'choices' => array(
																  '1' => 'Yes',
																  '0' => 'No',
															  ),
															  'layout'  => 'horizontal',
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Show Parent", 'acf' ); ?></label>

					<p class="description">
						If true displays category parent in Parent->Child format, in the admin
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'radio',
															  'name'    => 'fields[' . $key . '][show_parent]',
															  'value'   => ( isset( $field['show_parent'] ) ? $field['show_parent'] : null ),
															  'choices' => array(
																  '1' => 'Yes',
																  '0' => 'No',
															  ),
															  'layout'  => 'horizontal',
														 ) );
					?>
				</td>
			</tr>

			<tr class="field_option field_option_<?php echo $this->name; ?>">
				<td class="label">
					<label><?php _e( "Return Value", 'acf' ); ?></label>

					<p class="description">The return type when retrieving value from API. ID, Name, Taxonomy, Parent, Link <a
							href="http://codex.wordpress.org/Function_Reference/wp_dropdown_categories" target="_blank">Dropdown
																														- See Documentation</a>
					</p>
				</td>
				<td>
					<?php do_action( 'acf/create_field', array(
															  'type'    => 'select',
															  'name'    => 'fields[' . $key . '][ret_val]',
															  'value'   => $field['ret_val'],
															  'choices' => array(
																  'category_slug'     => 'Categories Slug',
																  'category_name'     => 'Category Name',
																  'category_id'       => 'Category ID',
																  'category_dropdown' => 'Categories DropDown',
																  'category_taxonomy' => 'Categories Taxonomy',
																  'category_parent'   => 'Categories Parent',
																  'category_link'     => 'Categories Link'
															  )
														 ) );
					?>
				</td>
			</tr>

		<?php

		}


		/*
		*  input_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
		*  Use this action to add css + javascript to assist your create_field() action.
		*
		*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*/

		function field_group_admin_enqueue_scripts() {
			// Note: This function can be removed if not used
		}


		/*
		*  input_admin_head()
		*
		*  This action is called in the admin_head action on the edit screen where your field is created.
		*  Use this action to add css and javascript to assist your create_field() action.
		*
		*  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*/

		function field_group_admin_head() {
			// Note: This function can be removed if not used
		}


		/*
		*  field_group_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
		*  Use this action to add css + javascript to assist your create_field_options() action.
		*
		*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*/

		function format_value( $value, $post_id, $field ) {
			// defaults?
			/*
			$field = array_merge($this->defaults, $field);
			*/

			// perhaps use $field['preview_size'] to alter the $value?


			// Note: This function can be removed if not used
			return $value;
		}


		/*
		*  field_group_admin_head()
		*
		*  This action is called in the admin_head action on the edit screen where your field is edited.
		*  Use this action to add css and javascript to assist your create_field_options() action.
		*
		*  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*/

		function format_value_for_api( $value, $post_id, $field ) {
			// defaults?
			/*
			$field = array_merge($this->defaults, $field);
			*/

			// perhaps use $field['preview_size'] to alter the $value?


			// Note: This function can be removed if not used
			return $value;
		}


		/*
		*  load_value()
		*
		*  This filter is appied to the $value after it is loaded from the db
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$value - the value found in the database
		*  @param	$post_id - the $post_id from which the value was loaded from
		*  @param	$field - the field array holding all the field options
		*
		*  @return	$value - the value to be saved in te database
		*/

		function input_admin_enqueue_scripts() {
			// Note: This function can be removed if not used


			// register acf scripts
			wp_register_script( 'acf-input-categories', $this->settings['dir'] . 'js/input.js', array( 'acf-input' ), $this->settings['version'] );
			wp_register_style( 'acf-input-categories', $this->settings['dir'] . 'css/input.css', array( 'acf-input' ), $this->settings['version'] );


			// scripts
			wp_enqueue_script( array(
									'acf-input-categories',
							   ) );

			// styles
			wp_enqueue_style( array(
								   'acf-input-categories',
							  ) );
		}


		/*
		*  update_value()
		*
		*  This filter is appied to the $value before it is updated in the db
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$value - the value which will be saved in the database
		*  @param	$post_id - the $post_id of which the value will be saved
		*  @param	$field - the field array holding all the field options
		*
		*  @return	$value - the modified value
		*/

		function input_admin_head() {
			// Note: This function can be removed if not used
		}


		/*
		*  format_value()
		*
		*  This filter is appied to the $value after it is loaded from the db and before it is passed to the create_field action
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$value	- the value which was loaded from the database
		*  @param	$post_id - the $post_id from which the value was loaded
		*  @param	$field	- the field array holding all the field options
		*
		*  @return	$value	- the modified value
		*/

		function load_field( $field ) {
			// Note: This function can be removed if not used
			return $field;
		}


		/*
		*  format_value_for_api()
		*
		*  This filter is appied to the $value after it is loaded from the db and before it is passed back to the api functions such as the_field
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$value	- the value which was loaded from the database
		*  @param	$post_id - the $post_id from which the value was loaded
		*  @param	$field	- the field array holding all the field options
		*
		*  @return	$value	- the modified value
		*/

		function load_value( $value, $post_id, $field ) {
			// Note: This function can be removed if not used
			$ret_val = '';

			$type         = ( isset( $field['post_type'] ) ) ? ( empty( $field['post_type'] ) ? 'post' : $field['post_type'] ) : 'post';
			$child_of     = ( isset( $field['child_of'] ) ) ? ( empty( $field['child_of'] ) ? 0 : $field['child_of'] ) : 0;
			$parent       = ( isset( $field['parent'] ) ) ? ( empty( $field['parent'] ) ? '' : $field['parent'] ) : '';
			$hide_empty   = isset( $field['hide_empty'] ) ? $field['hide_empty'] : '1';
			$hierarchical = isset( $field['hierarchical'] ) ? $field['hierarchical'] : '1';
			$taxonomy     = ( isset( $field['taxonomy'] ) ) ? ( empty( $field['taxonomy'] ) ? 'category' : $field['taxonomy'] ) : 'category';
			$include      = ( isset( $field['include'] ) ) ? ( empty( $field['include'] ) ? '' : $field['include'] ) : '';
			$exclude      = ( isset( $field['exclude'] ) ) ? ( empty( $field['exclude'] ) ? '' : $field['exclude'] ) : '';
			$orderby      = ( isset( $field['orderby'] ) ) ? ( empty( $field['orderby'] ) ? 'name' : $field['orderby'] ) : 'name';
			$order        = ( isset( $field['order'] ) ) ? ( empty( $field['order'] ) ? 'ASC' : $field['order'] ) : 'ASC';
			$is_all       = false;

			$args = array(
				'type'         => $type,
				'child_of'     => $child_of,
				'parent'       => $parent,
				'hide_empty'   => $hide_empty,
				'hierarchical' => $hierarchical,
				'exclude'      => $exclude,
				'include'      => $include,
				'taxonomy'     => $taxonomy,
				'orderby'      => $orderby,
				'order'        => $order,
				'pad_counts'   => 1,
				'echo'         => 0
			);

			if ( $field['display_type'] == 'drop_down' ) {
				if ( is_array( $value ) ) {
					return 'Your value is an array but the display type drop down!';
				}

				if ( $value == "all" || $value == "none" ) {
					return $value;
				}

				$value = get_term_by( 'slug', $value, $field['taxonomy'] );

				if ( $value ) {

					switch ( $field['ret_val'] ) {
						case 'category_slug':
							$ret_val = $value->slug;
							break;
						case 'category_name':
							$ret_val = $value->name;
							break;
						case 'category_dropdown':
							return wp_dropdown_categories( $args );
							break;
						case 'category_id':
							$ret_val = $value->term_id;
							break;
						case 'category_taxonomy':
							$ret_val = $value->taxonomy;
							break;
						case 'category_parent':
							$ret_val = $value->parent;
							break;
						case 'category_link':
							$category_link = get_term_link( $value->slug, $value->taxonomy );
							$ret_val       = $category_link;
							break;
					}
				}
			}


			if ( $field['display_type'] == 'checkboxes' ) {
				$ret_val = array();

				if ( is_array( $value ) ) {
					// none is not a category - we don't need to return it
					if ( in_array( "none", $value ) ) {
						$index = array_search( 'none', $value );
						unset( $value[$index] );
					}

					if ( in_array( "all", $value ) ) {
						$value  = get_categories( $args );
						$is_all = true;
					}


					switch ( $field['ret_val'] ) {
						case 'category_slug':
							foreach ( $value as $ret_value ) {
								if ( $is_all ) {
									$value = get_term_by( 'slug', $ret_value->slug, $field['taxonomy'] );
								} else {
									$value = get_term_by( 'slug', $ret_value, $field['taxonomy'] );
								}
								array_push( $ret_val, $value->slug );
							}
							break;
						case 'category_name':
							foreach ( $value as $ret_value ) {
								if ( $is_all ) {
									$value = get_term_by( 'slug', $ret_value->slug, $field['taxonomy'] );
								} else {
									$value = get_term_by( 'slug', $ret_value, $field['taxonomy'] );
								}
								array_push( $ret_val, $value->name );
							}
							break;
						case 'category_dropdown':
							return wp_dropdown_categories( $args );
							break;
						case 'category_id':
							foreach ( $value as $ret_value ) {
								if ( $is_all ) {
									$value = get_term_by( 'slug', $ret_value->slug, $field['taxonomy'] );
								} else {
									$value = get_term_by( 'slug', $ret_value, $field['taxonomy'] );
								}
								array_push( $ret_val, $value->term_id );
							}
							break;
						case 'category_taxonomy':
							foreach ( $value as $ret_value ) {
								if ( $is_all ) {
									$value = get_term_by( 'slug', $ret_value->slug, $field['taxonomy'] );
								} else {
									$value = get_term_by( 'slug', $ret_value, $field['taxonomy'] );
								}
								array_push( $ret_val, $value->taxonomy );
							}
							break;
						case 'category_parent':
							foreach ( $value as $ret_value ) {
								if ( $is_all ) {
									$value = get_term_by( 'slug', $ret_value->slug, $field['taxonomy'] );
								} else {
									$value = get_term_by( 'slug', $ret_value, $field['taxonomy'] );
								}
								array_push( $ret_val, $value->parent );
							}
							break;
						case 'category_link':
							foreach ( $value as $ret_value ) {
								if ( $is_all ) {
									$value = get_term_by( 'slug', $ret_value->slug, $field['taxonomy'] );
								} else {
									$value = get_term_by( 'slug', $ret_value, $field['taxonomy'] );
								}
								$category_link = get_term_link( $value->slug, $value->taxonomy );
								array_push( $ret_val, $category_link );
							}
							break;
					}
				}
			}

			return $ret_val;
		}


		/*
		*  load_field()
		*
		*  This filter is appied to the $field after it is loaded from the database
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field - the field array holding all the field options
		*
		*  @return	$field - the field array holding all the field options
		*/

		function update_field( $field, $post_id ) {
			// Note: This function can be removed if not used
			return $field;
		}


		/*
		*  update_field()
		*
		*  This filter is appied to the $field before it is saved to the database
		*
		*  @type	filter
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field - the field array holding all the field options
		*  @param	$post_id - the field group ID (post_type = acf)
		*
		*  @return	$field - the modified field
		*/

		function update_value( $value, $post_id, $field ) {
			// Note: This function can be removed if not used
			return $value;
		}

	}


// create field
	new acf_field_categories();

?>