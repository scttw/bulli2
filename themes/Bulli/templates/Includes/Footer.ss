            <footer class="footer row">
                <div class="col-md-3 col-xs-12">
                <h3>Bulli Anglican</h3>
                <p>66 Park Rd, Bulli NSW 2516</p>
                </div>
                <div class="col-md-3 col-xs-12">
                <p>Ph: (02) 4284 3021</p>
                <p>Fx: (02) 4285 0282</p>
                </div>
                <div class="col-md-3 col-xs-12">
                <p><a href="mailto:bullianglican@bigpond.com">bullianglican@bigpond.com</a></p>
                <p>Church Office hours: 9:30am – 2:30pm Mon – Fri during school terms</p>
                </div>
                <div class="col-md-3 col-xs-12">
                <h3>Church members:</h3>
                <% if CurrentMember %>
                <div class="btn-group btn-group-justified"><a href="{$BaseHref}Security/logout" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-user"></span> Log out</a><a href="{$BaseHref}about-us/church-member-login/" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-cog"></span> My details</a></div>
                <% else %>
                <a href="{$BaseHref}Security/login" class="btn btn-block btn-sm btn-primary"><span class="glyphicon glyphicon-user"></span> Log in</a>
                <% end_if %>

                </div>

                <div class="breaker"></div>

            </footer>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-28953557-1', 'bullianglican.org.au');
              ga('require', 'displayfeatures');
              ga('send', 'pageview');

            </script>