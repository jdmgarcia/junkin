<?php
/**
 * Utility functions
 */


/**
 * Output SVG Icon HTML
 *
 * array['classes'] string A list of classes to add the svg element
 *
 * @param $icon_id
 * @param array $args
 */
function outputSVGIconHTML($icon_id, $args = []) {
  $classes = $args['classes'];
  $icon_id = str_replace('#', '', $icon_id);
  ?><svg class="svg-icon <?php echo $classes; ?>"><use class="svg-icon-inner" xlink:href="#<?php echo $icon_id; ?>"/></svg><?php
}
?>