            <div class="row">
                <div class="col-md-8 lefstedge">
          <article>

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

          </article>
            $Form
            $PageComments
                </div>
                <div class="col-md-3 col-xs-12 pull-right rightnav">
		$CalendarWidget
		$MonthJumper
		<% include QuickNav %>
                </div>
                <div class="breaker"></div>
            </div>
