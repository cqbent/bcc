<?php
// $Id: views-view-list.tpl.php,v 1.3 2008/09/30 19:47:11 merlinofchaos Exp $
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<div class="item-list">
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <<?php print $options['type']; ?>>
    <?php
	foreach ($rows as $id => $row) {
		$rowlist[] = trim(strip_tags($row));
	}
	for ($x=0;$x<count($rowlist);$x++) {
		if ($rowlist[$x] != $rowlast) {
			$rowurl = strtolower(str_replace(' ','-',$rowlist[$x]));
			print '<li class="views-row';
			if (strstr($_SERVER['REQUEST_URI'],$rowurl)) {
				print ' active';
			}
			print '"><a href="/news/category/'.$rowurl.'">'.$rowlist[$x].'</a></li>';
			$rowlast = $rowlist[$x];
		}
	}
	?>
  </<?php print $options['type']; ?>>
</div>