<?php
/**
Template Name: Rest
 */

get_header(); ?>
    <style>
        .section{
            width: 900px;
            margin: 0 auto;

        }
        .card{
            width: 30%;
            float: left;
            padding: 15px;
            overflow: hidden;
            min-height: 100px;

        }
        .card:nth-child(3n+1){
            clear: left;
        }
        .card h3{
            font-size: 18px!important;
        }
        .more{
            display: inline-block;
            padding:20px;
            font-size: 24px;
            margin: 40px;
            float: left;
            clear: both;
            border:2px solid black;
        }
        .more:hover{
            background-color: #000;
            color: #fff;
        }
    </style>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">




            <div class="section">

            </div>
            <span class="more">More</span>
        </main>
        </main><!-- #main -->
    </div><!-- #primary -->
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var i = 1;
            function loadPosts() {
                // var url = 'http://hbc.snapdev.biz/wp-json/wp/v2/posts?per_page=3&page=' + i;
                var url = 'http://sandboxdev.boundless.show/wp-json/wp/v2/student?order=asc&orderby=title&per_page=3&page=' + i;
                // Call the /posts endpoint via the WordPress API
                console.log(i + '  ' + url);
                $.get(url, function (students) {
                    // Loop through all the posts returned and console.log() each of
                    // their HTML content
                    $.each(students, function (index, student) {
                        var postTitle = student.title['rendered'];
                        var major = student.major;
                        var bio = student.acf['bio_text'];

                        // var postContent = student.excerpt['rendered'];
                        $(".section").append('<div class="card ' + major + '"><h3>' + postTitle + '</h3></div>');
                        // <p>' + postContent + '</p>
                    });
                });
            };
            loadPosts();
            $('.more').click(function(){
                i++;
                loadPosts();
                $('.more').css({'transform' : 'translate(0, -10px)'});
                $('.more').css({'transform' : 'translate(0, 0px)'});
            });
        });
    </script>
<?php
get_footer();