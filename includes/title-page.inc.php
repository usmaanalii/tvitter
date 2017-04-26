<?php
require_once __DIR__ . "/sql-helper.inc.php";
require_once __DIR__ . "/profile.inc.php";

/**
 * Title class
 *
 */
class Title extends UserProfile
{
    /**
     * TODO: Docblock
     * [movie_details description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function get_movie_details_by_id($id)
        {
            // URL's
            $search_url = "http://www.omdbapi.com/";

            // Parameters
            $search_params = array(
                'i' => 'imdb id',
                't' => 'title',
                'type' => 'movie, series or episode',
                'plot' => 'short, full',
                'r' => 'json or xml',
                'callback' => 'JSONP callback name',
                'v' => 'API version'
            );

            // Building a search
            $movie_json = file_get_contents($search_url . '?' . 'i=' . $id);

            $movie_data = json_decode($movie_json);

            // Keys
            $series_keys = array(
                "Title", "Year", "Rated", "Released", "Runtime", "Genre", "Director", "Writer", "Actors", "Plot", "Language", "Country", "Awards", "Poster", "Metascore", "imdbRating", "imdbVotes", "imdbID", "Type", "totalSeasons", "Response"
            );

            $movie_keys = array(
                "Title", "Year", "Rated", "Released", "Runtime", "Genre", "Director", "Writer", "Actors", "Plot", "Language", "Country", "Awards", "Poster", "Metascore", "imdbRating", "imdbVotes", "imdbID", "Type", "totalSeasons", "Response", "Title", "Year", "Rated", "Released",
                "Runtime", "Genre", "Director", "Writer", "Actors", "Plot", "Language", "Country", "Awards", "Poster", "Ratings", "Metascore", "imdbRating", "imdbVotes", "imdbID", "Type", "DVD", "BoxOffice", "Production", "Website", "Response"
            );

            return $movie_data;

        }

        /**
         * TODO: Docblock
         * [movie_details description]
         * @param  [type] $title [description]
         * @return [type]        [description]
         */
        public static function get_movie_details_by_name($title)
        {
            // URL's
            $search_url = "http://www.omdbapi.com/";

            // Parameters
            $search_params = array(
                'i' => 'imdb id',
                't' => 'title',
                'type' => 'movie, series or episode',
                'plot' => 'short, full',
                'r' => 'json or xml',
                'callback' => 'JSONP callback name',
                'v' => 'API version'
            );

            // Building a search
            $movie_json = file_get_contents($search_url . '?' . 't=' . urlencode($title));
            $movie_data = json_decode($movie_json);

            // Results
            return $movie_data;
        }
}
