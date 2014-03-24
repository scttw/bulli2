    <div class="row-fluid">
        <div class="span8 lefstedge">
<div class="podcast">
<h2>$PodcastTitle</h2>
$Description
<p><a href="$iTunesLink">Open in iTunes</a></p>

<% loop PodcastList %>
	<div class="episode">
		<h3><a href="$Link">$EpisodeTitle - $Artist</a></h3>
		<p>$Summary</p>
		<p>
			<a class="podcast" href="<% if Audio %>$Audio.AbsoluteURL<% else %>$ExternalLink<% end_if %>">Download the podcast file for $EpisodeTitle</a>
		</p>
		<p class="muted"><i class="icon-headphones icon-white"></i> $Date.Long - <% if Audio %>$Audio.getSize $Audio.getFileType<% else %> MP3 Audio<% end_if %></p>
	</div>
<% end_loop %>
</div>
	</div>
    <div class="span3 pull-right  rightnav">
    	<% include SideBar %>
    </div>
    <div class="breaker"></div>
