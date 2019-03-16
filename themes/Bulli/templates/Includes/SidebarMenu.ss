<%--Include SidebarMenu recursively --%>
<% if $Children %>
	<% loop $Children %>
		<li class="list-group-item <% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %>">
			<a href="$Link" class="list-group-item-action d-block <% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %>" title="Go to the $Title.XML page">
				$MenuTitle
			</a>
			<% if $Children %>
				<% if LinkOrSection != link %>
					<ul class="list-group">
						<% include SidebarMenu %>
					</ul>
				<% end_if %>
			<% end_if %>
		</li>
	<% end_loop %>
<% end_if %>
