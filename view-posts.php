<?php
/**
 * Template Name: View Posts
 */
?>
<html>
    <head>
        <title>
            Post CRUD on front
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>
            View All Posts
        </h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>
                        Post Title
                    </td>
                    <td>
                        Post Excerpt
                    </td>
                    <td>
                        Post Status
                    </td>
                    <td>
                        Actions
                    </td>
                </tr>
                </thead>
                <tbody>
                <?php
                $loop = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => '-1',
                    'post_status' => array(
                        'publish',
                        'pending',
                        'draft',
                        'private',
                        'trash',
                    )
                ]);
                ?>
                    <?php if($loop->have_posts()) : ?>
                        <?php while($loop->have_posts()) : $loop->the_post(); ?>
                            <tr>
                                <td>
                                    <?php echo get_the_title(); ?>
                                </td>
                                <td>
                                    <?php echo get_the_excerpt(); ?>
                                </td>
                                <td>
                                    <?php echo get_post_status( get_the_ID() ); ?>
                                </td>
                                <td>
                                    <a href="">
                                        Edit
                                    </a>
                                    <a href="">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php wp_reset_query(); ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

