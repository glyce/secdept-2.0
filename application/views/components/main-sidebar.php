
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
			<li class="header">HEADER</li>
			<li class="<?php echo ($active_menu == 'dashboard') ? 'active': ''; ?>">
				<a href="<?php echo site_url('admin/dashboard'); ?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<?php if ($default_group['tbl_group_id'] == 3): ?>
			<li class="treeview <?php echo ($active_menu == 'daily_report' || $active_menu == 'incident_report') ? 'active': ''; ?>">
				<a href="javascript:void(0);">
					<i class="fa fa-line-chart"></i> <span>Reports</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo site_url('admin/daily_report'); ?>"><i class="fa fa-angle-double-right"></i> Daily Reports</a></li>
					<li><a href="<?php echo site_url('admin/incident_report'); ?>"><i class="fa fa-angle-double-right"></i> Incident Reports</a></li>
				</ul>
			</li>
			<?php else: ?>
			<li class="<?php echo ($active_menu == 'appointments') ? 'active': ''; ?>">
				<a href="<?php echo site_url('admin/appointments'); ?>">
					<i class="fa fa-calendar"></i> <span>Appointments</span>
				</a>
			</li>
			<li class="treeview <?php echo ($active_menu == 'security_guards' || $active_menu == 'inspectors' || $active_menu == 'employees') ? 'active': ''; ?>">
				<a href="javascript:void(0);">
					<i class="fa fa-file"></i> <span>201 File</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo site_url('admin/employees'); ?>"><i class="fa fa-angle-double-right"></i> Employees</a>
					</li>
					<li>
						<a href="<?php echo site_url('admin/security_guards'); ?>"><i class="fa fa-angle-double-right"></i> Security Guard List</a>
					</li>
					<li>
						<a href="<?php echo site_url('admin/inspectors'); ?>"><i class="fa fa-angle-double-right"></i> Inspector List</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo ($active_menu == 'daily_report' || $active_menu == 'incident_report') ? 'active': ''; ?>">
				<a href="javascript:void(0);">
					<i class="fa fa-line-chart"></i> <span>Reports</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo site_url('admin/daily_report'); ?>"><i class="fa fa-angle-double-right"></i> Daily Reports</a></li>
					<li><a href="<?php echo site_url('admin/incident_report'); ?>"><i class="fa fa-angle-double-right"></i> Incident Reports</a></li>
				</ul>
			</li>
			<li class="<?php echo ($active_menu == 'duty_order') ? 'active': ''; ?>">
				<a href="<?php echo site_url('admin/duty_order'); ?>">
					<i class="fa fa-legal"></i> <span>Duty Order</span>
				</a>
			</li>
			<li class="<?php echo ($active_menu == 'clients') ? 'active': ''; ?>">
				<a href="<?php echo site_url('admin/clients'); ?>">
					<i class="fa fa-users"></i> <span>Clients</span>
				</a>
			</li>
			<li class="<?php echo ($active_menu == 'deployment') ? 'active': ''; ?>">
				<a href="<?php echo site_url('admin/deployment'); ?>">
					<i class="fa fa-handshake-o"></i> <span>Deployment</span>
				</a>
			</li>
			<?php endif; ?>
		</ul>
    </section>
</aside>
