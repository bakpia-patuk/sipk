<?php
	if ($admin_status == TRUE) {
?>
<ul id="mctrl-menu" class="menutop level1">
	<li class="li-dashboard dashboard root<?php echo $menu_active === "Dashboard" ? " active" : ""; ?>">
		<a class="dashboard item" href="<?php echo site_url('admin/admin'); ?>">Dashboard</a>
	</li>
	<li class="li-users parent root<?php echo $menu_active === "Users" ? " active" : ""; ?>">
		<span class=" daddy item">
			<span>Users</span>
		</span>
		<ul class="level2 parent-users">
			<li class="li-user-manager class:user parent">
				<a class="class:user daddy item" href="<?php echo site_url('admin/user'); ?>">User Manager</a>
				<ul class="level3 parent-user-manager">
					<li class="li-add-new-user class:newarticle">
						<a class="class:newarticle item" href="<?php echo site_url('admin/user/add'); ?>">Tambah User Baru</a>
					</li>
				</ul>
			</li>
			<li class="li-groups class:groups parent">
				<a class="class:groups daddy item" href="<?php echo site_url('admin/usergroup'); ?>">User Group</a>
				<ul class="level3 parent-groups">
					<li class="li-add-new-group class:newarticle">
						<a class="class:newarticle item" href="<?php echo site_url('admin/usergropu/add'); ?>">Tambah Group Baru</a>
					</li>
				</ul>
			</li>
			<li class="li- separator separator">
				<span></span>
			</li>
			<li class="li-access-levels class:levels parent">
				<a class="class:levels daddy item" href="<?php echo site_url('admin/member'); ?>">Member</a>
				<ul class="level3 parent-access-levels">
					<li class="li-add-new-access-level class:newarticle">
						<a class="class:newarticle item" href="<?php echo site_url('admin/member/add'); ?>">Tambah Member Baru</a>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<li class="li-informasi parent root<?php echo $menu_active === "Informasi" ? " active" : ""; ?>">
		<span class=" daddy item">
			<span>Informasi</span>
		</span>
		<ul class="level2 parent-informasi">
			<li class="li-menu-manager class:menumgr parent">
				<a class="class:menumgr daddy item" href="<?php echo site_url('admin/sekolah'); ?>">Sekolah</a>
				<ul class="level3 parent-menu-manager">
					<li class="li-add-new-menu class:newarticle">
						<a class="class:newarticle item" href="index.php?option=com_menus&amp;view=menu&amp;layout=edit">Tambah Sekolah Baru</a>
					</li>
				</ul>
			</li>
            <li class="li-perguruan-manager class:jurusanmgr parent">
                <a class="class:jurusanmgr daddy item" href="<?php echo site_url('admin/perguruan'); ?>">Perguruan Tinggi</a>
                <ul class="level3 parent-perguruan-manager">
                    <li class="li-add-new-perguruan class:perguruan">
                        <a class="class:perguruan daddy item" href="<?php echo site_url('admin/perguruan'); ?>">Perguruan Tinggi</a>
                        <ul class="level4 parent-new-perguruan">
                            <li class="li-add-new-perguruan class:new-perguruan">
                                <a class="class:new-perguruan item" href="<?php echo site_url('admin/perguruan/add'); ?>">Tambah Perguruan Tinggi Baru</a>
                            </li>
                        </ul>
                    </li>
                    <li class="li-add-new-jurusan class:jurusan">
                        <a class="class:jurusan daddy item" href="<?php echo site_url('admin/jurusan'); ?>">Jurusan Perguruan Tinggi</a>
						<ul class="level4 parent-new-jurusan">
                            <li class="li-add-new-jurusan class:new-jurusan">
                                <a class="class:new-jurusan item" href="<?php echo site_url('admin/jurusan/add'); ?>">Tambah Jurusan Baru</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
			<li class="li-menu-manager class:menumgr parent">
				<a class="class:menumgr daddy item" href="<?php echo site_url('admin/kursus'); ?>">Bimbel/Kursus/Test</a>
				<ul class="level3 parent-menu-manager">
					<li class="li-add-new-menu class:newarticle">
						<a class="class:newarticle item" href="index.php?option=com_menus&amp;view=menu&amp;layout=edit">Tambah Bimbel/Kursus/Test Baru</a>
					</li>
				</ul>
			</li>
			<li class="li- separator separator"><span></span></li>
			<li class="li-user-menu class:menu parent">
				<a class="class:menu daddy item" href="<?php echo site_url('admin/kesehatan'); ?>">Institusi Kesehatan</a>
				<ul class="level3 parent-user-menu">
					<li class="li-add-new-menu-item class:newarticle">
						<a class="class:newarticle item" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=usermenu">Add New Menu Item</a>
					</li>
				</ul>
			</li>
			<li class="li-dokter-manager class:menu parent">
				<a class=" daddy item" href="<?php echo site_url('admin/dokter'); ?>">Dokter</a>
				<ul class="level3 parent-top">
					<li class="li-add-new-dokter class:newarticle">
						<a class=" daddy item" href="<?php echo site_url('admin/dokter'); ?>">Dokter</a>
                        <ul class="level4 parent-new-dokter">
                            <li class="li-add-new-dokter class:new-dokter">
                                <a class="class:new-dokter item" href="<?php echo site_url('admin/dokter/add'); ?>">Tambah Dokter Baru</a>
                            </li>
                        </ul>
					</li>
                    <li class="li-add-new-spesialis class:newarticle">
						<a class=" daddy item" href="<?php echo site_url('admin/spesialis'); ?>">Spesialis Kedokteran</a>
                        <ul class="level4 parent-new-spesialis">
                            <li class="li-add-new-spesialis class:new-spesialis">
                                <a class="class:new-spesialis item" href="<?php echo site_url('admin/spesialis/add'); ?>">Tambah Spesialis Baru</a>
                            </li>
                        </ul>
					</li>
				</ul>
			</li>
			<li class="li-about-sipk class:menu parent">
				<a class="class:menu daddy item" href="<?php echo site_url('admin/obat'); ?>">Obat</a>
				<ul class="level3 parent-about-sipk">
                    <li class="li-add-new-obat class:newobat">
						<a class=" daddy item" href="<?php echo site_url('admin/obat'); ?>">Obat</a>
                        <ul class="level4 parent-new-obat">
                            <li class="li-add-new-obat class:new-obat">
                                <a class="class:new-obat item" href="<?php echo site_url('admin/obat/add'); ?>">Tambah Obat Baru</a>
                            </li>
                        </ul>
					</li>
                    <li class="li-add-new-obatherbal class:newobatherbal">
						<a class=" daddy item" href="<?php echo site_url('admin/obat_herbal'); ?>">Obat Herbal</a>
                        <ul class="level4 parent-new-obatherbal">
                            <li class="li-add-new-obatherbal class:new-obatherbal">
                                <a class="class:new-obatherbal item" href="<?php echo site_url('admin/obat_herbal/add'); ?>">Tambah Obat Herbal Baru</a>
                            </li>
                        </ul>
					</li>
				</ul>
			</li>
			<li class="li-main-menu- class:menu parent">
				<a class="class:menu daddy item" href="<?php echo site_url('admin/penyakit'); ?>">Penyakit<span class="default">*</span></a>
				<ul class="level3 parent-main-menu-">
					<li class="li-add-new-menu-item class:newarticle">
						<a class="class:newarticle item" href="index.php?option=com_menus&amp;view=item&amp;layout=edit&amp;menutype=mainmenu">Add New Menu Item</a>
					</li>
				</ul>
			</li>
			<li class="li- separator separator"><span></span></li>
			<li class="li-fruit-shop class:menu parent">
				<a class="class:menu daddy item" href="<?php echo site_url('admin/tips'); ?>">Tips</a>
				<ul class="level3 parent-fruit-shop">
					<li class="li-add-new-menu-item class:newarticle">
						<a class="class:newarticle item" href="<?php echo site_url('admin/tips/add'); ?>">Tambah Tips Baru</a>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<li class="li-Artikel parent root<?php echo $menu_active === "Artikel" ? " active" : ""; ?>">
		<span class=" daddy item">
			<span>Artikel</span>
		</span>
		<ul class="level2 parent-artikel">
			<li class="li-artikel-manager class:artikel parent">
				<a class="class:artikel daddy item" href="<?php echo site_url('admin/artikel'); ?>">Artikel Manager</a>
				<ul class="level3 parent-artikel-manager">
					<li class="li-add-new-article class:newartikel">
						<a class="class:newartikel item" href="<?php echo site_url('admin/artikel/add'); ?>">Tambah Artikel Baru</a>
					</li>
				</ul>
			</li>
			<li class="li-category-manager class:category parent">
				<a class="class:category daddy item" href="<?php echo site_url('admin/kategori'); ?>">Kategori Manager</a>
				<ul class="level3 parent-category-manager">
					<li class="li-add-new-category class:newarticle">
						<a class="class:newarticle item" href="<?php echo site_url('admin/ketegori/add'); ?>">Tambah Kategori Baru</a>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	<li class="li-configure class:config root<?php echo $menu_active === "Configure" ? " active" : ""; ?>">
		<a class="class:config item" href="<?php echo site_url('admin/admin/config'); ?>">Configure</a>
	</li>
	<li class="li-help parent root<?php echo $menu_active === "Help" ? " active" : ""; ?>">
		<span class=" daddy item">
			<span>Help</span>
		</span>
		<ul class="level2 parent-help">
			<li class="li-sipk-help class:help">
				<a class="class:help item" href="<?php echo site_url('admin/help'); ?>">SIPK Help</a>
			</li>
		</ul>
	</li>
</ul>
<?php
	}
	else {
?>
<ul id="mctrl-menu" class="menutop level1 disabled">
	<li class="li-dashboard disabled disabled root<?php echo $menu_active === "Dashboard" ? " active" : ""; ?>">
		<span class="disabled item">
			<span>Dashboard</span>
		</span>
	</li>
	<li class="li-users disabled daddy disabled root<?php echo $menu_active === "Users" ? " active" : ""; ?>">
		<span class="disabled daddy item">
			<span>Users</span>
		</span>
	</li>
	<li class="li-informasi disabled daddy disabled root<?php echo $menu_active === "Informasi" ? " active" : ""; ?>">
		<span class="disabled daddy item">
			<span>Informasi</span>
		</span>
	</li>
	<li class="li-articles disabled daddy disabled root<?php echo $menu_active === "Artikel" ? " active" : ""; ?>">
		<span class="disabled daddy item">
			<span>Artikel</span>
		</span>
	</li>
	<li class="li-configure disabled disabled root<?php echo $menu_active === "Configure" ? " active" : ""; ?>">
		<span class="disabled item">
			<span>Configure</span>
		</span>
	</li>
	<li class="li-help disabled daddy disabled root<?php echo $menu_active === "Help" ? " active" : ""; ?>">
		<span class="disabled daddy item">
			<span>Help</span>
		</span>
	</li>
</ul>
<?php
	}
?>