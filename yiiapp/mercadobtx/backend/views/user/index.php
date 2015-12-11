<?php
/**
 * @var UserController $this
 * @var CActiveDataProvider $dataProvider
 */
$this->breadcrumbs = array (
		'Users' 
);

$this->menu = array (
		array (
				'label' => 'Create User',
				'url' => array (
						'create' 
				) 
		),
);
?>

<h1>Users</h1>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Status</th>
			<th>Username/Email</th>
			<th>Login</th>
		</tr>
	</thead>
	<tbody>
<?php

$this->widget ( 'zii.widgets.CListView', array (
		'dataProvider' => $dataProvider,
		'itemView' => '_view' 
) );
?>
	</tbody>
</table>
</div>