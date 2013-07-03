<?php var_dump($projects) ?>
<?php foreach($projects->data as $p): ?>
<?php echo $p->name.'<br />'; ?>
<?php endforeach; ?>