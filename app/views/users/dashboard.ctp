
<p>Welcome!</p>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('ID', 'id'); ?></th>
        <th><?php echo $this->Paginator->sort('Username', 'username'); ?></th>
        <th><?php //echo $this->Paginator->sort('Website', 'website'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
    </tr>
       <?php foreach($data as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?> </td>
        <td><?php echo $user['User']['username']; ?> </td>
        <td><?php //echo $user['Profile']['website']; ?> </td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(
				$this->Html->image('/img/admin/icons/test.png',array('style' => 'width: 20px; height: 20px; margin-right: 3px;')
				), array('action' => 'signature', $user['User']['id']),array('escape' => false)); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
<!-- Shows the page numbers -->
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class'=>'disabled')); ?>

<?php echo $this->Paginator->numbers(); ?>

<?php echo $this->Paginator->next('Next »', null, null, array('class'=>'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->