		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						
						@if(auth::user()->jenis=='klien')
						<li><a href="{{ url('/') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<!-- <li><a href="{{ url('event') }}"><i class="fa fa-calendar-check-o"></i> <span>Event</span></a></li> -->
						<li><a href="{{ url('gedung') }}"><i class="fa fa-building"></i> <span>Gedung</span></a></li>
						<li><a href="{{ url('kostum') }}"><i class="fa fa-black-tie"></i> <span>Kostum</span></a></li>
						<li><a href="{{ url('paket') }}"><i class="fa fa-dropbox"></i> <span>Paket</span></a></li>
						@elseif(auth::user()->jenis=='admin')
						<li><a href="{{ url('admin') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{ url('admin/event') }}"><i class="fa fa-calendar-check-o"></i> <span>Event</span></a></li>
						<li><a href="{{ url('admin/gedung') }}"><i class="fa fa-building"></i> <span>Gedung</span></a></li>
						<li><a href="{{ url('admin/kostum') }}"><i class="fa fa-black-tie"></i> <span>Kostum</span></a></li>
						<li><a href="{{ url('admin/paket') }}"><i class="fa fa-dropbox"></i> <span>Paket</span></a></li>
						<li><a href="{{ url('admin/youtube') }}"><i class="fa fa-forward"></i> <span>Youtube</span></a></li>



						<!-- <li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li> -->
						@endif
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->