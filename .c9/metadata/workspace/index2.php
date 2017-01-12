{"changed":true,"filter":false,"title":"index2.php","tooltip":"/index2.php","value":"<?php\ninclude 'dbconnect.php';    // $db -> connection name\n//$sql = \"SELECT COUNT(id) FROM Book\";\n//$res = $db->query($sql);\n$rows = 12;//$row=$res[0]\n// This is the number of results we want displayed per page\n$page_rows = 8;\n// This tells us the page number of our last page\n$last = ceil($rows/$page_rows);\n// This makes sure $last cannot be less than 1\nif($last < 1){\n\t$last = 1;\n}\n// Establish the $pagenum variable\n$pagenum = 1;\n// Get pagenum from URL vars if it is present, else it is = 1\nif(isset($_GET['pn'])){\n\t$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);\n}\n// This makes sure the page number isn't below 1, or more than our $last page\nif ($pagenum < 1) { \n    $pagenum = 1; \n} else if ($pagenum > $last) { \n    $pagenum = $last; \n}\n// This sets the range of rows to query for the chosen $pagenum\n$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;\n// This is your query again, it is for grabbing just one page worth of rows by applying $limit\n$sql =  \"SELECT * FROM Book ORDER BY id DESC $limit\";\n$result = $db->query($sql);\n// This shows the user what page they are on, and the total number of pages\n//$textline1 = \"Testimonials (<b>$rows</b>)\";\n//$textline2 = \"Page <b>$pagenum</b> of <b>$last</b>\";\n// Establish the $paginationCtrls variable\n$paginationCtrls = '';\n// If there is more than 1 page worth of results\nif($last != 1){\n\t/* First we check if we are on page one. If we are then we don't need a link to \n\t   the previous page or the first page so we do nothing. If we aren't then we\n\t   generate links to the first page, and to the previous page. */\n\tif ($pagenum > 1) {\n        $previous = $pagenum - 1;\n\t\t$paginationCtrls .= '<a href=\"'.$_SERVER['PHP_SELF'].'?pn='.$previous.'\">Previous</a> &nbsp; &nbsp; ';\n\t\t// Render clickable number links that should appear on the left of the target page number\n\t\tfor($i = $pagenum-4; $i < $pagenum; $i++){\n\t\t\tif($i > 0){\n\t\t        $paginationCtrls .= '<a href=\"'.$_SERVER['PHP_SELF'].'?pn='.$i.'\">'.$i.'</a> &nbsp; ';\n\t\t\t}\n\t    }\n    }\n\t// Render the target page number, but without it being a link\n\t$paginationCtrls .= '<h3>'.$pagenum.' </h3>&nbsp; ';\n\t// Render clickable number links that should appear on the right of the target page number\n\tfor($i = $pagenum+1; $i <= $last; $i++){\n\t\t$paginationCtrls .= '<a href=\"'.$_SERVER['PHP_SELF'].'?pn='.$i.'\">'.$i.'</a> &nbsp; ';\n\t\tif($i >= $pagenum+4){\n\t\t\tbreak;\n\t\t}\n\t}\n\t// This does the same as above, only checking if we are on the last page, and then generating the \"Next\"\n    if ($pagenum != $last) {\n        $next = $pagenum + 1;\n        $paginationCtrls .= ' &nbsp; &nbsp; <a href=\"'.$_SERVER['PHP_SELF'].'?pn='.$next.'\">Next</a> ';\n    }\n}\n?>\n\n\n\n<!DOCTYPE html>\n<html>\n<head>\n\t<title>Kitaab</title>\n\n\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n\t<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />\n\t<!-- google fonts -->\n\t<link href='https://fonts.googleapis.com/css?family=Cinzel+Decorative:700' rel='stylesheet' type='text/css'>\n\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css\">\n\t<!-- gridSystem -->\n\t<link rel=\"stylesheet\" type=\"text/css\" href=\"grid.css\">\n\n\t<!-- styling -->\n\t<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">\n</head>\n\n<body>\n <div class=\"row navwidth\">\n\t<nav class=\"navbar navbar-fixed-top\">\n\t\t<div class=\"navbar-header\">\n\t      <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">\n\t        <span class=\"icon-bar\"></span>\n\t        <span class=\"icon-bar\"></span>\n\t        <span class=\"icon-bar\"></span>\n\t      </button>\n\t      <!-- <a class=\"navbar-brand\" href=\"#\"><img src=\"http://www.iconsdb.com/icons/preview/soylent-red/book-xxl.png\" width=\"20\" height=\"20\"></a> -->\n\t      <a class=\"navbar-brand\" href=\"#\">KiTaaB</a>\n\t    </div>\n\t    <div class=\"navbar-right\" id=\"myNavbar\">\n\t      <ul class=\"nav navbar-nav navbar-right\">\n\t        <li><a href=\"login.php\"><i class=\"fa fa-user\"></i> My Account</a></li>\n\t      </ul>\n\t    </div>\n\t\t\t</nav>\n\t\t</div>\n\n\t<div class=\"header container-fluid\">\n\t\t<div class=\"row\">\n\t\t\t<div class=\"col col-12\">\n\t\t\t\t<img src=\"images/scucover.jpg\" style=\"min-width:10%;height:auto;\" alt=\"SCU Library picture\">\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"headertt\">\n\t\t\t<div class=\"row\">\n\t\t\t\t<div class=\"header-text text-center\">\n\t\t\t\t\t<h1>KiTaaB</h1>\n\t\t\t\t\t<p>Book trading community just for Santa Clara University.</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t\n\t\t\t<div class=\"row\">\n\t\t\t \t<div class=\"search-bar\">\n\t\t\t   \t\t<i class=\"fa fa-search\"></i>\n\t\t\t    \t\t<input type=\"search\"\n\t\t\t        \t\t class=\"form-control\"\n\t\t\t           \t\tplaceholder=\"Search\" />\n\t\t\t \t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\n\n<div class=\"content container-fluid text-center\">\n\t<div class=\"row\">\n\t\t<?php\n\t\t$newrow=1;\n\t\tif ($result->num_rows > 0) {\n\t     // output data of each row\n\t\t while($row = $result->fetch_assoc()) \n\t\t {\n\t\t \tif ($newrow<5)\n\t\t \t{\n\t\t \t\t$newrow++;\n\t\t \t}\n\t\t \telse\n\t\t \t{\n\t\t \t\techo'<div class=\"row\">';\n\t\t \t\t$newrow=1;\n\t\t \t}\n\t\t\techo'<div class=\"col col-3 inc\">\n\t\t\t\t<div class=\"item\">\n\t\t\t\t\t<div class=\"img\">\n\t\t\t\t\t\t<a target=\"_blank\" href=\"searchpage.html\">\n\t\t\t\t\t\t\t<img src=\"'.$row[\"img_src\"].'\" alt=\"BookCover of the book in question\" style=\"width:80%;height:100%\">\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div>\n\t\t\t\t\t\t<div class=\"desc\">\n\t\t\t\t\t\t\t<h3 class=\"title\">'.$row[\"name\"].'</h3>\n\t\t\t\t\t\t\t<p class=\"number\">'.$row[\"isbn\"].'price</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>';\n\t\t }\n\t\t$db->close();\n\t\t}\n\t\t?>\n\t<div class=\"row\">\n\t\t\n\t\t\t<div class=\"pagination\" id=\"center\" class=\"col-12\">\n\t\t\t\t<ul class=\"pagination\" id=\"center\">\n                    <li><?php echo $paginationCtrls; ?></li>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t\n\t</div>\n</div>\n\n\t<footer>\n\t<div class=\"row\">\n\t  <hr>\n\t  <div class=\"col col-4\">\n\t    <img src=\"images/scu.png\" style=\"width:100%;\" alt=\"Santa Clara University\">\n\t  </div>\n\t  <div class=\"col col-4\"><a href=\"http://www.scu.edu\" target=\"_blank\">\n\t    <img src=\"images/banner.jpg\" style=\"width:100%;\" alt=\"SCU Banner\"></a>\n\t  </div>\n\t  <div class=\"col col-4\">\n\t    <img src=\"images/jesuit.png\" style=\"width:100%;\" alt=\"Jesuit University\">\n\t  </div>\n\t</div>\n\n\n\t<div class=\"row\">\n\t    <div class=\" col  col-4\">\n\n\t      \t<div class=\"footer container-fluid\">\n\t      \t  <h2>Contact us</h2>\n\t      \t  <div  class=\"row\">\n\t      \t    <div  class=\" col  col-12\">\n\t              <input class=\"form-control\" id=\"name\" name=\"name\" size=\"40\" placeholder=\"Name\" type=\"text\" required=\"\">\n\t            </div>\n\t          </div>\n\t            <div  class=\"row\">\n\t        \t    <div  class=\" col  col-12\">\n\t                  <input class=\"form-control\" id=\"email\" name=\"email\" size=\"40\" placeholder=\"Email\" type=\"email\" required=\"\">\n\t              </div>\n\t            </div>\n\t              <div  class=\"row\">\n\t          \t    <div  class=\" col  col-12\">\n\t                    <textarea class=\"form-control\" id=\"comments\" name=\"comments\" cols=\"45\" placeholder=\"Type your query here...\" rows=\"5\"></textarea>\n\t                </div>\n\t              </div>\n\t                <div class=\"row\">\n\t                    <div class=\" col  col-12\">\n\t                      <button type=\"submit\">Send</button>\n\t                    </div>\n\t                </div>\n\t                <br>\n\t   \t  </div>\n\t  </div>\n\t      <div class=\" col  col-4\">\n\t        <div class=\"footer container-fluid\">\n\t        <h2> Who we are.</h2>\n\t        <p> Kitaab is an effort made by the students of Santa Clara University for the SCU community. Kitaab provides a platform where you can offer and buy used/old books.</p>\n\t          <br>\n\t          <p><b>Feel free to keep in touch.</b></p>\n\t          <div id=\"social\">\n\t            <a href=\"https://www.facebook.com/kitaabOnline\" target=\"_blank\"><img src=\"images/facebook.png\" alt=\"facebook icon\" style=\"width:20%;height:20%;\"></a>\n\t            <a href=\"https://business.google.com/b/117024498746463939619/dashboard\" target=\"_blank\"><img src=\"images/googlePlus.png\" alt=\"GooglePlus icon\" style=\"width:19%;height:19%;\"></a>\n\t            <a href=\"https://www.twitter.com\" target=\"_blank\"><img src=\"images/twitter.png\" alt=\"Twitter icon\" style=\"width:20%;height:20%;\"></a>\n\t         </div>\n\t      </div>\n\t    </div>\n\t    <div class=\" col  col-4\">\n\t      <div class=\"footer container-fluid\">\n\t          <h1><a href=\"images/map.jpg\" target=\"_blank\">Campus Map</a></h1>\n\t          <h3> <b>Santa Clara University</b></h3>\n\t            <ul><li>500 El Camino Real,</li>\n\t            <li>Santa Clara,</li>\n\t            <li>CA 95053</li>\n\t            <li>(408) 554-4000</li></ul>\n\t       </div>\n\t    </div>\n\t</div>\n</footer>\n\n</body>\n</html>\n","undoManager":{"mark":-2,"position":0,"stack":[[{"start":{"row":4,"column":11},"end":{"row":4,"column":25},"action":"insert","lines":["//$row=$res[0]"],"id":2346,"ignore":true},{"start":{"row":31,"column":0},"end":{"row":31,"column":2},"action":"insert","lines":["//"]},{"start":{"row":32,"column":0},"end":{"row":32,"column":2},"action":"insert","lines":["//"]}]]},"ace":{"folds":[],"scrolltop":283.5,"scrollleft":0,"selection":{"start":{"row":29,"column":0},"end":{"row":29,"column":27},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":38,"state":"php-comment","mode":"ace/mode/php"}},"timestamp":1457379060310}