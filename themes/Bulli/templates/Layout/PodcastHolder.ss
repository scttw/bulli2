<div class="container">
    <div class="row pb-4">
        <div class="col-12 col-md-8 col-lg-9">
            <div class="podcast">
                <h2>$PodcastTitle</h2>
                $Description
                <p><a href="$FeedLink">Get the podcast feed (rss)</a>. <a href="$iTunesLink">Open in iTunes</a></p>

                <% loop PodcastList %>
                    <div class="episode">
                        <h3><a href="$Link">$EpisodeTitle - $Artist</a></h3>
                        <p>$Summary</p>
                        <p>
                            <a class="podcast"
                               href="<% if Audio %>$Audio.AbsoluteURL<% else %>$ExternalLink<% end_if %>">Download the
                                podcast file for $EpisodeTitle</a>
                        </p>
                        <p class="muted"><i class="glyphicon glyphicon-headphones icon-white"></i> $Date.Long
                            - <% if Audio %>$Audio.getSize $Audio.getFileType<% else %> MP3 Audio<% end_if %></p>
                    </div><!-- episode -->


                <% end_loop %>

                <% if PodcastList.MoreThanOnePage %>
                    <div id="PageNumbers">
                        <ul class="pagination">
                            <% if PodcastList.NotFirstPage %>
                                <li><a class="prev" href="$PodcastList.PrevLink" title="View the previous page">Prev</a>
                                </li>
                            <% end_if %>

                            <% loop PodcastList.PaginationSummary(4) %>
                                <li<% if CurrentBool %> class="active" <% end_if %>>
                                    <% if Link %>
                                        <a href="$Link" title="View page number $PageNum">$PageNum</a>
                                    <% else %>
                                        &hellip;
                                    <% end_if %>
                                </li>
                            <% end_loop %>

                            <% if PodcastList.NotLastPage %>
                                <li><a class="next" href="$PodcastList.NextLink" title="View the next page">Next</a>
                                </li>
                            <% end_if %>
                        </ul>
                    </div><!-- #pagenumbers -->
                <% end_if %>

            </div><!-- podcast -->
        </div><!-- col-md-8 lefstedge -->
        <div class="col-12 col-md-4 col-lg-3 ">
            <% include SideBar %>
        </div>
    </div><!-- row -->
</div>