<div class="sidebar sidebar-style-2" >
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?php echo base_url('assets/cms/img/haggen.png'); ?>" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php
				              echo $this->session->userdata('NAME');
				            ?>
							<span class="user-level">
								<?php
					              echo $this->session->userdata('GROUP_ID');
					            ?>				            	
				            </span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#settings">
									<span class="link-collapse">Change Password</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<ul class="nav nav-primary">

				<?php
				    $sql ="SELECT DISTINCT c.ID, c.NAME, c.DESCRIPTION AS ICON
				           FROM s_group_appl a
				           INNER JOIN s_appl b ON a.APPL_ID = b.ID
				           INNER JOIN s_appl_group c ON b.APPL_GROUP_ID = c.ID
				           WHERE a.GROUP_ID = '".$this->session->userdata('GROUP_ID')."'
				           ORDER BY c.ORDER_NO";

				    $i = 1;

				    $query = $this->db->query($sql);
				    foreach($query->result() as $data):
				  ?>
				  <?php
				    //SECOND QUERY TO CHECK IF THERE'S ANY CHILD MENU
				    $sql2 ="SELECT DISTINCT *
				            FROM s_group_appl a
				            INNER JOIN s_appl b ON a.APPL_ID = b.ID
				            WHERE a.GROUP_ID='".$this->session->userdata('GROUP_ID')."'
				            AND APPL_GROUP_ID='".$data->ID."'
				            AND b.LINK<>''
				            ORDER BY ORDER_NO";

				    $query2 = $this->db->query($sql2);
				    $total_rows = $query2->num_rows();
				?>
				<li class="nav-item active">
					<a data-toggle="collapse" href="#<?php echo $data->ID; ?>" class="collapsed" aria-expanded="false">
						<i class="<?php echo $data->ICON; ?>"></i>
						<p><?php echo $data->NAME; ?></p>
						<span class="caret"></span>
					</a>

					 <!-- Start query for submenu -->
      				<?php foreach($query2->result() as $data2): ?>
					<div class="collapse" id="<?php echo $data2->APPL_GROUP_ID; ?>">
						<ul class="nav nav-collapse">
							<li>
								<a href="<?php echo base_url('cms/'.$data2->LINK); ?>">
									<i class="<?php echo $data2->DESCRIPTION;?>"></i><?php echo $data2->NAME; ?>
								</a>
							</li>
						</ul>
					</div>
					<?php endforeach; ?>
				</li>
				<?php endforeach; ?>
				<!-- <li class="nav-item active">
					<a data-toggle="collapse" href="#mainmenu" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Main Menu</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="mainmenu">
						<ul class="nav nav-collapse">
							<li>
								<a href="../demo1/index.html">
									<span class="sub-item">Histori Suplai</span>
								</a>
							</li>
							<li>
								<a href="../demo2/index.html">
									<span class="sub-item">Client Kami</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item active">
					<a data-toggle="collapse" href="#general" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>General Settings</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="general">
						<ul class="nav nav-collapse">
							<li>
								<a href="../demo1/index.html">
									<span class="sub-item">User</span>
								</a>
							</li>
							<li>
								<a href="../demo2/index.html">
									<span class="sub-item">User Group</span>
								</a>
							</li>
						</ul>
					</div>
				</li> -->
				<!-- <li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Components</h4>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#base">
						<i class="fas fa-layer-group"></i>
						<p>Base</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="base">
						<ul class="nav nav-collapse">
							<li>
								<a href="components/avatars.html">
									<span class="sub-item">Avatars</span>
								</a>
							</li>
							<li>
								<a href="components/buttons.html">
									<span class="sub-item">Buttons</span>
								</a>
							</li>
							<li>
								<a href="components/gridsystem.html">
									<span class="sub-item">Grid System</span>
								</a>
							</li>
							<li>
								<a href="components/panels.html">
									<span class="sub-item">Panels</span>
								</a>
							</li>
							<li>
								<a href="components/notifications.html">
									<span class="sub-item">Notifications</span>
								</a>
							</li>
							<li>
								<a href="components/sweetalert.html">
									<span class="sub-item">Sweet Alert</span>
								</a>
							</li>
							<li>
								<a href="components/font-awesome-icons.html">
									<span class="sub-item">Font Awesome Icons</span>
								</a>
							</li>
							<li>
								<a href="components/simple-line-icons.html">
									<span class="sub-item">Simple Line Icons</span>
								</a>
							</li>
							<li>
								<a href="components/flaticons.html">
									<span class="sub-item">Flaticons</span>
								</a>
							</li>
							<li>
								<a href="components/typography.html">
									<span class="sub-item">Typography</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-th-list"></i>
						<p>Sidebar Layouts</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							<li>
								<a href="sidebar-style-1.html">
									<span class="sub-item">Sidebar Style 1</span>
								</a>
							</li>
							<li>
								<a href="overlay-sidebar.html">
									<span class="sub-item">Overlay Sidebar</span>
								</a>
							</li>
							<li>
								<a href="compact-sidebar.html">
									<span class="sub-item">Compact Sidebar</span>
								</a>
							</li>
							<li>
								<a href="static-sidebar.html">
									<span class="sub-item">Static Sidebar</span>
								</a>
							</li>
							<li>
								<a href="icon-menu.html">
									<span class="sub-item">Icon Menu</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-pen-square"></i>
						<p>Forms</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<li>
								<a href="forms/forms.html">
									<span class="sub-item">Basic Form</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#tables">
						<i class="fas fa-table"></i>
						<p>Tables</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tables">
						<ul class="nav nav-collapse">
							<li>
								<a href="tables/tables.html">
									<span class="sub-item">Basic Table</span>
								</a>
							</li>
							<li>
								<a href="tables/datatables.html">
									<span class="sub-item">Datatables</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#maps">
						<i class="fas fa-map-marker-alt"></i>
						<p>Maps</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="maps">
						<ul class="nav nav-collapse">
							<li>
								<a href="maps/jqvmap.html">
									<span class="sub-item">JQVMap</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#charts">
						<i class="far fa-chart-bar"></i>
						<p>Charts</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="charts">
						<ul class="nav nav-collapse">
							<li>
								<a href="charts/charts.html">
									<span class="sub-item">Chart Js</span>
								</a>
							</li>
							<li>
								<a href="charts/sparkline.html">
									<span class="sub-item">Sparkline</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a href="widgets.html">
						<i class="fas fa-desktop"></i>
						<p>Widgets</p>
						<span class="badge badge-success">4</span>
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-bars"></i>
						<p>Menu Levels</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav1">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#">
									<span class="sub-item">Level 1</span>
								</a>
							</li>
						</ul>
					</div>
				</li> -->
				<!-- <li class="mx-4 mt-2">
					<a href="http://themekita.com/atlantis-bootstrap-dashboard.html" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Buy Pro</a>
				</li> -->
			</ul>
		</div>
	</div>
</div>