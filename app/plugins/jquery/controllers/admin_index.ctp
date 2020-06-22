
		<div class="container-fluid">
			
			<div class="row">
				
					<div class="users index table-responsive">
						<h2><?php __('Manage Institutions');?></h2>
						<table cellpadding="0" cellspacing="0" class="table table-hover">
						<thead class="thead-white">
							<tr>
								<th scope="col"><?php echo $this->Paginator->sort('id');?></th>
								<th scope="col"><?php echo $this->Paginator->sort('name');?></th>
								<th scope="col"><?php echo $this->Paginator->sort('details');?></th>
								<th scope="col"><?php echo $this->Paginator->sort('enabled');?></th>
								<th scope="col"><?php echo $this->Paginator->sort('entry_datetime');?></th>
								<th scope="col" class="actions"><?php __('Actions');?></th>
							</tr>
						</thead>
						<?php
						$i = 0;
						foreach ($institutions as $institution):
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="altrow"';
							}
						?>
						<tr<?php echo $class;?>>
							<td><?php echo $institution['Institution']['id']; ?>&nbsp;</td>
							<td><?php echo $institution['Institution']['name']; ?>&nbsp;</td>
							<td><?php echo $institution['Institution']['details']; ?>&nbsp;</td>
							<td><?php echo $institution['Institution']['enabled']; ?>&nbsp;</td>
							<td><?php echo $institution['Institution']['entry_datetime']; ?>&nbsp;</td>
							<td class="actions">
								<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $institution['Role']['id'])); ?>
								<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $institution['Institution']['id'])); ?>
								<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $institution['Institution']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $institution['Institution']['id'])); ?>
							</td>
						</tr>
						<?php endforeach; ?>
						</table>
						<p>
							<?php
								echo $this->Paginator->counter(array(
								'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
								));
							?>
						</p>

						<div class="paging">
							<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
						| 	<?php echo $this->Paginator->numbers();?>	|
							<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
						</div>
					</div>
			</div>
		</div>