<div class="container">
    <div class="row pb-4">
        <div class="col-12 col-md-8 col-lg-9">
            <div class="podcast">
                <div class="episode">
                    <h3><a href="<% if Audio %>$Audio.AbsoluteURL<% else %>$ExternalLink<% end_if %>">$EpisodeTitle
                        - $Artist</a></h3>
                    <p>$Summary</p>
                    <p>
                        <audio controls class="w-100">
                            <source src="<% if Audio %>$Audio.AbsoluteURL<% else %>$ExternalLink<% end_if %>"
                                    type="audio/mp3">
                            <a class="podcast"
                               href="<% if Audio %>$Audio.AbsoluteURL<% else %>$ExternalLink<% end_if %>"></a>
                        </audio>
                    </p>
                    <p class="muted"><i class="glyphicon glyphicon-headphones icon-white"></i> $Date.Long
                        - <% if Audio %>$Audio.getSize $Audio.getFileType<% else %> MP3 Audio<% end_if %></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 ">
            <% include SideBar %>
        </div>
    </div>
</div>