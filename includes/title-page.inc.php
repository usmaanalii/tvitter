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
     * [get the details of the title]
     * @param  [string] $id [unique string retrieved for the title whose
     * details are required]
     * @return [object]     [containing details of the title]
     */
    public static function get_title_details_by_id($id)
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
         * [get the details of the title]
         * @param  [string] $title [unique title name retrieved
         * for the title whose details are required]
         * @return [object]     [containing details of the title]
         */
        public static function get_title_details_by_name($title)
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
