<?php foreach($item as $key => $item): ?>
<li>
<a href="#<?php echo $key ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="lni-folder"></i><?php echo $key ?></a>
  <ul class="collapse list-unstyled" id="<?php echo $key ?>">
	<?php if(is_array($item)){
		self::setTree($item);
	}
	?>
	</ul>
</li>
<?php endforeach; ?>