    <div class="row-fluid">
        <div class="span8 lefstedge">

<h2>$Title</h2>
<p class="feed"><a href="$Link(rss)"><% _t('SUBSCRIBE','Calendar RSS Feed') %></a></p>
$Content
<h2>$DateHeader</h2>
<% if Events %>
<div id="event-calendar-events">
  <% include EventList %>
</div>
<% else %>
  <p><% _t('NOEVENTS','There are no events') %>.</p>
<% end_if %>

	</div>
    <div class="span3 pull-right rightnav" >
    	
		$CalendarWidget
		$MonthJumper
		<% include QuickNav %>

    </div>
    <div class="breaker"></div>