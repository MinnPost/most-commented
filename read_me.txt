Instructions:
Place the function call in wherever you want the recent comments to appear.
<?php mdv_most_commented(); ?>

Configuration:
You may pass parameters when calling the function to configure some of the options.
Example: mdv_most_commented(10, '', '<br />', true, 30)

The parameters:
$no_posts - sets the number of posts to display
$before - text to be displayed before the link to the post
$after - text to be displayed after the link to the post
$show_pass_post - whether or not to display password protected posts
$duration - displays comments for recent number of days