<% if $isReadonly %>
	<span id="$ID"<% if $extraClass %> class="$extraClass"<% end_if %>>
		$Value
	</span>
<% else %>
	<input class="form-control" $AttributesHTML />
<% end_if %>
