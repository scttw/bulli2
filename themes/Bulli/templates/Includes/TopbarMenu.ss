<%--Include SidebarMenu recursively --%>
<!-- topbar recursion-->
<% if $Children %>
	<% loop $Children %>
		<% if ClassName != HomePage %>
		<li class="<% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %>">
			<a href="$Link" class="<% if $LinkingMode = current %> active<% end_if %><% if $LinkingMode = section %> active<% end_if %>" title="Go to the $Title.XML page">
				<span class="text">$MenuTitle.XML</span>
			</a>
		</li>
		<% end_if %>
	<% end_loop %>
<% end_if %>
