</div><!-- #main -->

<?php if (is_single() && !is_singular('project') || is_page('5631')) { ?>
    
    <nav class="order">
          
        <div class="blognav">
            <a class="prev1 arrow"></a>
            <a class="next1 arrow"></a>
        </div>

        <a class="archive" href="<?php echo home_url(); ?>/?page_id=3345">archive view</a>
          
    </nav>

<?php } ?>
    
<footer class="clearfix">
    <p class="aligncenter">Daniel at DuGoff dot com</p>
    <p class="alignleft">&copy; Daniel DuGoff <?php echo date('Y'); ?></p>
    <p class="alignright">Design + Code by <a href="http://parsleyandsprouts.com" target="_blank">Parsley &amp; Sprouts</a></p>
</footer>
    
</div><!-- #page -->

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="<?php echo bloginfo('template_url'); ?>/js/plugins.js"></script>
	<script src="<?php echo bloginfo('template_url'); ?>/js/script.js"></script>

<?php if (!is_user_logged_in()) { ?>
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31945672-1']);
  _gaq.push(['_setDomainName', 'dugoff.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php } ?>

<?php wp_footer(); ?>
</body>

</html>