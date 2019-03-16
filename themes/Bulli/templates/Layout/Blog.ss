
    <div class="row">
        <div id="BlogContent" class="blogcontent typography col-md-8 lefstedge">

	</div>
    <div class="col-md-3 pull-right rightnav" >
    	<% include BlogSideBar %>
    </div>
    <div class="breaker"></div>


        <div class="container">
            <div class="row pb-4">
                <div class="col-12 col-md-8 col-lg-9">
                    <h2>
                        <% if $ArchiveYear %>
                            <%t Blog.Archive 'Archive' %>:
                            <% if $ArchiveDay %>
                                $ArchiveDate.Nice
                            <% else_if $ArchiveMonth %>
                                $ArchiveDate.format('F, Y')
                            <% else %>
                                $ArchiveDate.format('Y')
                            <% end_if %>
                        <% else_if $CurrentTag %>
                            <%t Blog.Tag 'Tag' %>: $CurrentTag.Title
                        <% else_if $CurrentCategory %>
                            <%t Blog.Category 'Category' %>: $CurrentCategory.Title
                        <% else %>
                            $Title
                        <% end_if %>
                    </h2>

                    <div class="content">$Content</div>

                    <% if $PaginatedList.Exists %>
                        <% loop $PaginatedList %>
                            <% include PostSummary %>
                        <% end_loop %>
                    <% else %>
                        <p><%t Blog.NoPosts 'There are no posts' %></p>
                    <% end_if %>

                </div>
                <div class="col-12 col-md-4 col-lg-3 ">
                    <% include SideBar %>
                </div>
                <div class="breaker"></div>
            </div>

        </div>