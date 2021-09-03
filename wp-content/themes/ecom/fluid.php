<?php 
get_header();

/*
 Template Name: Custom-template
*/
?>


<?php while(have_posts()) : the_post();?>
    <div class="body-content">
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="blog-page">
                    <div class="col-md-12">
                        <?php get_template_part("template-parts/content/content","content");?>
                    </div>
                   
                
                </div>
            </div>
        </div>
    </div>
<?php endwhile;?>
 <?php get_footer();?>