<div>
	<% if $Menu(2) %>
		<nav class="secondary">
			<ul id="subNav" class="list-group">
				<% with $Level(1) %>
					<% include SidebarMenu %>
				<% end_with %>
			</ul>
		</nav>
	<% end_if %>
</div>
