<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
/*
dpm($row, 'row');
dpm($output, 'output');
*/
$event_date = $row->field_field_event_date[0]['raw']['value'];
$event_timestamp = strtotime($event_date);
$event['day'] = date('d', $event_timestamp);
$event['month'] = date('M', $event_timestamp);
$event['year'] = date('Y', $event_timestamp);
$image = image_style_url('upcoming_event', $row->field_field_featured_image[0]['raw']['uri']);
$css = '#event-wrapper-'.$row->nid.':hover{ background-image: url('.$image.'); } ';
drupal_add_css($css, array('type' =>'inline', 'group' => CSS_THEME)); 
$link_content = '<div class="event-wrapper" id="event-wrapper-'.$row->nid.'">
	<div class="date-text">
		<div class="day">'.$event['day'].'</div>
		<div class="month-year">'.$event['month'].' '.$event['year'].'</div>
	</div>
</div>';
echo l($link_content, 'node/'.$row->nid, array('html' => true));