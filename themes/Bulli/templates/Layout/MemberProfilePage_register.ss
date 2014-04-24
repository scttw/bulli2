

            <div class="row">
                <div class="col-md-8 lefstedge">
					<article>
					<h1>$Title</h1>
						$Content

						<h2><%t MemberProfiles.LOGINHEADER "Log in" %></h2>
						<p><%t MemberProfiles.LOGIN "If you already have an account, you can <a href='{loginLink}'>log in here</a>." loginLink=$LoginLink %></p>

						<h2><%t MemberProfiles.REGISTER "Register" %></h2>
						$Form
						<% include Gallery %>
					</article>
						$PageComments
                </div>
                <div class="col-md-3 col-xs-12 pull-right rightnav">
                	<% include SideBar %>
                </div>
                <div class="breaker"></div>
            </div>

