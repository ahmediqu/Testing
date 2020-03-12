 <?php
        $page = isset($_GET['page']) ? $_GET['page'] : null;
        
        // switch ($page) {
        //     case 'posts':
        //         include_once('pages.php');

        //         break;
        switch ($page) {
            case 'posts':
                include_once('view/post/post.php');
                break;
            
            default:
                echo "Page not found";
                break;
        }


?>