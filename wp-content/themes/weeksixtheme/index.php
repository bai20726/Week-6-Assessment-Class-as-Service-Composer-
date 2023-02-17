<?php get_header(); ?>

<?php if (is_post_type_archive('employees')): ?>
    <main class="archive-employees">
        <header>
            <h1>
                <?php post_type_archive_title(); ?>
            </h1>
        </header>

        <?php
        // Get all departments for the current post type
        $departments = get_terms(array('taxonomy' => 'department', 'hide_empty' => true, ));
        if ($departments):
            ?>
            <ul class="department-list">
                <li><a href="<?php echo get_post_type_archive_link('employees'); ?>">All</a></li>
                <?php foreach ($departments as $department): ?>
                    <li><a href="<?php echo get_term_link($department); ?>"><?php echo $department->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (have_posts()): ?>
            <ul class="employee-list">
                <?php while (have_posts()):
                    the_post(); ?>
                    <li>
                        <article class="employee">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </article>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No employees found.</p>
        <?php endif; ?>
    </main>
<?php endif; ?>

<?php if (is_singular('employees')): ?>
    <main class="single-employee">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <article>
                    <h1><?php the_title(); ?></h1>
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No employee found.</p>
        <?php endif; ?>
    </main>
<?php endif; ?>

<?php get_footer(); ?>
