<%--Include SidebarMenu recursively --%>
<% if $Children %>
	<% loop $Children %>
		<li class="<% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %>">
			<a href="$Link" class="<% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %>" title="Go to the $Title.XML page">
				<span class="text">$MenuTitle.XML</span>
			</a>
			<% if $Children %>
				<% if LinkOrSection != link %> 
					<ul>
						<% include SidebarMenu %>
					</ul>
				<% end_if %>
			<% end_if %>
		</li>
	<% end_loop %>
<% end_if %>
