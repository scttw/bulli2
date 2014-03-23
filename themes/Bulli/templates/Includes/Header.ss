            <header class="banner" role="banner">
                <div class="logo"><h1><a href="$BaseHref">Buli Anglican Church</a></h1></div>
                <nav id="mainnav" class="mainnav navbar">
                	<div class="navbar-surround" data-toggle="collapse" data-target=".nav-collapse">
				  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				   <span class="icon-bar"></span>
				   <span class="icon-bar"></span>
				   <span class="icon-bar"></span>
				  </a>
  		        <div class="nav-collapse">
		        <ul class="nav">
		           <% loop Menu(1) %>
		              <li class="$LinkingMode <% if $First %>first<% end_if %><% if $Children %> dropdown<% end_if %>"><a class="$LinkingMode<% if $Children %> dropdown-toggle" data-toggle="dropdown<% end_if %>" href="$Link">$MenuTitle<% if $Children %> <span class="caret"></span><% end_if %> </a>
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
                </div></div></nav>
                <div class="search">
                    
                    <form id="SearchForm_SearchForm" action="/bulli/home/SearchForm" method="get" enctype="application/x-www-form-urlencoded" class="searchfield form-search ">
						<fieldset class="input-append">
							<input type="text" class="text-field search-query input-small" name="Search" id="SearchForm_SearchForm_Search" placeholder="site search..." value="" />
							<button type="submit" name="action_results" id="SearchForm_SearchForm_action_results" class="btn button"><span class="icon-search"></span></button>
						</fieldset>
					</form>
                   
                </div>
            </header>
            <div class="strap row-fluid">
                <% if $HasBanner %>
                    <div class="strapfiller"><div>$BannerContent</div></div>
                <% end_if %>
            </div>
            <div class="row-fluid spacer"></div>
