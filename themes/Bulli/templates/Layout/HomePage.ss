<div class="container">
    <div class="row masonry">

        <% loop HomepageFeatures %>
            <% if Online %>
                <% if Enabled  %>
                    <div class="col-12 <% if $FullWidth %><% else %>col-xl-6<% end_if %> masonry-block">
                        <div class="feature p-3">
                            <% if $HasTitle %><h3>$Title</h3><% end_if %>
                            <div class="content">
                                $Feature
                            </div>
                        </div>
                    </div>
                <% end_if %>
            <% end_if %>
        <% end_loop %>

        <% if $PodcastFeature != 'none' %>
        <div class="col-12 <% if $PodcastFeature == 'half' %>col-xl-6<% end_if %> <% if $PodcastFeature == 'centered' %>text-center<% end_if %> masonry-block">
            <div class="feature p-3">
                <% include TopPodcast %>
            </div>
        </div>
        <% end_if %>

        <div class="breaker"></div>
    </div>
</div>




