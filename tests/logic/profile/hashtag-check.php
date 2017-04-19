<?php

$posts = array(
    "haha",
    "haha #scrubs",
    "haha #scrubs #friends"
);

function get_post_tags($posts_array)
{
    $tag_indexes = array();

    $anchor_tag_opening = "<a href='#'>";
    // $anchor_tag_closing = "</a>";

    foreach ($posts_array as &$post) {
        preg_match_all('/#([^\s]+)/', $post, $hashtag_indexes, PREG_OFFSET_CAPTURE);
        // Creates an array with all of the current posts tags
        $indexes = array();

        // Loops through each post and extracts the contents of the hashtags by
        // index substring splicing
        for ($i = 0; $i < count($hashtag_indexes[0]); $i++) {

            $post_length = strlen($post);

            $start_index = $hashtag_indexes[0][$i][1];
            $end_index = (strpos($post, ' ', $start_index)) ? strpos($post, ' ', $start_index) : $post_length;

            $tag = substr($post, $start_index, $end_index - $start_index);

            $post = substr_replace($post, $anchor_tag_opening, $start_index, 0);

            array_push($indexes, array(
                'start' => $start_index,
                'end' => $end_index
            ));
        }

        // Push each posts tags array to the current post number
        array_push($tag_indexes, $indexes);
    }

    return $tag_indexes;
}

print_r(get_post_tags($posts));

$anchor_tag_opening = '<a href="">';
$anchor_tag_closing = '</a>';

echo $posts[2] . '<br>';

$post = substr_replace($posts[2], $anchor_tag_opening, 5, 0);

echo $post;
