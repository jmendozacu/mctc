<?php
// This function builds a search query from the search keywords and sort setting
function build_query($user_search, $sort) {
    $search_query = "SELECT * FROM products";

    // Extract the search keywords into an array
    // CN explained on page 510
    // CN if user enters comma delimited list of search words replace the commas with spaces.
    $clean_search = str_replace(',', ' ', $user_search);
    /*
     * CN explode() returns an array of strings and stores each search search word in and array named $search_words
     *
     */
    $search_words = explode(' ', $clean_search);
    // CN not sure why array $final_search_words is populated here as $search_words holds the same data after explode()
    $final_search_words = array();
    if (count($search_words) > 0) {
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $final_search_words[] = $word;
            }
        }
    }

    // Generate a WHERE clause using all of the search keywords
    /*
    In SQL, wildcard characters (ex. %) are used with the SQL LIKE operator.

    The following SQL statement selects all customers with a first name containing the pattern "oe". This would return names like Joe, Moe and Joel

    Example
    SELECT * FROM Customers
    WHERE FirstName LIKE '%oe%';

    */
    $where_list = array();
    if (count($final_search_words) > 0) {
        foreach($final_search_words as $word) {
            $where_list[] = "description LIKE '%$word%'";
        }
    }
    // CN implode() joins array members using provided string. Here ' OR ' is used to build the where clause.
    $where_clause = implode(' OR ', $where_list);

    // Add the keyword WHERE clause to the search query
    if (!empty($where_clause)) {
        $search_query .= " WHERE $where_clause";
    }

    // Sort the search query using the sort setting
    // CN $sort is set if the user clicks on one of the sort headers in the search results.
    // CN No sort is set on the initial search sent from the search-form.php
    switch ($sort) {
        // Ascending by job title
        case 1:
            $search_query .= " ORDER BY productName";
            break;
        // Descending by job title
        case 2:
            $search_query .= " ORDER BY productName DESC";
            break;
        // Ascending by state
        case 3:
            $search_query .= " ORDER BY listPrice";
            break;
        // Descending by state
        case 4:
            $search_query .= " ORDER BY listPrice DESC";
            break;
        default:
            // No sort setting provided, so don't sort the query
    }

    return $search_query;
}

// This function builds heading links based on the specified sort setting
/*
   CN generate_sort_links function creates clickable header links for sorting data.
   Notice the sort values are in sync with the switch/case statement in the code above.
   This changes the query order by clause and implements the sorting.
  */
function generate_sort_links($user_search, $sort) {
    $sort_links = '';

    switch ($sort) {
        case 1:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=2">Product</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">Price</a></td>';
            $sort_links .= '<td></td>';
            break;
        case 3:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Product</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=4">Price</a></td>';
            $sort_links .= '<td></td>';
            break;
        default:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Product</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">Price</a></td>';
            $sort_links .= '<td></td>';
    }

    return $sort_links;
}

// This function builds navigational page links based on the current page and the number of pages
// CN I did not cover generate_page_links in lecture as this does not change when used with the final project code.
function generate_page_links($user_search, $sort, $cur_page, $num_pages) {
    $page_links = '';

    // If this page is not the first page, generate the "previous" link
    if ($cur_page > 1) {
        $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page - 1) . '"><-</a> ';
    }
    // Here we are on the first page, so do not generate a previous link.
    else {
        $page_links .= '<- ';
    }

    // Loop through the pages generating the page number links
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($cur_page == $i) {
            $page_links .= ' ' . $i;
        }
        else {
            $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . $i . '"> ' . $i . '</a>';
        }
    }

    // If this page is not the last page, generate the "next" link
    if ($cur_page < $num_pages) {
        $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=' . $sort . '&page=' . ($cur_page + 1) . '">-></a>';
    }
    // Here we are on the last page, so do not generate a previous link.
    else {
        $page_links .= ' ->';
    }

    return $page_links;
}

?>