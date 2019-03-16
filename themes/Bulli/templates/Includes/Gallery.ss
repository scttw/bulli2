				<% if $HasGallery %>
				<div id="gallery" class="flexslider">
					<% if $Carousel %>
					<ul style="margin: 0;padding: 0" class="slides carouselContainer">
					<% loop GalleryImages %>
						<li class="galleryThumbContainer carousel">
						  <a rel="gallery" <% with $Image.SetRatioSize(1200, 1200) %>href="$URL"<% end_with %>><img <% with $Image.PaddedImage(600,600) %>src="$URL" width="$width" height="$height" <% end_with %>alt="$Title" class="galleryThumb" /></a>
						</li>
					<% end_loop %>
					</ul>
					<% else %>
					<% loop GalleryImages %>
						<div class="galleryThumbContainer thumbs">
						  <a rel="gallery" <% with $Image.SetRatioSize(1200, 1200) %>href="$URL"<% end_with %> data-lightbox="gallery"><img <% with $Image.SetRatioSize(150,150) %> data-portrait="<% if $Image.Portrait() %>portrait<% end_if %>" src="$URL" width="$width" height="$height" <% end_with %>alt="$Title"  class="galleryThumb" /></a>
						</div>
					<% end_loop %>
					<% end_if %>
				</div>
				<% end_if %>
