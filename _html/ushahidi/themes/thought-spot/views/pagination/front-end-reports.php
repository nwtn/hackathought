<ul class="pager">
	<?php
		if ($total_pages < 10): /* « Previous  1 2 3 4 5 6 7 8 9 10 11 12  Next » */
		for ($i = 1; $i <= $total_pages; $i++):
			if ($i == $current_page) :
	?>
	<li>
		<span><a href="#" class="active"><?php echo $i ?></a></span>
	</li>
	<?php else: ?>
	<li>
		<span><a href="<?php echo str_replace('{page}', $i, $url) ?>"><?php echo $i ?></a></span>
	</li>
	<?php
		endif;
		endfor;

		elseif ($current_page < 6): /* « Previous  1 2 3 4 5 6 7 8 9 10 … 25 26  Next » */

		for ($i = 1; $i <= 6; $i++):
			if ($i == $current_page):
	?>
	<li>
		<span><a class="active" href="#"><?php echo $i ?></a></span>
	</li>
	<?php else: ?>
	<li>
		<span><a href="<?php echo str_replace('{page}', $i, $url) ?>"><?php echo $i ?></a></span>
	</li>
	<?php
		endif;
		endfor;
	?>
	<li>&hellip;</li>
	<li>
		<span><a href="<?php echo str_replace('{page}', $total_pages - 1, $url) ?>"><?php echo $total_pages - 1 ?></a></span>
	</li>
	<li>
		<span><a href="<?php echo str_replace('{page}', $total_pages, $url) ?>"><?php echo $total_pages ?></a></span>
	</li>
	<?php elseif ($current_page < 100): ?>
	<li>
		<span><a href="<?php echo str_replace('{page}', 1, $url) ?>">1</a></span>
	</li>
	<li>&hellip;</li>
	<?php
		$num_pages_substract = 0;
		$num_pages_add = 0;
		$num_pages_subtract = ($total_pages == $current_page)? 3 : 2;

		if ($current_page < $total_pages) {
			$num_pages_subtract = ($current_page > 10) ? 1 : 2;
			$num_pages_add = (($total_pages - $current_page) > 4) ? 2 : ($total_pages - $current_page);
		}

		for ($i = $current_page - $num_pages_subtract; $i <= $current_page + $num_pages_add; $i++):

		if ($i == $current_page):
	?>

	<li>
		<span><a href="#" class="active"><?php echo $i ?></a></span>
	</li>

	<?php else: ?>

	<li>
		<span><a href="<?php echo str_replace('{page}', $i, $url) ?>"><?php echo $i ?></a></span>
	</li>

	<?php
		endif;
		endfor;

		if (($current_page + ($num_pages_add + 1)) < $total_pages):
	?>

	<li>&hellip;</li>
	<li>
		<span><a href="<?php echo str_replace('{page}', $total_pages, $url) ?>"><?php echo $total_pages ?></a></span>
	</li>

	<?php
		endif;

		else: /* « Previous  1 2 … 5 6 7 8 9 10 11 12 13 14 … 25 26  Next » */
	?>

	<li>
		<span><a href="<?php echo str_replace('{page}', 1, $url) ?>">1</a></span>
	</li>
	<li>&hellip;</li>

	<?php
		$num_pages_add = ($current_page == $total_pages)? 0 : 1;
		for ($i = $current_page - 1; $i <= $current_page + $num_pages_add; $i++):
			if ($i == $current_page):
	?>

	<li>
		<span><a class="active" href="#"><?php echo $i ?></a></span>
	</li>

	<?php else: ?>

	<li>
		<span><a href="<?php echo str_replace('{page}', $i, $url) ?>"><?php echo $i ?></a></span>
	</li>

	<?php
		endif;
		endfor;

		if (($current_page + 1) < $total_pages):
	?>

	<li>&hellip;</li>
	<li>
		<span><a href="<?php echo str_replace('{page}', $total_pages, $url) ?>"><?php echo $total_pages ?></a></span>
	</li>

	<?php
		endif;
		endif;
	?>
</ul>
