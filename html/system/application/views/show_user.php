<p>Here are all the items for user 1.</p>

<ul>
<?php foreach($results as $row):?>

<li><?php echo $row->summary . " | Due by: " . $row->due;?></li>

<?php endforeach;?>
</ul>
