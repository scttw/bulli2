<% require themedCSS('blog', 'blog') %>
<div class="container">
    <div class="row">
        <div class="blog-entry col-12 col-md-8 col-lg-9">
            <article>
                <h1>$Title</h1>

                <% if $FeaturedImage %>
                    <p class="post-image">$FeaturedImage.setWidth(795)</p>
                <% end_if %>

                <div class="content">$Content</div>

                <% include EntryMeta %>
            </article>

            $Form
            $CommentsForm
        </div>
        <div class="col-12 col-md-4 col-lg-3 ">
            <% include SideBar %>
        </div>
    </div>
</div>
<% include BlogSideBar %>
