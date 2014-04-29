
            <div class="row">
                <div class="col-md-8 lefstedge">
					<article>
						<h1>$Title</h1>
						$Content

						<% if $CanAddMembers %>
							<h2><%t MemberProfiles.ADDMEMBER 'Add Member' %></h2>
							<p><%t MemberProfiles.ADDMEMBERLINK 'You can use this page to <a href="{addLink}">add a new member</a>.' addLink=$Link(add) %></p>

							<h2><%t MemberProfiles.YOURPROFILE 'Your Profile' %></h2>
							$Form
						<% else %>
							$Form
						<% end_if %>
						<% include Gallery %>
					</article>
						$PageComments
                </div>
                <div class="col-md-3 col-xs-12 pull-right rightnav">
                	<% include SideBar %>
                </div>
                <div class="breaker"></div>
            </div>


