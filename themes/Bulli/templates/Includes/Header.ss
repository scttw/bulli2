			<header class="banner align-items-center" role="banner">
				<nav id="mainnav" class="mainnav navbar navbar-expand-lg mt-0 pt-2 navbar-light justify-content-between">
                    <a href="$BaseURL" class="navbar-brand"><img src="{$ThemeDir}/imgs/logo.png" width="200" height="101"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div id="navbar-collapse" class="collapse navbar-collapse background-white ml-lg-auto p-4 p-lg-0 pt-lg-4 mr-lg-2">
                        <ul class="navbar-nav ml-auto">
                            <% loop Menu(1) %>
                            <li class="nav-item <% if $Children %> dropdown<% end_if %> ">
                                <a class="nav-link  <% if $Children %>dropdown-toggle<% end_if %>" <% if $Children %>data-toggle="dropdown"<% end_if %> href="$Link">
                                    $MenuTitle<% if $Children %> <span class="caret"></span><% end_if %>
                                </a>
                                <% if $Children %>
                                <% if $ClassName != 'HomePage' %>
                                <ul class="dropdown-menu">
                                    <% include TopbarMenu %>
                                </ul>
                                <% end_if %>
                                <% end_if %>
                            </li>
                            <% end_loop %>
                            <li class="nav-item">
                                <form id="SearchForm_SearchForm" action="{$BaseHref}searchresults/SearchForm" method="get" enctype="application/x-www-form-urlencoded" class="form-inline">
                                    <input type="text" class="text-field search-query form-control form-control-sm ml-lg-3" name="Search" id="SearchForm_SearchForm_Search" placeholder="site search..." value="" />
                                    <button class="btn btn-outline-primary btn-sm">Go</button>
                                </form>
                            </li>
                        </ul>
                    </div>
				</nav>
			</header>
			<div class="strap">
				<% if $HasBanner %>
				<div class="strapfiller">
                    <% if $BannerImage %>
                        <div class="bg-image">
                            <style>
                                .bg-image {
                                    background-image: url('{$BannerImage.CroppedFocusedImage(480,220).URL}');
                                }

                                @media (min-width: 480px) {
                                    .bg-image {
                                        background-image: url('{$BannerImage.CroppedFocusedImage(768,220).URL}');
                                    }
                                }

                                @media (min-width: 768px) {
                                    .bg-image {
                                        background-image: url('{$BannerImage.CroppedFocusedImage(992,220).URL}');
                                    }
                                }

                                @media (min-width: 992px) {
                                    .bg-image {
                                        background-image: url('{$BannerImage.CroppedFocusedImage(1200,220).URL}');
                                    }
                                }

                            </style>
                            <%--<picture>--%>
                                <%--<!--[if IE 9]><video style="display: none;"><![endif]-->--%>
                                <%--<% with $BannerImage.CroppedFocusedImage(1100,220) %><source srcset="$URL" media="(min-width: 1200px)" alt="$Up.Title" width="$width" height="$height" class="img-responsive center-block" ><% end_with %>--%>
                                <%--<% with $BannerImage.CroppedFocusedImage(1100,220) %><source srcset="$URL" media="(min-width: 992px)" alt="$Up.Title" width="$width" height="$height" class="img-responsive center-block" ><% end_with %>--%>
                                <%--<% with $BannerImage.CroppedFocusedImage(992,220) %><source srcset="$URL" media="(min-width: 768px)" alt="$Up.Title" width="$width" height="$height" class="img-responsive center-block" ><% end_with %>--%>
                                <%--<% with $BannerImage.CroppedFocusedImage(768,220) %><source srcset="$URL" media="(min-width: 480px)" alt="$Up.Title" width="$width" height="$height" class="img-responsive center-block" ><% end_with %>--%>
                                <%--<% with $BannerImage.CroppedFocusedImage(480,250) %><source srcset="$URL" media="(min-width: 320px)" alt="$Up.Title" width="$width" height="$height" class="img-responsive center-block" ><% end_with %>--%>
                                <%--<% with $BannerImage.CroppedFocusedImage(320,250) %><source srcset="$URL" media="(min-width: 100px)" alt="$Up.Title" width="$width" height="$height" class="img-responsive center-block" ><% end_with %>--%>
                                <%--<!--[if IE 9]></video><![endif]-->--%>
                                <%--<img src="<% with $BannerImage.CroppedFocusedImage(1200,220) %>$URL<% end_with %>" class="img-responsive center-block" alt="$Title">--%>
                            <%--</picture>--%>
                        </div>

                    <% else %>
                    <div class="content-banner">$BannerContent</div>
                    <% end_if %>

                </div>
				<% end_if %>
			</div>
			<div class="row spacer"></div>
