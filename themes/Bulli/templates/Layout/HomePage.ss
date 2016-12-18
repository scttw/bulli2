
            <div class="row masonry">
					<% loop HomepageFeatures %>
                    <% if Online %>
                    <% if Enabled  %>
                    <div class="<% if $FullWidth %>col-md-12<% else %>col-md-6<% end_if %> masonry-block">
                    <div class="feature">
                        <% if $HasTitle %><h2>$Title</h2><% end_if %>
                        <div class="content">
                            $Feature
                        </div>
                    </div>
                    </div>
                    <% end_if %>
                    <% end_if %>
                    <% end_loop %>

                    <div class="col-md-6 masonry-block">
                    <div class="feature">
                        <% include TopPodcast %>
                    </div>
                    </div>


                <div class="breaker"></div>
            </div>





