<?php
if (isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['limit']) && !empty($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 6;
}

$userId = $_SESSION['user']['id'];

// Calculate total number of bookmarked projects
$total = ORM::for_table('ql_favads')
    ->table_alias('qa')
    ->where('qa.user_id', $userId)
    ->count();

// Calculate offset based on current page and limit
$offset = ($page - 1) * $limit;

// Fetch bookmarked projects with limit and offset
$bookmarks = ORM::for_table('ql_favads')
    ->table_alias('qa')
    ->select_many('qp.*')
    ->join('ql_project', array('qa.product_id', '=', 'qp.id'), 'qp')
    ->where('qa.user_id', $userId)
    ->limit($limit)
    ->offset($offset) // Apply the offset here
    ->find_many();

foreach ($bookmarks as &$project) {
    $full_amount = 0;

    // Fetch bids for each project
    $bids = ORM::for_table($config['db']['pre'] . 'bids')
        ->select('amount')
        ->table_alias('ua')
        ->where(array(
            'ua.project_id' => $project['id'],
            'u.user_type' => 'user'
        ))
        ->join($config['db']['pre'] . 'user', array('ua.user_id', '=', 'u.id'), 'u')
        ->find_many();

    $bids_count = count($bids);

    foreach ($bids as $bid) {
        $full_amount += $bid['amount'];
    }

    $avg_bid = ($bids_count == 0) ? 0 : $full_amount / $bids_count;
    $project['bids_count'] = $bids_count;
    $project['avg_bid'] = $avg_bid;

    $pro_url = create_slug($project['product_name']);
    $project['link'] = $link['PROJECT'] . '/' . $project['id'] . '/' . $pro_url;
}

$Pagelink = "";
if (count($_GET) >= 1) {
    $get = http_build_query($_GET);
    $Pagelink .= "?" . $get;

    $pagging = pagenav($total, $page, $limit, $link['BOOKMARK_PAGE'] . $Pagelink, 1);
} else {
    $pagging = pagenav($total, $page, $limit, $link['BOOKMARK_PAGE']);
}

// Display the template with the bookmarks data and pagination
HtmlTemplate::display('global/bookmark-page', array(
    'bookmarks' => $bookmarks,
    'pages' => $pagging
));
?>
