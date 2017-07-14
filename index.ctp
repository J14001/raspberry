<div class="arduinos index">
	<h2><?php __('Arduinos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hikari');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($arduinos as $arduino):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $arduino['Arduino']['id']; ?>&nbsp;</td>
		<td><?php echo $arduino['Arduino']['hikari']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $arduino['Arduino']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $arduino['Arduino']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $arduino['Arduino']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $arduino['Arduino']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Arduino', true), array('action' => 'add')); ?></li>
	</ul>
</div>



<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {
var data = new google.visualization.DataTable();
		data.addColumn('string', 'id');
		data.addColumn('number', 'hikari');
		<?php foreach($arduinos as $arduino): ?>

			data.addRows([
				['<?php echo h($arduino['Arduino']['id']); ?>', <?php echo h($arduino['Arduino']['hikari']); ?>]
			]);
		<?php endforeach; ?>
 
 
 
var options = {
title: 'My Daily Activities'
};
 
var chart = new google.visualization.LineChart(document.getElementById('linechart'));
chart.draw(data, options);
}
</script>
<div id="linechart" style="width: 900px; height: 500px;"></div>

