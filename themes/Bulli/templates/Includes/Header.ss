			<header class="banner" role="banner">
				<div class="logo"><h1><a href="$BaseHref">Buli Anglican Church</a></h1></div>
				<nav id="mainnav" class="mainnav navbar-default">
					<div class="navbar-header" data-toggle="collapse" data-target=".navbar-collapse">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button> 
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<% loop Menu(1) %>
								<li class="<% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %><% if $First %>first<% end_if %><% if $Children %> dropdown<% end_if %>">
									<a class="<% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %><% if $Children %> dropdown-toggle" data-toggle="dropdown<% end_if %>" href="$Link">$MenuTitle<% if $Children %> <span class="caret"></span><% end_if %> </a>
									<% if $Children %>
									<% if ClassName != HomePage %>
									<ul class="dropdown-menu">
										<% include TopbarMenu %>
									</ul>
									<% end_if %>
									<% end_if %>
								</li>
								<% end_loop %>
							</ul>
						</div>
					</div>
				</nav>
				<div class="search col-xs-6 col-sm-3">
					<form id="SearchForm_SearchForm" action="{$BaseHref}searchresults/SearchForm" method="get" enctype="application/x-www-form-urlencoded" class="searchfield form-search ">
						<fieldset>
							<div class="input-group">
							<input type="text" class="text-field search-query form-control" name="Search" id="SearchForm_SearchForm_Search" placeholder="site search..." value="" />
							<span class="input-group-btn">
								<button type="submit" name="action_results" id="SearchForm_SearchForm_action_results" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>
						</fieldset>
					</form>

				</div>
			</header>
			<div class="strap row">
				<% if $HasBanner %>
				<div class="strapfiller"><div>$BannerContent</div></div>
				<% end_if %>
			</div>
			<div class="row spacer"></div>
