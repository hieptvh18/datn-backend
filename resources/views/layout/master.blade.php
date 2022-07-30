<!DOCTYPE html>
<html lang="en">


<head>
	@include('partials._head')
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="effect aside-float aside-bright mainnav-lg">

		<!--NAVBAR-->
		<!--===================================================-->
		@include('partials._header')
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				<div id="page-head">

					<div class="pad-all text-center">
						<h3>Welcome back to the Dashboard.</h3>
						<p>Scroll down to see quick links and overviews of your Server, To do list, Order status or get
							some Help using Nifty.</p>
					</div>
				</div>


				<!--Page content-->
				<!--===================================================-->
				<div id="page-content">

					<div class="row">
						<div class="col-lg-7">

							<!--Network Line Chart-->
							<!--===================================================-->
							<div id="demo-panel-network" class="panel">
								<div class="panel-heading">
									<div class="panel-control">
										<button id="demo-panel-network-refresh"
											class="btn btn-default btn-active-primary" data-toggle="panel-overlay"
											data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
										<div class="dropdown">
											<button class="dropdown-toggle btn btn-default btn-active-primary"
												data-toggle="dropdown" aria-expanded="false"><i
													class="demo-psi-dot-vertical"></i></button>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
											</ul>
										</div>
									</div>
									<h3 class="panel-title">Network</h3>
								</div>


								<!--chart placeholder-->
								<div class="pad-all">
									<div id="demo-chart-network" style="height: 255px"></div>
								</div>


								<!--Chart information-->
								<div class="panel-body">

									<div class="row">
										<div class="col-lg-8">
											<p class="text-semibold text-uppercase text-main">CPU Temperature</p>
											<div class="row">
												<div class="col-xs-5">
													<div class="media">
														<div class="media-left">
															<span class="text-3x text-thin text-main">43.7</span>
														</div>
														<div class="media-body">
															<p class="mar-no">°C</p>
														</div>
													</div>
												</div>
												<div class="col-xs-7 text-sm">
													<p>
														<span>Min Values</span>
														<span class="pad-lft text-semibold">
															<span class="text-lg">27°</span>
															<span class="labellabel-success mar-lft">
																<i class="pci-caret-down text-success"></i>
																<smal>- 20</smal>
															</span>
														</span>
													</p>
													<p>
														<span>Max Values</span>
														<span class="pad-lft text-semibold">
															<span class="text-lg">69°</span>
															<span class="labellabel-danger mar-lft">
																<i class="pci-caret-up text-danger"></i>
																<smal>+ 57</smal>
															</span>
														</span>
													</p>
												</div>
											</div>

											<hr>

											<div class="pad-rgt">
												<p class="text-semibold text-uppercase text-main">Today Tips</p>
												<p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer
													adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
											</div>
										</div>

										<div class="col-lg-4">
											<p class="text-uppercase text-semibold text-main">Bandwidth Usage</p>
											<ul class="list-unstyled">
												<li>
													<div class="media pad-btm">
														<div class="media-left">
															<span class="text-2x text-thin text-main">754.9</span>
														</div>
														<div class="media-body">
															<p class="mar-no">Mbps</p>
														</div>
													</div>
												</li>
												<li class="pad-btm">
													<div class="clearfix">
														<p class="pull-left mar-no">Income</p>
														<p class="pull-right mar-no">70%</p>
													</div>
													<div class="progress progress-sm">
														<div class="progress-bar progress-bar-info" style="width: 70%;">
															<span class="sr-only">70% Complete</span>
														</div>
													</div>
												</li>
												<li>
													<div class="clearfix">
														<p class="pull-left mar-no">Outcome</p>
														<p class="pull-right mar-no">10%</p>
													</div>
													<div class="progress progress-sm">
														<div class="progress-bar progress-bar-primary"
															style="width: 10%;">
															<span class="sr-only">10% Complete</span>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>


							</div>
							<!--===================================================-->
							<!--End network line chart-->

						</div>
						<div class="col-lg-5">
							<div class="row">
								<div class="col-sm-6 col-lg-6">

									<!--Sparkline Area Chart-->
									<div class="panel panel-success panel-colorful">
										<div class="pad-all">
											<p class="text-lg text-semibold"><i
													class="demo-pli-data-storage icon-fw"></i> HDD Usage</p>
											<p class="mar-no">
												<span class="pull-right text-bold">132Gb</span> Free Space
											</p>
											<p class="mar-no">
												<span class="pull-right text-bold">1,45Gb</span> Used space
											</p>
										</div>
										<div class="pad-top text-center">
											<!--Placeholder-->
											<div id="demo-sparkline-area" class="sparklines-full-content"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6">

									<!--Sparkline Line Chart-->
									<div class="panel panel-info panel-colorful">
										<div class="pad-all">
											<p class="text-lg text-semibold">Earning</p>
											<p class="mar-no">
												<span class="pull-right text-bold">$764</span> Today
											</p>
											<p class="mar-no">
												<span class="pull-right text-bold">$1,332</span> Last 7 Day
											</p>
										</div>
										<div class="pad-top text-center">

											<!--Placeholder-->
											<div id="demo-sparkline-line" class="sparklines-full-content"></div>

										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 col-lg-6">

									<!--Sparkline bar chart -->
									<div class="panel panel-purple panel-colorful">
										<div class="pad-all">
											<p class="text-lg text-semibold"><i
													class="demo-pli-basket-coins icon-fw"></i> Sales</p>
											<p class="mar-no">
												<span class="pull-right text-bold">$764</span> Today
											</p>
											<p class="mar-no">
												<span class="pull-right text-bold">$1,332</span> Last 7 Day
											</p>
										</div>
										<div class="text-center">

											<!--Placeholder-->
											<div id="demo-sparkline-bar" class="box-inline"></div>

										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6">

									<!--Sparkline pie chart -->
									<div class="panel panel-warning panel-colorful">
										<div class="pad-all">
											<p class="text-lg text-semibold">Task Progress</p>
											<p class="mar-no">
												<span class="pull-right text-bold">34</span> Completed
											</p>
											<p class="mar-no">
												<span class="pull-right text-bold">79</span> Total
											</p>
										</div>
										<div class="pad-all">
											<div class="pad-btm">
												<div class="progress progress-sm">
													<div style="width: 45%;" class="progress-bar progress-bar-light">
														<span class="sr-only">45%</span>
													</div>
												</div>
											</div>
											<div class="pad-btm">
												<div class="progress progress-sm">
													<div style="width: 89%;" class="progress-bar progress-bar-light">
														<span class="sr-only">89%</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<!--Extra Small Weather Widget-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel">
								<div class="panel-body text-center clearfix">
									<div class="col-sm-4 pad-top">
										<div class="text-lg">
											<p class="text-5x text-thin text-main">95</p>
										</div>
										<p class="text-sm text-bold text-uppercase">New Friends</p>
									</div>
									<div class="col-sm-8">
										<button class="btn btn-pink mar-ver">View Details</button>
										<p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
										<ul class="list-unstyled text-center bord-top pad-top mar-no row">
											<li class="col-xs-4">
												<span class="text-lg text-semibold text-main">1,345</span>
												<p class="text-sm text-muted mar-no">Following</p>
											</li>
											<li class="col-xs-4">
												<span class="text-lg text-semibold text-main">23K</span>
												<p class="text-sm text-muted mar-no">Followers</p>
											</li>
											<li class="col-xs-4">
												<span class="text-lg text-semibold text-main">278</span>
												<p class="text-sm text-muted mar-no">Post</p>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<!--End Extra Small Weather Widget-->


						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="panel panel-warning panel-colorful media middle pad-all">
								<div class="media-left">
									<div class="pad-hor">
										<i class="demo-pli-file-word icon-3x"></i>
									</div>
								</div>
								<div class="media-body">
									<p class="text-2x mar-no text-semibold">241</p>
									<p class="mar-no">Documents</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-info panel-colorful media middle pad-all">
								<div class="media-left">
									<div class="pad-hor">
										<i class="demo-pli-file-zip icon-3x"></i>
									</div>
								</div>
								<div class="media-body">
									<p class="text-2x mar-no text-semibold">241</p>
									<p class="mar-no">Zip Files</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-mint panel-colorful media middle pad-all">
								<div class="media-left">
									<div class="pad-hor">
										<i class="demo-pli-camera-2 icon-3x"></i>
									</div>
								</div>
								<div class="media-body">
									<p class="text-2x mar-no text-semibold">241</p>
									<p class="mar-no">Photos</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-danger panel-colorful media middle pad-all">
								<div class="media-left">
									<div class="pad-hor">
										<i class="demo-pli-video icon-3x"></i>
									</div>
								</div>
								<div class="media-body">
									<p class="text-2x mar-no text-semibold">241</p>
									<p class="mar-no">Videos</p>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-sm-6 col-lg-4">
							<!--List Todo-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel panel-trans">
								<div class="panel-heading">
									<h3 class="panel-title">To do list</h3>
								</div>
								<div class="pad-ver">
									<ul class="list-group bg-trans list-todo mar-no">
										<li class="list-group-item">
											<input id="demo-todolist-1" class="magic-checkbox" type="checkbox">
											<label for="demo-todolist-1"><span>Find an idea. <span
														class="label label-danger">Important</span></span></label>
										</li>
										<li class="list-group-item">
											<input id="demo-todolist-2" class="magic-checkbox" type="checkbox" checked>
											<label for="demo-todolist-2"><span>Do some work</span></label>
										</li>
										<li class="list-group-item">
											<input id="demo-todolist-3" class="magic-checkbox" type="checkbox">
											<label for="demo-todolist-3"><span>Read the book</span></label>
										</li>
										<li class="list-group-item">
											<input id="demo-todolist-4" class="magic-checkbox" type="checkbox">
											<label for="demo-todolist-4"><span>Upgrade server <span
														class="label label-warning">Warning</span></span></label>
										</li>
										<li class="list-group-item">
											<input id="demo-todolist-5" class="magic-checkbox" type="checkbox" checked>
											<label for="demo-todolist-5"><span>Redesign my logo <span
														class="label label-info">2 Mins</span></span></label>
										</li>
									</ul>
								</div>
								<div class="input-group pad-all">
									<input type="text" class="form-control" placeholder="New task" autocomplete="off">
									<span class="input-group-btn">
										<button type="button" class="btn btn-success"><i
												class="demo-pli-add"></i></button>
									</span>
								</div>
							</div>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<!--End todo list-->
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-trans">
								<div class="panel-heading">
									<div class="panel-control">
										<a title="" data-html="true" data-container="body"
											data-original-title="&lt;p class='h4 text-semibold'&gt;Information&lt;/p&gt;&lt;p style='width:150px'&gt;This is an information bubble to help the user.&lt;/p&gt;"
											href="#"
											class="demo-psi-information icon-lg icon-fw unselectable text-info add-tooltip"></a>
									</div>
									<h3 class="panel-title">Services</h3>
								</div>
								<div class="bord-btm">
									<ul class="list-group bg-trans">
										<li class="list-group-item">
											<div class="pull-right">
												<input id="demo-online-status-checkbox" class="toggle-switch"
													type="checkbox" checked>
												<label for="demo-online-status-checkbox"></label>
											</div>
											Online status
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input id="demo-show-off-contact-checkbox" class="toggle-switch"
													type="checkbox" checked>
												<label for="demo-show-off-contact-checkbox"></label>
											</div>
											Show offline contact
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input id="demo-show-device-checkbox" class="toggle-switch"
													type="checkbox">
												<label for="demo-show-device-checkbox"></label>
											</div>
											Show my device icon
										</li>
									</ul>
								</div>
								<div class="panel-body">
									<div class="pad-btm">
										<p class="text-semibold text-main">Upgrade Progress</p>
										<div class="progress progress-md">
											<div class="progress-bar progress-bar-purple" aria-valuenow="15"
												aria-valuemin="0" aria-valuemax="100" style="width: 15%;"
												role="progressbar">
												<span class="sr-only">15%</span>
											</div>
										</div>
										<small>15% Completed</small>
									</div>
									<div>
										<p class="text-semibold text-main">Database</p>
										<div class="progress progress-md">
											<div class="progress-bar progress-bar-success" aria-valuenow="70"
												aria-valuemin="0" aria-valuemax="100" style="width: 70%;"
												role="progressbar">
												<span class="sr-only">70%</span>
											</div>
										</div>
										<small>70% Completed</small>
									</div>
								</div>
							</div>
						</div>
						<div class='col-sm-12 col-lg-4'>
							<div class="panel panel-trans">
								<div class="pad-all">
									<div class="media mar-btm">
										<div class="media-left">
											<img src="img/profile-photos/2.png" class="img-md img-circle" alt="Avatar">
										</div>
										<div class="media-body">
											<p class="text-lg text-main text-semibold mar-no">Ralph West</p>
											<p>Project manager</p>
										</div>
									</div>
									<blockquote class="bq-sm bq-open bq-close">Lorem ipsum dolor sit amet, consecte tuer
										adipiscing elit, sed diam nonummy nibh euismod tincidunt.</blockquote>
								</div>

								<div class="bord-top">
									<ul class="list-group bg-trans bord-no">
										<li class="list-group-item list-item-sm">
											<div class="media-left">
												<i class="demo-psi-facebook icon-lg"></i>
											</div>
											<div class="media-body">
												<a href="#" class="btn-link text-semibold">Facebook</a>
											</div>
										</li>
										<li class="list-group-item list-item-sm">
											<div class="media-left">
												<i class="demo-psi-twitter icon-lg"></i>
											</div>
											<div class="media-body">
												<a href="#" class="btn-link text-semibold">@RalphWe</a>
												<br> Design my themes with <a href="#"
													class="btn-link text-bold">#Bootstrap</a> Lorem ipsum dolor sit
												amet, consectetuer adipiscing elit.
											</div>
										</li>
										<li class="list-group-item list-item-sm">
											<div class="media-left">
												<i class="demo-psi-instagram icon-lg"></i>
											</div>
											<div class="media-body">
												<a href="#" class="btn-link text-semibold">Ralphz</a>
											</div>
										</li>
										<li class="list-group-item list-item-sm">
											<div class="media-body">

											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Order Status</h3>
								</div>

								<!--Data Table-->
								<!--===================================================-->
								<div class="panel-body">
									<div class="pad-btm form-inline">
										<div class="row">
											<div class="col-sm-6 table-toolbar-left">
												<button class="btn btn-purple"><i
														class="demo-pli-add icon-fw"></i>Add</button>
												<button class="btn btn-default"><i
														class="demo-pli-printer icon-lg"></i></button>
												<div class="btn-group">
													<button class="btn btn-default"><i
															class="demo-pli-information icon-lg"></i></button>
													<button class="btn btn-default"><i
															class="demo-pli-trash icon-lg"></i></button>
												</div>
											</div>
											<div class="col-sm-6 table-toolbar-right">
												<div class="form-group">
													<input type="text" autocomplete="off" class="form-control"
														placeholder="Search" id="demo-input-search2">
												</div>
												<div class="btn-group">
													<button class="btn btn-default"><i
															class="demo-pli-download-from-cloud icon-lg"></i></button>
													<div class="btn-group dropdown">
														<button
															class="btn btn-default btn-active-primary dropdown-toggle"
															data-toggle="dropdown">
															<i class="demo-pli-dot-vertical icon-lg"></i>
														</button>
														<ul class="dropdown-menu dropdown-menu-right" role="menu">
															<li><a href="#">Action</a></li>
															<li><a href="#">Another action</a></li>
															<li><a href="#">Something else here</a></li>
															<li class="divider"></li>
															<li><a href="#">Separated link</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Invoice</th>
													<th>User</th>
													<th>Order date</th>
													<th>Amount</th>
													<th class="text-center">Status</th>
													<th class="text-center">Tracking Number</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="#" class="btn-link"> Order #53431</a></td>
													<td>Steve N. Horton</td>
													<td><span class="text-muted">Oct 22, 2014</span></td>
													<td>$45.00</td>
													<td class="text-center">
														<div class="label label-table label-success">Paid</div>
													</td>
													<td class="text-center">-</td>
												</tr>
												<tr>
													<td><a href="#" class="btn-link"> Order #53432</a></td>
													<td>Charles S Boyle</td>
													<td><span class="text-muted">Oct 24, 2014</span></td>
													<td>$245.30</td>
													<td class="text-center">
														<div class="label label-table label-info">Shipped</div>
													</td>
													<td class="text-center">CGX0089734531</td>
												</tr>
												<tr>
													<td><a href="#" class="btn-link"> Order #53433</a></td>
													<td>Lucy Doe</td>
													<td><span class="text-muted">Oct 24, 2014</span></td>
													<td>$38.00</td>
													<td class="text-center">
														<div class="label label-table label-info">Shipped</div>
													</td>
													<td class="text-center">CGX0089934571</td>
												</tr>
												<tr>
													<td><a href="#" class="btn-link"> Order #53434</a></td>
													<td>Teresa L. Doe</td>
													<td><span class="text-muted">Oct 15, 2014</span></td>
													<td>$77.99</td>
													<td class="text-center">
														<div class="label label-table label-info">Shipped</div>
													</td>
													<td class="text-center">CGX0089734574</td>
												</tr>
												<tr>
													<td><a href="#" class="btn-link"> Order #53435</a></td>
													<td>Teresa L. Doe</td>
													<td><span class="text-muted">Oct 12, 2014</span></td>
													<td>$18.00</td>
													<td class="text-center">
														<div class="label label-table label-success">Paid</div>
													</td>
													<td class="text-center">-</td>
												</tr>
												<tr>
													<td><a href="#" class="btn-link">Order #53437</a></td>
													<td>Charles S Boyle</td>
													<td><span class="text-muted">Oct 17, 2014</span></td>
													<td>$658.00</td>
													<td class="text-center">
														<div class="label label-table label-danger">Refunded</div>
													</td>
													<td class="text-center">-</td>
												</tr>
												<tr>
													<td><a href="#" class="btn-link">Order #536584</a></td>
													<td>Scott S. Calabrese</td>
													<td><span class="text-muted">Oct 19, 2014</span></td>
													<td>$45.58</td>
													<td class="text-center">
														<div class="label label-table label-warning">Unpaid</div>
													</td>
													<td class="text-center">-</td>
												</tr>
											</tbody>
										</table>
									</div>
									<hr class="new-section-xs">
									<div class="pull-right">
										<ul class="pagination text-nowrap mar-no">
											<li class="page-pre disabled">
												<a href="#">&lt;</a>
											</li>
											<li class="page-number active">
												<span>1</span>
											</li>
											<li class="page-number">
												<a href="#">2</a>
											</li>
											<li class="page-number">
												<a href="#">3</a>
											</li>
											<li>
												<span>...</span>
											</li>
											<li class="page-number">
												<a href="#">9</a>
											</li>
											<li class="page-next">
												<a href="#">&gt;</a>
											</li>
										</ul>
									</div>
								</div>
								<!--===================================================-->
								<!--End Data Table-->

							</div>
						</div>
					</div>



				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->



			<!--ASIDE-->
			<!--===================================================-->
			<aside id="aside-container">
				<div id="aside">
					<div class="nano">
						<div class="nano-content">

							<!--Nav tabs-->
							<!--================================-->
							<ul class="nav nav-tabs nav-justified">
								<li class="active">
									<a href="#demo-asd-tab-1" data-toggle="tab">
										<i class="demo-pli-speech-bubble-7 icon-lg"></i>
									</a>
								</li>
								<li>
									<a href="#demo-asd-tab-2" data-toggle="tab">
										<i class="demo-pli-information icon-lg icon-fw"></i> Report
									</a>
								</li>
								<li>
									<a href="#demo-asd-tab-3" data-toggle="tab">
										<i class="demo-pli-wrench icon-lg icon-fw"></i> Settings
									</a>
								</li>
							</ul>
							<!--================================-->
							<!--End nav tabs-->



							<!-- Tabs Content -->
							<!--================================-->
							<div class="tab-content">

								<!--First tab (Contact list)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade in active" id="demo-asd-tab-1">
									<p class="pad-all text-main text-sm text-uppercase text-bold">
										<span class="pull-right badge badge-warning">3</span> Family
									</p>

									<!--Family-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/2.png"
													alt="Profile Picture">
												<i class="badge badge-success badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Stephen Tran</p>
												<small class="text-muteds">Availabe</small>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/7.png"
													alt="Profile Picture">
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Brittany Meyer</p>
												<small class="text-muteds">I think so</small>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/1.png"
													alt="Profile Picture">
												<i class="badge badge-info badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Jack George</p>
												<small class="text-muteds">Last Seen 2 hours ago</small>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/4.png"
													alt="Profile Picture">
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Donald Brown</p>
												<small class="text-muteds">Lorem ipsum dolor sit amet.</small>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/8.png"
													alt="Profile Picture">
												<i class="badge badge-warning badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Betty Murphy</p>
												<small class="text-muteds">Idle</small>
											</div>
										</a>
										<a href="#" class="list-group-item">
											<div class="media-left pos-rel">
												<img class="img-circle img-xs" src="img/profile-photos/9.png"
													alt="Profile Picture">
												<i class="badge badge-danger badge-stat badge-icon pull-left"></i>
											</div>
											<div class="media-body">
												<p class="mar-no text-main">Samantha Reid</p>
												<small class="text-muteds">Offline</small>
											</div>
										</a>
									</div>

									<hr>
									<p class="pad-all text-main text-sm text-uppercase text-bold">
										<span class="pull-right badge badge-success">Offline</span> Friends
									</p>

									<!--Works-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item">
											<span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey
											K. Greyson
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea
											Branden
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-success badge-icon badge-fw pull-left"></span>
											Johny Juan
										</a>
										<a href="#" class="list-group-item">
											<span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan
											Sun
										</a>
									</div>


									<hr>
									<p class="pad-all text-main text-sm text-uppercase text-bold">News</p>

									<div class="pad-hor">
										<p>Lorem ipsum dolor sit amet, consectetuer
											<a data-title="45%" class="add-tooltip text-semibold text-main"
												href="#">adipiscing elit</a>, sed diam nonummy nibh. Lorem ipsum dolor
											sit amet.
										</p>
										<small><em>Last Update : Des 12, 2014</em></small>
									</div>


								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--End first tab (Contact list)-->


								<!--Second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-2">

									<!--Monthly billing-->
									<div class="pad-all">
										<p class="pad-ver text-main text-sm text-uppercase text-bold">Billing &amp;
											reports</p>
										<p>Get <strong class="text-main">$5.00</strong> off your next bill by making
											sure your full payment reaches us before August 5, 2018.</p>
									</div>
									<hr class="new-section-xs">
									<div class="pad-all">
										<span class="pad-ver text-main text-sm text-uppercase text-bold">Amount Due
											On</span>
										<p class="text-sm">August 17, 2018</p>
										<p class="text-2x text-thin text-main">$83.09</p>
										<button class="btn btn-block btn-success mar-top">Pay Now</button>
									</div>


									<hr>

									<p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

									<!--Simple Menu-->
									<div class="list-group bg-trans">
										<a href="#" class="list-group-item"><i
												class="demo-pli-information icon-lg icon-fw"></i> Service
											Information</a>
										<a href="#" class="list-group-item"><i
												class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
										<a href="#" class="list-group-item"><span
												class="label label-info pull-right">New</span><i
												class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
										<a href="#" class="list-group-item"><i
												class="demo-pli-support icon-lg icon-fw"></i> Message Center</a>
									</div>


									<hr>

									<div class="text-center">
										<div><i class="demo-pli-old-telephone icon-3x"></i></div>
										Questions?
										<p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
										<small><em>We are here 24/7</em></small>
									</div>
								</div>
								<!--End second tab (Custom layout)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


								<!--Third tab (Settings)-->
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<div class="tab-pane fade" id="demo-asd-tab-3">
									<ul class="list-group bg-trans">
										<li class="pad-top list-header">
											<p class="text-main text-sm text-uppercase text-bold mar-no">Account
												Settings</p>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-1" type="checkbox" checked>
												<label for="demo-switch-1"></label>
											</div>
											<p class="mar-no text-main">Show my personal status</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer
												adipiscing elit.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-2" type="checkbox" checked>
												<label for="demo-switch-2"></label>
											</div>
											<p class="mar-no text-main">Show offline contact</p>
											<small class="text-muted">Aenean commodo ligula eget dolor. Aenean
												massa.</small>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-3" type="checkbox">
												<label for="demo-switch-3"></label>
											</div>
											<p class="mar-no text-main">Invisible mode </p>
											<small class="text-muted">Cum sociis natoque penatibus et magnis dis
												parturient montes, nascetur ridiculus mus. </small>
										</li>
									</ul>


									<hr>

									<ul class="list-group pad-btm bg-trans">
										<li class="list-header">
											<p class="text-main text-sm text-uppercase text-bold mar-no">Public Settings
											</p>
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-4" type="checkbox" checked>
												<label for="demo-switch-4"></label>
											</div>
											Online status
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-5" type="checkbox" checked>
												<label for="demo-switch-5"></label>
											</div>
											Show offline contact
										</li>
										<li class="list-group-item">
											<div class="pull-right">
												<input class="toggle-switch" id="demo-switch-6" type="checkbox" checked>
												<label for="demo-switch-6"></label>
											</div>
											Show my device icon
										</li>
									</ul>



									<hr>

									<p class="pad-hor text-main text-sm text-uppercase text-bold mar-no">Task Progress
									</p>
									<div class="pad-all">
										<p class="text-main">Upgrade Progress</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-success" style="width: 15%;"><span
													class="sr-only">15%</span></div>
										</div>
										<small>15% Completed</small>
									</div>
									<div class="pad-hor">
										<p class="text-main">Database</p>
										<div class="progress progress-sm">
											<div class="progress-bar progress-bar-danger" style="width: 75%;"><span
													class="sr-only">75%</span></div>
										</div>
										<small>17/23 Database</small>
									</div>

								</div>
								<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
								<!--Third tab (Settings)-->

							</div>
						</div>
					</div>
				</div>
			</aside>
			<!--===================================================-->
			<!--END ASIDE-->


			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">


					<!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
					<!--It will only appear on small screen devices.-->
					<!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">

								<!--Profile Widget-->
								<!--================================-->
								<div id="mainnav-profile" class="mainnav-profile">
									<div class="profile-wrap text-center">
										<div class="pad-btm">
											<img class="img-circle img-md" src="img/profile-photos/1.png"
												alt="Profile Picture">
										</div>
										<a href="#profile-nav" class="box-block" data-toggle="collapse"
											aria-expanded="false">
											<span class="pull-right dropdown-toggle">
												<i class="dropdown-caret"></i>
											</span>
											<p class="mnp-name">Aaron Chavez</p>
											<span class="mnp-desc">aaron.cha@themeon.net</span>
										</a>
									</div>
									<div id="profile-nav" class="collapse list-group bg-trans">
										<a href="#" class="list-group-item">
											<i class="demo-pli-male icon-lg icon-fw"></i> View Profile
										</a>
										<a href="#" class="list-group-item">
											<i class="demo-pli-gear icon-lg icon-fw"></i> Settings
										</a>
										<a href="#" class="list-group-item">
											<i class="demo-pli-information icon-lg icon-fw"></i> Help
										</a>
										<a href="#" class="list-group-item">
											<i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
										</a>
									</div>
								</div>


								<!--Shortcut buttons-->
								<!--================================-->
								<div id="mainnav-shortcut" class="hidden">
									<ul class="list-unstyled shortcut-wrap">
										<li class="col-xs-3" data-content="My Profile">
											<a class="shortcut-grid" href="#">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
													<i class="demo-pli-male"></i>
												</div>
											</a>
										</li>
										<li class="col-xs-3" data-content="Messages">
											<a class="shortcut-grid" href="#">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
													<i class="demo-pli-speech-bubble-3"></i>
												</div>
											</a>
										</li>
										<li class="col-xs-3" data-content="Activity">
											<a class="shortcut-grid" href="#">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-success">
													<i class="demo-pli-thunder"></i>
												</div>
											</a>
										</li>
										<li class="col-xs-3" data-content="Lock Screen">
											<a class="shortcut-grid" href="#">
												<div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
													<i class="demo-pli-lock-2"></i>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<!--================================-->
								<!--End shortcut buttons-->


								<ul id="mainnav-menu" class="list-group">

									<!--Category name-->
									<li class="list-header">Navigation</li>

									<!--Menu list item-->
									<li class="active-sub">
										<a href="#">
											<i class="demo-pli-home"></i>
											<span class="menu-title">Dashboard</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse in">
											<li class="active-link"><a href="index.html">Dashboard 1</a></li>
											<li><a href="dashboard-2.html">Dashboard 2</a></li>
											<li><a href="dashboard-3.html">Dashboard 3</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-split-vertical-2"></i>
											<span class="menu-title">Layouts</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="layouts-collapsed-navigation.html">Collapsed Navigation</a>
											</li>
											<li><a href="layouts-offcanvas-navigation.html">Off-Canvas Navigation</a>
											</li>
											<li><a href="layouts-offcanvas-slide-in-navigation.html">Slide-in
													Navigation</a></li>
											<li><a href="layouts-offcanvas-revealing-navigation.html">Revealing
													Navigation</a></li>
											<li class="list-divider"></li>
											<li><a href="layouts-aside-right-side.html">Aside on the right side</a></li>
											<li><a href="layouts-aside-left-side.html">Aside on the left side</a></li>
											<li><a href="layouts-aside-dark-theme.html">Dark version of aside</a></li>
											<li class="list-divider"></li>
											<li><a href="layouts-fixed-navbar.html">Fixed Navbar</a></li>
											<li><a href="layouts-fixed-footer.html">Fixed Footer</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="widgets.html">
											<i class="demo-pli-gear"></i>
											<span class="menu-title">
												Widgets
												<span class="pull-right badge badge-warning">24</span>
											</span>
										</a>
									</li>

									<li class="list-divider"></li>

									<!--Category name-->
									<li class="list-header">Components</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-boot-2"></i>
											<span class="menu-title">UI Elements</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="ui-buttons.html">Buttons</a></li>
											<li><a href="ui-panels.html">Panels</a></li>
											<li><a href="ui-modals.html">Modals</a></li>
											<li><a href="ui-progress-bars.html">Progress bars</a></li>
											<li><a href="ui-components.html">Components</a></li>
											<li><a href="ui-typography.html">Typography</a></li>
											<li><a href="ui-list-group.html">List Group</a></li>
											<li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
											<li><a href="ui-alerts-tooltips.html">Alerts &amp; Tooltips</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-pen-5"></i>
											<span class="menu-title">Forms</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="forms-general.html">General</a></li>
											<li><a href="forms-components.html">Advanced Components</a></li>
											<li><a href="forms-validation.html">Validation</a></li>
											<li><a href="forms-wizard.html">Wizard</a></li>
											<li><a href="forms-file-upload.html">File Upload</a></li>
											<li><a href="forms-text-editor.html">Text Editor</a></li>
											<li><a href="forms-markdown.html">Markdown</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-receipt-4"></i>
											<span class="menu-title">Tables</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="tables-static.html">Static Tables</a></li>
											<li><a href="tables-bootstrap.html">Bootstrap Tables</a></li>
											<li><a href="tables-datatable.html">Data Tables</a></li>
											<li><a href="tables-footable.html">Foo Tables</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-bar-chart"></i>
											<span class="menu-title">Charts</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="charts-morris-js.html">Morris JS</a></li>
											<li><a href="charts-flot-charts.html">Flot Charts</a></li>
											<li><a href="charts-easy-pie-charts.html">Easy Pie Charts</a></li>
											<li><a href="charts-sparklines.html">Sparklines</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-repair"></i>
											<span class="menu-title">Miscellaneous</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="misc-timeline.html">Timeline</a></li>
											<li><a href="misc-maps.html">Google Maps</a></li>
											<li><a href="xplugins-notifications.html">Notifications<span
														class="label label-purple pull-right">Improved</span></a></li>
											<li><a href="misc-nestable-list.html">Nestable List</a></li>
											<li><a href="misc-animate-css.html">CSS Animations</a></li>
											<li><a href="misc-css-loaders.html">CSS Loaders</a></li>
											<li><a href="misc-spinkit.html">Spinkit</a></li>
											<li><a href="misc-tree-view.html">Tree View</a></li>
											<li><a href="misc-clipboard.html">Clipboard</a></li>
											<li><a href="misc-x-editable.html">X-Editable</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-warning-window"></i>
											<span class="menu-title">Grid System</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="grid-bootstrap.html">Bootstrap Grid</a></li>
											<li><a href="grid-liquid-fixed.html">Liquid Fixed</a></li>
											<li><a href="grid-match-height.html">Match Height</a></li>
											<li><a href="grid-masonry.html">Masonry</a></li>

										</ul>
									</li>

									<li class="list-divider"></li>

									<!--Category name-->
									<li class="list-header">More</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-computer-secure"></i>
											<span class="menu-title">App Views</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="app-file-manager.html">File Manager</a></li>
											<li><a href="app-users.html">Users</a></li>
											<li><a href="app-users-2.html">Users 2</a></li>
											<li><a href="app-profile.html">Profile</a></li>
											<li><a href="app-calendar.html">Calendar</a></li>
											<li><a href="app-taskboard.html">Taskboard</a></li>
											<li><a href="app-chat.html">Chat</a></li>
											<li><a href="app-contact-us.html">Contact Us</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-speech-bubble-5"></i>
											<span class="menu-title">Blog Apps</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="blog.html">Blog</a></li>
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog-list-2.html">Blog List 2</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
											<li class="list-divider"></li>
											<li><a href="blog-manage-posts.html">Manage Posts</a></li>
											<li><a href="blog-add-edit-post.html">Add Edit Post</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-mail"></i>
											<span class="menu-title">Email</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="mailbox.html">Inbox</a></li>
											<li><a href="mailbox-message.html">View Message</a></li>
											<li><a href="mailbox-compose.html">Compose Message</a></li>
											<li><a href="mailbox-templates.html">Email Templates</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-file-html"></i>
											<span class="menu-title">Other Pages</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="pages-blank.html">Blank Page</a></li>
											<li><a href="pages-invoice.html">Invoice</a></li>
											<li><a href="pages-search-results.html">Search Results</a></li>
											<li><a href="pages-faq.html">FAQ</a></li>
											<li><a href="pages-pricing.html">Pricing<span
														class="label label-success pull-right">New</span></a></li>
											<li class="list-divider"></li>
											<li><a href="pages-404-alt.html">Error 404 alt</a></li>
											<li><a href="pages-500-alt.html">Error 500 alt</a></li>
											<li class="list-divider"></li>
											<li><a href="pages-404.html">Error 404 </a></li>
											<li><a href="pages-500.html">Error 500</a></li>
											<li><a href="pages-maintenance.html">Maintenance</a></li>
											<li><a href="pages-login.html">Login</a></li>
											<li><a href="pages-register.html">Register</a></li>
											<li><a href="pages-password-reminder.html">Password Reminder</a></li>
											<li><a href="pages-lock-screen.html">Lock Screen</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-photo-2"></i>
											<span class="menu-title">Gallery</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="gallery-columns.html">Columns</a></li>
											<li><a href="gallery-justified.html">Justified</a></li>
											<li><a href="gallery-nested.html">Nested</a></li>
											<li><a href="gallery-grid.html">Grid</a></li>
											<li><a href="gallery-carousel.html">Carousel</a></li>
											<li class="list-divider"></li>
											<li><a href="gallery-slider.html">Slider</a></li>
											<li><a href="gallery-default-theme.html">Default Theme</a></li>
											<li><a href="gallery-compact-theme.html">Compact Theme</a></li>
											<li><a href="gallery-grid-theme.html">Grid Theme</a></li>

										</ul>
									</li>


									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-tactic"></i>
											<span class="menu-title">Menu Level</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="#">Second Level Item</a></li>
											<li><a href="#">Second Level Item</a></li>
											<li><a href="#">Second Level Item</a></li>
											<li class="list-divider"></li>
											<li>
												<a href="#">Third Level<i class="arrow"></i></a>

												<!--Submenu-->
												<ul class="collapse">
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
												</ul>
											</li>
											<li>
												<a href="#">Third Level<i class="arrow"></i></a>

												<!--Submenu-->
												<ul class="collapse">
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
													<li class="list-divider"></li>
													<li><a href="#">Third Level Item</a></li>
													<li><a href="#">Third Level Item</a></li>
												</ul>
											</li>
										</ul>
									</li>


									<li class="list-divider"></li>

									<!--Category name-->
									<li class="list-header">Extras</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-happy"></i>
											<span class="menu-title">Icons Pack</span>
											<i class="arrow"></i>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="icons-ionicons.html">Ion Icons</a></li>
											<li><a href="icons-themify.html">Themify</a></li>
											<li><a href="icons-font-awesome.html">Font Awesome</a></li>
											<li><a href="icons-flagicons.html">Flag Icon CSS</a></li>
											<li><a href="icons-weather-icons.html">Weather Icons</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="demo-pli-medal-2"></i>
											<span class="menu-title">
												PREMIUM ICONS
												<span class="label label-danger pull-right">BEST</span>
											</span>
										</a>

										<!--Submenu-->
										<ul class="collapse">
											<li><a href="premium-line-icons.html">Line Icons Pack</a></li>
											<li><a href="premium-solid-icons.html">Solid Icons Pack</a></li>

										</ul>
									</li>

									<!--Menu list item-->
									<li>
										<a href="helper-classes.html">
											<i class="demo-pli-inbox-full"></i>
											<span class="menu-title">Helper Classes</span>
										</a>
									</li>
								</ul>


								<!--Widget-->
								<!--================================-->
								<div class="mainnav-widget">

									<!-- Show the button on collapsed navigation -->
									<div class="show-small">
										<a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
											<i class="demo-pli-monitor-2"></i>
										</a>
									</div>

									<!-- Hide the content on collapsed navigation -->
									<div id="demo-wg-server" class="hide-small mainnav-widget-content">
										<ul class="list-group">
											<li class="list-header pad-no mar-ver">Server Status</li>
											<li class="mar-btm">
												<span class="label label-primary pull-right">15%</span>
												<p>CPU Usage</p>
												<div class="progress progress-sm">
													<div class="progress-bar progress-bar-primary" style="width: 15%;">
														<span class="sr-only">15%</span>
													</div>
												</div>
											</li>
											<li class="mar-btm">
												<span class="label label-purple pull-right">75%</span>
												<p>Bandwidth</p>
												<div class="progress progress-sm">
													<div class="progress-bar progress-bar-purple" style="width: 75%;">
														<span class="sr-only">75%</span>
													</div>
												</div>
											</li>
											<li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View
													Details</a></li>
										</ul>
									</div>
								</div>
								<!--================================-->
								<!--End widget-->

							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->

		</div>

		<!-- FOOTER -->
		<!--===================================================-->
		@include('partials._footer')
		<!--===================================================-->
		<!-- END FOOTER -->

		<!-- SCROLL PAGE BUTTON -->
		<!--===================================================-->
		<button class="scroll-top btn">
			<i class="pci-chevron chevron-up"></i>
		</button>
		<!--===================================================-->
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->

	<!--JAVASCRIPT-->
	<!--=================================================-->

	@include('partials._script')

</body>

</html>