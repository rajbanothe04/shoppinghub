<div id="content" class="span10">


	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="<?php echo base_url('service/service_dtls') ?>">Manage Services</a></li>
	</ul>

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Services</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class=""><i class="halflings-icon remove"></i></a>
				</div>
			</div>

			<style type="text/css">
			#result {
				color: red;
				padding: 5px
			}

			#result p {
				color: red
			}
			</style>
			<div id="result">
				<p><?php echo $this->session->flashdata('message'); ?></p>
			</div>
			<?= anchor("service/add_service", '+ Add Services', ['class' => 'btn btn-success']); ?>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th style="width: 80%;">Service Name</th>
							<th style="width: 20%;">Actions</th>
						</tr>
					</thead>
					<tbody><?php foreach ($all_services as $service) { ?>
						<tr>
							<td class="center"><?php echo $service->ser_name ?></td>
							<td class="center" style="text-align: center">
								<a class="btn btn-info"
									href="<?php echo base_url('service/edit_service/' . $service->ser_id); ?>">
									<i class="halflings-icon white edit"></i>
								</a>
								<a class="btn btn-danger"
									href="<?php echo base_url('service/delete_service/' . $service->ser_id); ?>">
									<i class="halflings-icon white trash"></i>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!--/span-->

	</div>
	<!--/row-->
</div>