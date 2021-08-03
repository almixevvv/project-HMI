<div class="sidebar sidebar-style-2">
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
								<a href="<?php echo base_url('cms/dashboard'); ?>">
									<span class="link-collapse">Dashboard</span>
								</a>
							</li>
							<li>
								<a href="#settings" id="modalChangePassword">
									<span class="link-collapse">Change Password</span>
								</a>
							</li>

						</ul>
					</div>
				</div>
			</div>

			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="<?php echo base_url('cms/dashboard')?>">
						<i class="fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php
				$sql = "SELECT DISTINCT c.ID, c.NAME, c.DESCRIPTION AS ICON
				           FROM s_group_appl a
				           INNER JOIN s_appl b ON a.APPL_ID = b.ID
				           INNER JOIN s_appl_group c ON b.APPL_GROUP_ID = c.ID
				           WHERE a.GROUP_ID = '" . $this->session->userdata('GROUP_ID') . "'
				           ORDER BY c.ORDER_NO";

				$i = 1;

				$query = $this->db->query($sql);
				foreach ($query->result() as $data) {

					//SECOND QUERY TO CHECK IF THERE'S ANY CHILD MENU
					$sql2 = "SELECT DISTINCT *
				            FROM s_group_appl a
				            INNER JOIN s_appl b ON a.APPL_ID = b.ID
				            WHERE a.GROUP_ID='" . $this->session->userdata('GROUP_ID') . "'
				            AND APPL_GROUP_ID='" . $data->ID . "'
				            AND b.LINK<>''
				            ORDER BY ORDER_NO";

					$query2 = $this->db->query($sql2);
				?>
					<li class="nav-item active">
						<a data-toggle="collapse" href="#<?php echo $data->ID; ?>" class="collapsed" aria-expanded="false">
							<i class="<?php echo $data->ICON; ?>"></i>
							<p><?php echo $data->NAME; ?></p>
							<span class="caret"></span>
						</a>
						<div id="<?php echo $data->ID; ?>">
							<ul class="nav nav-collapse">
								<?php foreach ($query2->result() as $data2) { ?>
									<li>
										<a href="<?php echo base_url('cms/' . $data2->LINK); ?>">
											<i class="<?php echo $data2->DESCRIPTION; ?>"></i><?php echo $data2->NAME; ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>