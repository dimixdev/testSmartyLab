<?php

namespace plgREM;

if(!defined('ABSPATH'))exit;

$FiledsName=[
	'house_name'=>'',
	'location_coordinates'=>'',
	'number_of_floors'=>'',
	'type_of_structure'=>'',
];

$args = [
    'post_type' => 'real_estate',
    'posts_per_page' => 1,
    'order' => 'ASC'
];


$query = new \WP_Query($args);

if ($query->have_posts()) {
	 $query->the_post();
	 $fields = get_field_objects();

	 ?>
	 <div class="real-estate-manager">
	 	<div class="erm-form">
		 <?php

		 if (isset($fields['house_name']['label'])){
		 	$FiledsName['house_name']=$fields['house_name']['label'];
		 	?>
		 	<div class="label"><?php echo $FiledsName['house_name'];?>: </div>
		 	<input type="text" class="input-house_name" value="">
		 	<?php
		 }

		 if (isset($fields['location_coordinates']['label'])){
		 	$FiledsName['location_coordinates']=$fields['location_coordinates']['label'];
		 	?>
		 	<div class="label"><?php echo $FiledsName['location_coordinates'];?>: </div>
		 	<input type="text" class="input-location_coordinates" value="">
		 	<?php
		 }

		 ?>
		 	<div class="group-fields">
		 <?php

	     if (isset($fields['number_of_floors']['choices'])){
	     	$FiledsName['number_of_floors']=$fields['number_of_floors']['label'];
			?>
			<div class="cell">
				<label><?php echo $FiledsName['number_of_floors'];?>: </label>
				<select class="select-number_of_floors" >
					<option value=""><?php _e('All');?></option>
					<?php foreach ($fields['number_of_floors']['choices'] as $option) : ?>
					    <option value="<?php echo esc_attr($option); ?>"><?php echo esc_html($option); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php
		}

	    if (isset($fields['type_of_structure']['choices'])){
	    	$FiledsName['type_of_structure']=$fields['type_of_structure']['label'];
	        ?>
	        <div class="cell">
		        <div class="label"><?php echo $FiledsName['type_of_structure'];?>: </div>
		        <div class="row">
		        	<input type="radio" name="type_of_structure" class="radio-type_of_structure" checked value="" ><?php _e('All');?>
		        </div>
		        <?php foreach ($fields['type_of_structure']['choices'] as $option) : ?>
		          <div class="row">
		          	<input type="radio" name="type_of_structure" class="radio-type_of_structure" value="<?php echo esc_attr($option); ?>"> <?php echo esc_html($option); ?>
		          </div>
		        <?php endforeach; ?>
	        </div>
	    	<?php
		}
		?>
			</div>
			<div class="erm-row">
				<button class="erm-but-search"><?php _e('Search');?></button>
			</div>
		</div>
		<div class="erm-post-list"></div>
		<div class="erm-pagination"></div>
	</div>
	<script type="text/html" id="tmpl-erm-list-item">
	    <div class="item">
	    	<?php foreach($FiledsName as $key=>$name){ ?>
	    	<div class="row">
	    		<label><?php echo esc_attr($name);?>: </label>
	    		{{ data.<?php echo $key;?> }}
	    	</div>
	    	<?php } ?>
	    </div>
	</script>
	<?php

}
?>
