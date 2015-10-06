<div id="sidebar" class="sidebar responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Setting</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/params">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh giá trị
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/params/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm giá trị
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Danh mục </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/categories">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/categories/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Bài viết </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/posts">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách bài viết
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/posts/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới bài viết
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list-alt"></i>
				<span class="menu-text"> Sản phẩm </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/products">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách sản phẩm
					</a>

					<b class="arrow"></b>
				</li>
				
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/products/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới sản phẩm
					</a>

					<b class="arrow"></b>
				</li>
				
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Thuộc tính
					</a>
					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo DOMAIN_ROOT; ?>/admin/attributes">
								<i class="menu-icon fa fa-caret-right"></i>
								Danh sách thuộc tính
							</a>

							<b class="arrow"></b>
						</li>
						
						<li class="">
							<a href="<?php echo DOMAIN_ROOT; ?>/admin/attributes/add">
								<i class="menu-icon fa fa-caret-right"></i>
								Thêm mới thuộc tính
							</a>

							<b class="arrow"></b>
						</li>
						
					</ul>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Giá trị thuộc tính
					</a>
					<b class="arrow"></b>

					<ul class="submenu">
						<li class="">
							<a href="<?php echo DOMAIN_ROOT; ?>/admin/values">
								<i class="menu-icon fa fa-caret-right"></i>
								Danh sách giá trị
							</a>

							<b class="arrow"></b>
						</li>
						
						<li class="">
							<a href="<?php echo DOMAIN_ROOT; ?>/admin/values/add">
								<i class="menu-icon fa fa-caret-right"></i>
								Thêm mới giá trị
							</a>

							<b class="arrow"></b>
						</li>
						
					</ul>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Đơn hàng </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/orders">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách đơn hàng
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Nhóm thành viên </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/groups">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách nhóm
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/groups/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới nhóm
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Thành viên </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/users">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách thành viên
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/users/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới thành viên
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Gửi Email </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="/admin/subscribers/info">
						<i class="menu-icon fa fa-caret-right"></i>
						Thông tin chung
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="/products/email_newproducts/">
						<i class="menu-icon fa fa-caret-right"></i>
						Sản phẩm mới
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="/products/email_discount/">
						<i class="menu-icon fa fa-caret-right"></i>
						Sản phẩm khuyến mại
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		
		<li class="">
			<a href="<?php echo DOMAIN_ROOT; ?>/admin/countries" >
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Quản lý các quốc gia </span>

				
			</a>

			
		</li>
		
		
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Quản lý cước shipping </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/parcel">
						<i class="menu-icon fa fa-caret-right"></i>
						Gói cước Parcel
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/smallpacket">
						<i class="menu-icon fa fa-caret-right"></i>
						Gói cước Small Packet
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/parcel/ems">
						<i class="menu-icon fa fa-caret-right"></i>
						Gói cước EMS
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/parcel/dhl">
						<i class="menu-icon fa fa-caret-right"></i>
						Gói cước DHL
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		
		<li class="">
			<a href="<?php echo DOMAIN_ROOT; ?>/admin/slides" >
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Quản lý slide </span>

				
			</a>

			
		</li>
		
	<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Quản lý combo </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/combos">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách combo
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/combos/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới combo
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/combovalues/">
						<i class="menu-icon fa fa-caret-right"></i>
						Quản lý mức combo
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		
		
		<li class="">
			<a href="<?php echo DOMAIN_ROOT; ?>/admin/testimonials" >
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Testimonials</span>
			</a>

			
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Quản lý Contact</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/contacts">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách contact
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/contacts/send_email">
						<i class="menu-icon fa fa-caret-right"></i>
						Send email
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Quản lý Coupon</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/coupons">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách coupon
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo DOMAIN_ROOT; ?>/admin/coupons/add">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới coupon
					</a>

					<b class="arrow"></b>
				</li>

			</ul>
		</li>
			
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>
